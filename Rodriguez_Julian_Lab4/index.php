<?
if(isset($_GET["action"])){
	
	$action = $_GET["action"];

	if($action == "add"){
		header("location:add.html");
	
	}elseif($action == "addaction"){
		
		$dbh = new PDO("mysql:host=localhost;dbname=fruit;port=8889",'root','root');
		$sql = "INSERT INTO fruit_table (name, color) VALUES (:name, :color)";
		$sth = $dbh->prepare($sql);
		$sth->execute(array(":name"=> $_POST["name"], ":color"=> $_POST["color"]));

		header("location: index.php");
	
	}elseif($action == "update"){
		$id= $_GET["id"];
		// var_dump($id);
		header("location:update.php?id=".$id);
		
	}elseif($action == "updateaction"){
		$id= $_POST["id"];
		$dbh = new PDO("mysql:host=localhost;dbname=fruit;port=8889",'root','root');
		$sth = $dbh->prepare('UPDATE fruit_table SET name=:name, color=:color WHERE id=:id');
		$sth->execute(array( ":name"=>$_POST["name"], ":color"=>$_POST["color"], ":id"=>$id));
		header("location: index.php");
	
	}elseif($action == "delete") {
		$id = $_GET["id"];
		$dbh = new PDO("mysql:host=localhost;dbname=fruit;port=8889",'root','root');
		$sth = $dbh->prepare('DELETE FROM fruit_table WHERE id = :id');
		$sth->execute(array(":id"=> $id));
		header("location: index.php");
	
	}else{

	}

}else{
?>

<html>
<body>
	<p><a href="?action=add">ADD NEW</a></p>
	<feildset>
		<h4>Items</h4>

		<?

		$dbh = new PDO("mysql:host=localhost;dbname=fruit;port=8889", 'root', 'root');
		$sql = "select id, name, color from fruit_table";
		$sth = $dbh->prepare($sql);
		$sth->execute();

		$result = $sth -> fetchAll();

		foreach ($result as $index) {
			echo "<p>".$index["id"]." ".$index["color"]." ".$index["name"]." <a href='?action=delete&id=".$index["id"]."'>DELETE</a> || <a href='?action=update&id=".$index["id"]."'>UPDATE</a></p>";
		}

		?>

	</feildset>	
</body>	
</html>

<?
}
?>
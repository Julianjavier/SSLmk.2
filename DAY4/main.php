<?
if(isset($_GET["action"])){
	
	$action = $_GET["action"];

	if($action == "add"){
		header("location:form.html");
	
	}elseif($action == "addaction"){
		
		$dbh = new PDO("mysql:host=localhost;dbname=fruit;port=8889",'root','root');
		$sql = "INSERT INTO fruit_table (name, color) VALUES (:name, :color)";
		$sth = $dbh->prepare($sql);
		$sth->execute(array(":name"=> $_POST["name"], ":color"=> $_POST["color"]));

		header("location: main.php");
	
	}elseif($action == "update"){
		
	}elseif($action == "updateaction"){

	}elseif($action == "delete") {

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
		$sql = "select name, color from fruit_table";
		$sth = $dbh->prepare($sql);
		$sth->execute();

		$result = $sth -> fetchAll();

		foreach ($result as $index) {
			echo $index["color"]." ".$index["name"]."<br>";
		}

		?>

	</feildset>	
</body>	
</html>

<?
}

// if (isset($_POST["name"]) && isset($_POST["color"])){
// 	if($_POST["name"] !=""){	
// 		$dbh = new PDO("mysql:host=localhost;dbname=fruit;port=8889",'root','root');
// 		$sql = "INSERT INTO fruit_table (name, color) VALUES (:name, :color)";
// 		$sth = $dbh->prepare($sql);
// 		$sth->execute(array(":name"=> $_POST["name"], ":color"=> $_POST["color"]));
// 	}
// }
?>


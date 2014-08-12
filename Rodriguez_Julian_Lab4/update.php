<?
$id=$_GET["id"];
$dbh = new PDO("mysql:host=localhost;dbname=fruit;port=8889", 'root', 'root');
$sth = $dbh->prepare("SELECT name, color FROM fruit_table WHERE id=:id");
$sth->execute(array(":id"=> $id));
$item = $sth -> fetchAll();
$name= ($item[0]["name"]);
$color= ($item[0]["color"]);
?>

<html>
<body>
	<feildset>
		<h4>Item Update</h4>

		<form action="index.php?action=updateaction"  method="POST">

			<input type="text" name="name" placeholder=<? echo $name ?> />
			<input type="text" name="color" placeholder=<? echo $color ?> />
			<input type="hidden" name="id" value=<? echo $id ?> />
			<input type="submit"/>

		</form>

	</feildset>	
</body>	
</html>
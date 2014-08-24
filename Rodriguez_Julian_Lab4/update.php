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
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">    
</head>
<body>
	<header></header>
	<div>
		<h2>Item Update</h2>

		<form action="index.php?action=updateaction"  method="POST">

			<input type="text" name="name" placeholder=<? echo $name ?> />
			<input type="text" name="color" placeholder=<? echo $color ?> />
			<input type="hidden" name="id" value=<? echo $id ?> />
			<input id="submit" type="submit"/>

		</form>

	</div>	
</body>	
</html>
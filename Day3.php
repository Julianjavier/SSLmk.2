<?
	
$dbh = new PDO("mysql:host=localhost;dbname=fruit;port=8889", "root", "root");

function getFruit($conn){
	$sql ="select name, color from fruit_table order by name";
	foreach ($conn->query($sql) as $row){
		print $row["name"]."<br>";
		print $row["color"]."<br>";
	}
}


getFruit($dbh);

?>
<?
$dbh = new PDO("mysql:host=localhost;dbname=fruit;port=8889",'root','root');

function getFruit($conn){
	$sql = "select name, color from fruit_table order by name";
	header ("Content-Type: text/xml");
	echo "<?xml version='1.0' encoding='ISO-8859-1'?>";
	echo "<fruits>";

	foreach ($conn->query($sql) as $row) {
		echo "<fruit>";
		echo $row["name"];
		echo $row["color"];
		echo "</fruit>";
	}
	echo "</fruits>";
}
function makeJson($conn){
	$sql = "select name, color from fruit_table order by name";
	$result = $conn->query($sql);
	$final = $result->fetchAll();
	header ("Content-Type: application/json");
	echo json_encode($final);
}
function readXML(){
	$x = file_get_contents("load.xml");
	$xml = new SimpleXMLElemant($x);
	var_dump($xml);
}

function readJson(){
	$x = file_get_contents("myjson.json");
	$j = json_decode($x);
	var_dump($j);

	foreach ($j as $item) {
		echo $item->name;
	}
}



readJson();
?>
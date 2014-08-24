<?
// // $name =$_GET["name"];
// $dbh = new PDO("mysql:host=localhost;dbname=apartment;port=8889", 'root', 'root');
// $sth = $dbh->prepare("SELECT name FROM rent_info Where name=name");
// // $sth->bindParam("name", $_GET["name"], PDO::PARAM_STR);
// // $sth->execute(array("name"=> $name));
// $sth->execute();
// $item = $sth -> fetchAll();
// var_dump($item);

$data = file_get_contents("kimonoData.json");

echo $data; 

?>
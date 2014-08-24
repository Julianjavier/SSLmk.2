<?
if(isset($_GET['cityget'])){
$cityinput = trim($_GET['cityget']).'%';
$dbh= new PDO("mysql:host=localhost;dbname=worldcities;port=8889",'root','root');
$stmt = $dbh->prepare('SELECT city, region 
					   FROM cities 
					   WHERE city_ascii LIKE :cityinput
					   AND country = "us" 
					   ORDER BY city_ascii LIMIT 200;');

$stmt->bindParam(':cityinput', $cityinput);
$stmt->execute();
$result = $stmt->fetchAll();
echo json_encode($result);
}
?>
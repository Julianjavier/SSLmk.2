<?
class fruitModel {	
	public function getFruit(){
		$conn = new PDO("mysql:host=localhost;dbname=fruit;port=8889",'root','root');
		$sql = "select name, color from fruit_table order by name";
		$result = $conn->query($sql);
		$final = $result->fetchAll();
		return $final;
	}

}
?>
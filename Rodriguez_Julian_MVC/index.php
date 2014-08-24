<?
include 'controllers/homeController.php';

// include 'controllers/apiController.php';
// include 'controllers/loginController.php';

if(isset($_GET["action"])){
	$action = $_GET["action"];

	if($action == "form") {
		$start = new homeController();
	}elseif ($action == "session") {
			# code...
	}elseif ($action == "login") {
			# code...
	}elseif ($action == "crud") {
			# code...
	}elseif ($action == "api") {
			# code...
	}else{
		$start = new homeController(); 
		// $start->welcome();	
	}

}else{
	$start = new homeController(); 
	// $start->welcome();
}
?>
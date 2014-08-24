<?
include 'models/viewModel.php';
include 'models/cityresponse.php';

class homeController  {
	
	public function __construct(){

		if(isset($_GET["execute"])){
			$execute = $_GET["execute"];
			if($execute == "formHandel"){
				$this->formHandle();
			
			}elseif($execute == "showFruit"){
				$this->showFruit();
			
			}
		}else{
			$this->startHome(); 
		}
	}

	public function welcome(){
		echo " WELCOME ";
	}

	public function startHome(){
		$viewModel = new viewModel();
		$viewModel->getView("views/form.html");
	}

	public function formHandle(){
		$viewModel = new viewModel();
		echo "form handle loaded";
	}

	public function showWeather(){
		$viewModel = new viewModel();
		$fruitModel = new wetherModel();
		$viewModel->getView("views/resultView.html");
		
	}
}

?>
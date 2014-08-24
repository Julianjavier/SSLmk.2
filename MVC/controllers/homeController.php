<?
include 'models/viewModel.php';
include 'models/fruitModel.php';

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
		$viewModel->getView("views/header.html");
		$viewModel->getView("views/form.html");
		$viewModel->getView("views/footer.html");
	}

	public function formHandle(){
		$viewModel = new viewModel();
		$viewModel->getView("views/header.html");
		echo "form handle loaded";
		$viewModel->getView("views/footer.html");
	}

	public function showFruit(){
		$viewModel = new viewModel();
		$fruitModel = new fruitModel();
		$viewModel->getView("views/header.html");
		$data = $fruitModel->getFruit();
		$viewModel->getView("views/body.php", $data);		
		$viewModel->getView("views/footer.html");
	}
}

?>
<?
session_start();
$_SESSION['login'] = FALSE;
if($_POST){
	$user = $_POST["username"];
	$password = $_POST["password"];
	
	if(isset($user) && isset($password)){
		$dbh = new PDO("mysql:host=localhost;dbname=user_table;port=8889", "root", "root");
		$sql = $dbh->prepare("SELECT username, password, imgurl FROM users WHERE username = :username AND password = :password ");
		$sql->execute(array(':username'=> $user, 
							':password' => $password));
		
		$result = $sql->fetchAll();
		if (count($result) > 0){
				$user_result = $result[0][0];
				$pass_result = $result[0][1];
				$img_result = $result[0][2];

				if($user == $user_result && $password == $pass_result){

					$_SESSION['username'] = $user_result;
					$_SESSION['avatar'] = $img_result;
					$_SESSION['login'] = TRUE;
					header('Location: protected.php');

				}
			}
		}else{
			header('Location: index.html');
		}
}
?>
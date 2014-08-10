<?
session_start();
	if (isset($_SESSION['login'])){
		if($_SESSION['login'] == TRUE){
			$_SESSION['message']= 'WELCOME';
		}else{
			$_SESSION['login'] = FALSE;
			header('Location: index.html');
		}
	};

	if($_POST){
		session_destroy();
		header("Location: index.html");
	}
?>

<!DOCTYPE html>
<html>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">    
</head>
    <body>
    	<div class="wrapper">
    		<fieldset>
    				<h2><? echo $_SESSION["message"] ?></h2>
					<img src =<? echo $_SESSION['avatar']?>> 
					<h2><? echo $_SESSION['username'] ?> </h2> 

					<form action="" method="post">
						<input type="submit" name="logout">
					</form>	
		
			</fieldset>
        </div>

    </body> 
</html>


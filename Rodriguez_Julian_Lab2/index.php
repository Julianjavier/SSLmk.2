<?php
session_start();
if($_POST) {
	$_SESSION['userName'] = $_POST['userName'];
	$_SESSION['passWord'] = sha1($_POST['passWord']);
	$uploaddir = 'img/';
	
	if($_FILES['filename']['type'] == 'image/jpeg'){	
		$uploadfile = $uploaddir . basename($_FILES['filename']['name']);
		move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile);
		$_SESSION['uploadfile'] = $uploadfile;
		header('Location: profile.php');	
	
	} elseif($_FILES['filename']['type'] == 'image/png'){
		
		$uploadfile = $uploaddir . basename($_FILES['filename']['name']);
		move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile);
		$_SESSION['uploadfile'] = $uploadfile;
		header('Location: profile.php');	
	}else{
		echo "SORRY BUT NO";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
    	<div class="wrapper">
    		<fieldset>
				<form method="POST" enctype="multipart/form-data">
				                
				<p><input class="input" type="text" name="userName" placeholder= "User Name:"></p>
				                
				<p><input class="input" type="text" name="passWord" placeholder= "Password:"></p>
				                
				<p><input type="file" name="filename" /></p>

				<p><input class="submit" id="submit" type="submit" ></p>
		                
				</form>
			</fieldset>
        </div>

    </body> 
</html>
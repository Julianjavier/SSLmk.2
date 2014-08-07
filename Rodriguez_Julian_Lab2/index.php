<?
session_start();
	
if($_POST) {
	$_SESSION['userName'] = $_POST['userName'];
	$_SESSION['passWord'] = sha1($_POST['passWord']);
	$uploaddir = 'img/';

	if($_FILES['filename']['type'] == 'image/jpeg'){	
		$uploadfile = $uploaddir . basename($_FILES['filename']['name']);
		move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile);
		$_SESSION['uploadfile'] = $uploadfile;

		// header('Content-type: image/jpeg');
		if(isset($_FILES['filename'])){
			$image = $uploadfile;
			// var_dump($_FILES['filename']);

			$images_size = getimagesize($image);
			$image_width = $images_size[0];
			$image_height = $images_size[1];

			$new_size = ($image_width + $image_height) / ($image_width * ($image_height/45));

			$new_width = $image_width * $new_size;
			$new_height = $image_height * $new_size;

			$new_image = imagecreatetruecolor($new_width, $new_height);
			$old_image = imagecreatefromjpeg($image);

			imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);

			imagejpeg($new_image, $image.".thumb.jpg");
		};	 

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
				<form action=" " method="POST" enctype="multipart/form-data">
				                
				<p><input class="input" type="text" name="userName" placeholder= "User Name:"></p>
				                
				<p><input class="input" type="text" name="passWord" placeholder= "Password:"></p>
				                
				<p><input type="file" name="filename" /></p>

				<p><input class="submit" id="submit" type="submit" ></p>
		                
				</form>
			</fieldset>
        </div>

    </body> 
</html>
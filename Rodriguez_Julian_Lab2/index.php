<?
session_start();
	
if($_POST) {	//gets post faviables and stores them in a session variable
	$_SESSION['userName'] = $_POST['userName'];							 //
	$_SESSION['passWord'] = sha1($_POST['passWord']);					//
	$uploaddir = 'img/';							   //Sets the directory
/////////////////////
	if($_FILES['filename']['type'] == 'image/jpeg'){	// this begins the image resize and copy.
		$uploadfile = $uploaddir . basename($_FILES['filename']['name']); //gets the directory location
		move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile); //and this moves the image to the location
		$_SESSION['uploadfile'] = $uploadfile; //holda avatar in session
////////////////////
		if(isset($_FILES['filename'])){ //this makes sure the file has been set
			$image = $uploadfile; //this gets the file from the directory to be used by the resize function

			$images_size = getimagesize($image);///gets dimensions from the image
			$image_width = $images_size[0];									   //
			$image_height = $images_size[1];								  //

			$new_size = ($image_width + $image_height) / ($image_width * ($image_height/45));// this establishes the new size
			$new_width = $image_width * $new_size;											// new width
			$new_height = $image_height * $new_size;									   // new height

			$new_image = imagecreatetruecolor($new_width, $new_height);
			$old_image = imagecreatefromjpeg($image);

			imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);//This copys and makes the image smaller

			imagejpeg($new_image, $image.".thumb.jpg");//this renders it and saves it as a new file.
		};	 

		header('Location: profile.php');
	}else{
		echo "SORRY BUT NO";
	}
/////////////////
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
				                
				<p><input class="file" type="file" name="filename" /></p>

				<p><input class="submit" id="submit" type="submit" ></p>
		                
				</form>
			</fieldset>
        </div>

    </body> 
</html>
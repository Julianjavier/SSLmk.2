<?php
session_start();

// // The file
// $percent = 0.5;

// // Content type
// header('Content-Type: image/jpeg');

// // Get new dimensions
// list($width, $height) = getimagesize($_SESSION['uploadfile']);
// $new_width = $width * $percent;
// $new_height = $height * $percent;

// // Resample
// $image_p = imagecreatetruecolor($new_width, $new_height);
// $image = imagecreatefromjpeg($_SESSION['uploadfile']);
// imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

// // Output
// $newimage = imagejpeg($image_p, null, 100);

// var_dump($newimage)


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
					<img src =<? echo $_SESSION['uploadfile'] ?>> 
					<h2><? echo $_SESSION['userName'] ?> </h2> 
					<h4><? echo $_SESSION['passWord'] ?> </h2> 
		
			</fieldset>
        </div>

    </body> 
</html>
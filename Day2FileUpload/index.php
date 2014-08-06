<?
$uploaddir = './img/';
$uploadfile = $uploaddir . basename($_FILES['myfile']['name']);

if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile)){
	echo "its GOOD";
} else {
	echo "AMBER ALERT";
};

print_r($_FILES);

?>

<html>
	<form method="post" enctype="multipart/form-data">
		<input type="text" name="username" value="RACK"/>

		<input type="file" name="myfile"/>

		<input type="submit"/>

	</form>	
</html>
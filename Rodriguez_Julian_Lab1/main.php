<?

function input_form(){
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zipCode = $_POST["zipCode"];
	$eMail = $_POST["eMail"];
	$phone = $_POST["phone"];
	$webURL = $_POST["webURL"];

	$user = array(
			'firstName' => $firstName,
			'lastName' => $lastName,
			'address' => $address,
			'city' => $city,
			'state' => $state,
			'zipCode' => $zipCode,
			'eMail' => $eMail,
			'phone' => $phone,
			'webURL' => $webURL
		);
	return $user;
}


$user_data = input_form();
	
	foreach ($user_data as $value){
	  if ($value == $user_data['state'])
	  {
	 	 $temp = strtoupper($value);

	 	 if ( $temp == "FL" ){
	  		$user_data['state'] = "The Sunshine State"; 
	  	}
	 	 else if ( $temp == "NY" ){
	  		$user_data['state'] = "The Big Apple";
	  	}
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

            	<h2><?echo $user_data['firstName']." ".$user_data['lastName']?></h2>
            
            	<h2><?echo $user_data['address']?></h2>

            	<h2><?echo $user_data['city']?></h2>
            	
            	<h2><?echo $user_data['state']?></h2>

            	<h2><?echo $user_data['zipCode']?></h2>

            	<h2><?echo $user_data['eMail']?></h2>	

            	<h2><?echo $user_data['phone']?></h2>

           	    <h2><a href=<?echo $user_data['webURL']?>>LINK<a></h2>	
	
            </fieldset>
            
        </div>

    </body>
</html>
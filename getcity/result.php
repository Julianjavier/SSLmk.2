<?
if($_POST['submit']){
  $raw_info = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$_POST['city']);
  
  $data = json_decode($raw_info);
  $raw_temp = $data->{'main'}->{'temp'};
  $current = round(($raw_temp * (9/5)) - 459.67);
  $humidity = $data->{'main'}->{'humidity'};
  $condition = $data->{'weather'}[0]->{'main'};

  // echo $current;
  // echo $humidity;
  // echo $condition;

}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src='http://code.jquery.com/jquery-2.1.0.min.js'></script>
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      var cityies = [];

      $('#city').keyup(function(){
        $.ajax({
          url:'cityresponse.php',
          type:'get',
          data:{cityget:$(this).val()},
          dataType:'json',
          
          success: function(city){
            for (var i in city){
              cityies.push(city[i].city+', '+city[i].region)
            }

              $('#city').autocomplete({
                source: cityies,
                delay: 90
              });
          }
        });
      });
    });
  </script>

</head>
<body>
 
<div>
  <form action="" method="post">
    <div class="ui-widget">
      <label for="city">Enter City </label>
      <input type="text" id="city" placeholder="City:"/>
      <input type="submit" id="submit">
    </div>
  </form>  

  <div>
    <h2>Current weather for <? echo $_POST['city']; ?></h2>
    <h4>Current temperature is: <? echo $current; ?> F</h4>
    <h4>Current humidity is: <? echo $humidity; ?>%</h4>
    <h4>Current conditon is: <? echo $condition; ?></h4>
  </div>  

</div>
 
 
</body>
</html>
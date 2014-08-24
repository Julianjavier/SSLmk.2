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
<?
session_start();
echo $_SESSION['firstName'];

$_SESSION["firstname"] = $_GET["firstName"];
$_SESSION["lastname"] = $_GET["lastName"];
$_SESSION["username"] = $_GET["userName"];

var_dump($_SESSION["firstname"]);
var_dump($_SESSION["lastname"]);
var_dump($_SESSION["username"]);
?>


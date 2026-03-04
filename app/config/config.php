<?php
session_start();

$servername= "sql306.infinityfree.com";
$db_username = "if0_35128247";
$db_password = "wX1dR1bR9E";
$database_name = "if0_35128247_shop";

$conn=mysqli_connect($servername, $db_username, $db_password, $database_name);

if(!$conn){
die("Neuspesna konekcija");

}
?>
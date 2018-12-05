<?php
//Database Connection
$server = "localhost";
$uname = "root";
$pass = "sa";
$db = "drizzle_db";

$conn = mysqli_connect($server,$uname,$pass,$db);
if(mysqli_connect_error()){
  die("Connection Failed! =>".mysqli_connect_error());
}else {
  
}
 ?>

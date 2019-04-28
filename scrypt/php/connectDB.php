<?php

$serverName = "localhost";
$dbName = "passwordvault";
$userName = "root";
$pswDB = "";

$conDB = mysqli_connect($serverName, $userName, $pswDB, $dbName);

if(!$conDB){
  die("Connection Error".mysqli_connect_errno());
}
else{
  echo "Connection Successful!";
}
?>

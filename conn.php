<?php

$host = "localhost";
$username = "root";
$password = "";
$dbName = "fasion";
$conn = mysqli_connect($host, $username, $password, $dbName);
if(!$conn){
    die("error". mysqli_connect_error());
}

?>


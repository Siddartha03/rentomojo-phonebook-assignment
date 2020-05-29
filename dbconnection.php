<?php

//Object oriented method to connect to DB
$serverName = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($serverName,$username,$password);
// if(!$conn){
//     echo "Error occured";
// }else {
//     echo "Success";
// }

$q = "create database rentomojo";
$res = $conn->query($q);

include('createtable.php');
?>

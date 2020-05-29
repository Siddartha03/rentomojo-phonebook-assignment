<?php
  include "dbconnection.php";
  if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $q = "delete from phonebook where id=$id";
    if($conn->query($q)) {
        header("Location:index.php");
    }else {
        echo "Error in deleting";
    }
  }  
?>
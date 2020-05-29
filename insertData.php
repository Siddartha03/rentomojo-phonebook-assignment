<?php

//Fetch values from the form
$name=$dob=$mobile=$mobile2=$mobile3=$email=$email2=$email3="";
if(isset($_POST["submit"]))
{
    include "dbconnection.php";
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
   
    $q = "insert into phonebook(name,dob,mobile,email)values('$name','$dob','$mobile','$mobile2','$mobile3','$email','$email2','$email3')";
    $res = $conn->query($q);
    if($res)
    {
        header("Location:home.php");
    }
}
?>
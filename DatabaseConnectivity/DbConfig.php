<?php 

$localhost = "localhost";
$username = "root";
$password = "";

$con = @new mysqli($localhost,$username,$password,"catalog");

if($con->connect_error){
    die("error $con->error");
}

?>
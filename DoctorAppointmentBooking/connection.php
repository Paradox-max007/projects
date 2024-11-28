<?php
$hostname='localhost';
$user='root';
$password='';
$database='appointment';
$con=new mysqli($hostname,$user,$password,$database);

if($con->connect_error) {
die("connection failed".$con->connect_error);
}

?>
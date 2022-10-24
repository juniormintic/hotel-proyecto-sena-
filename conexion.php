<?php
$servername="localhost";
$username="root";
$password="";
$dbname="1hotel";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("connection falied: " . $conn->connect_erroe);
}
?>
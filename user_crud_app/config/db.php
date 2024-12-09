<?php
$host='localhost';
$user='root';
$pass='';
$db_name='crud_practice';

$conn = new mysqli($host,$user,$pass,$db_name);
if($conn->connect_error){
    die("connection failed: ". $conn->connect_error);
}
?>
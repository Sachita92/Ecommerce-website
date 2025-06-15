<?php 

$host="localhost";
$username="root";
$password="";
$database="major_project";

$conn=mysqli_connect($host,$username,$password,$database);

if(!$conn){
    die($conn);
}
?>
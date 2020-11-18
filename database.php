<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "smooth_serve";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
    die('Could not connect MySql' .mysql_error());
}
?>
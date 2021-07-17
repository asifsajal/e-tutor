<?php
$connection = mysqli_connect('localhost', 'root', '');
if(!$connection){
	die("Database Connection Failed" . mysqli_error($connection));
}
$selectdb = mysqli_select_db($connection, 'tutordb');
if(!$selectdb){
	die("Database Selection Failed" . mysqli_error($connection));
}
?>
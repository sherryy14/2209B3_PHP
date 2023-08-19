<?php 

$connection = mysqli_connect('localhost','root','','2209b3form');
// property name 

$name = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$city = $_POST['city'];

$insert = "INSERT INTO `student_record` (`name`, `email`, `phone`, `age`, `city`) VALUES ('$name', '$email', '$phone', '$age', '$city')";
mysqli_query($connection, $insert);



?>
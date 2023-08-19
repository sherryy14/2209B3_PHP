<?php 

$connection = mysqli_connect('localhost','root','','2209b3form');

$search = $_POST['search'];
// LIKE operator 
$fetch = "SELECT * FROM `student_record` WHERE `name` LIKE '$search%'";
$res = mysqli_query($connection,$fetch);


$output = '';
while($row = mysqli_fetch_assoc($res)){
    $output .= "
        <tr>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[age]</td>
        <td>$row[city]</td>
        <td>$row[phone]</td>
        </tr>
    ";
}

echo $output;


?>
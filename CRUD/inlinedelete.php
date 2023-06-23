<?php 
include 'config.php';

$id = $_GET['id'];

$delete = "DELETE FROM `studentrecord` WHERE id = $id";
$deleteRes = mysqli_query($conn,$delete);

if($deleteRes){
    header("location: index.php");
}

?>
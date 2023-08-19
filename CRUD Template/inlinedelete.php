<?php 
include 'config.php';

$id = $_GET['id'];

$delete = "DELETE FROM `student` WHERE id = $id";

$result = mysqli_query($conn, $delete);

if ($result) {
    echo "<script>alert('Student Deleted Successfully');</script>";
    echo "<script>window.location.href='index.php';</script>";

    // header('location: index.php');
}

?>
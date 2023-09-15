<?php 

session_start();
// button pe click 

if(isset($_SESSION['username'])){
    header("location:index.php");
}

if(isset($_POST['login'])){
    $username = $_POST['username'];   
    $_SESSION['username'] = $username; 
}

?>

<form method="post">
    <input type="text" name="username">
    <input type="submit" value="Login" name='login'>
</form>
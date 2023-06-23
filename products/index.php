<?php 

// session_start();

// if(!isset($_SESSION['user'])){
//     header("Location: login.php");
// }


// if(isset($_POST['logout'])){
//     session_unset();
//     session_destroy();

//     header("Location: login.php");

// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['user'];?></h1>

    <form method="post">
        <input type="submit" value="Logout" name='logout'>
    </form>
</body>
</html>
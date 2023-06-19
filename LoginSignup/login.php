<?php 

session_start();

if(isset($_SESSION['user'])){
  header("Location: index.php");
}

$conn = mysqli_connect('localhost','root','','2209B3form') or die("Failed to connect DB");

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $query = "SELECT * FROM `users` WHERE email = '$email' AND passowrd = '$pass'";

  $res = mysqli_query($conn, $query);

  if($email == '' || $pass = ''){

    $fill = "Please fill input fields";

  }elseif(mysqli_num_rows($res) ==1){

    $_SESSION['user'] = $email;

    header("Location: index.php");
  }else{
    $error = "Incorrect email or password";
  }

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Log In</title>
</head>
<body>
    <div class="container my-5">

    <h6 class="text-danger text-center"> <?php echo  @$fill;?> </h6>
<form class="row g-3" method="post">

  <div class="col-md-4 offset-2">
    <label for="validationDefault02" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="validationDefault02"  >
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Password</label>
    <input type="password" class="form-control" name="pass" id="validationDefault02" >
  </div>

  <div class="col-12 d-flex justify-content-center">
      <button class="btn btn-primary mx-3" name="login" type="submit">Log In</button>
      <a href="signup.php">Not registered?</a>

  </div>

  <h6 class="text-danger"> <?php echo  @$error;?> </h6>
  
</form>
</div>
</body>
</html>
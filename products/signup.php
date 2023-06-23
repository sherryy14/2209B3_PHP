<?php 

$conn = mysqli_connect('localhost','root','','2209B3form') or die("Failed to connect DB");

session_start();

if(isset($_SESSION['user'])){
  header("Location: index.php");
}


if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $check = "SELECT * FROM `users` WHERE email = '$email'";
    $checkres = mysqli_query($conn, $check);


    if(mysqli_num_rows($checkres)> 0){
        $exist = "This email is already exist";
    }else{
        $query = "INSERT INTO `users` ( `name`, `email`, `passowrd`) VALUES ( '$name', '$email', '$pass')";
        
        $res = mysqli_query($conn,$query);

        if($res){
            // header("Location: login.php");
            $success = "Successfully Sign Up";

            echo "<script>
                    setTimeout(() => {
                        window.location.href = 'login.php'
                    }, 1000);
                </script>";
        }        
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
    <title>Sign Up</title>
</head>
<body>
    <div class="container my-5">

    
<form class="row g-3" method="post">
  <div class="col-md-4 offset-2">
    <label for="validationDefault01" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="validationDefault01" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="validationDefault02"  required>
  </div>
  <div class="col-md-4 offset-4">
    <label for="validationDefault02" class="form-label">Password</label>
    <input type="password" class="form-control" name="pass" id="validationDefault02" required>
  </div>


    
    <div class="col-12 d-flex justify-content-center">
      <button class="btn btn-primary mx-3" name="signup" type="submit">Sign Up</button>
      <a href="login.php">Already an account?</a>

  </div>

  <h6 class="text-danger"> <?php echo  @$exist;?> </h6>
  <h6 class="text-success"> <?php echo  @$success;?> </h6>
</form>
</div>
</body>
</html>
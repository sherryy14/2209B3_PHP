<?php 

// $pass = 'admin';

// // sha1
// $sha = sha1($pass);

// echo "Original Pass: $pass || Encrypted By Sha1: $sha <br><br>";

// $md = md5($pass);

// echo "Original Pass: $pass || Encrypted By md5: $md <br><br>";

// // BLOWFISH 
//                         // User input , algorithm name 
// $blowFish = password_hash($pass, CRYPT_BLOWFISH);
// echo "Original Pass: $pass || Encrypted By Blowfish: $blowFish <br><br>";


// $decode = password_verify($pass, $blowFish);

// if($decode){
//     echo "OK";
// }else{
//     echo "Not OK";
// }

$conn = mysqli_connect('localhost','root','','2209b3form');
if(isset($_POST['submit'])){

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $userReg = "/[a-z,A-Z](\_|\.)[a-z,A-Z,0-9]{5,15}/";
    $passReg = "/[A-Z][a-z,0-9]{6,10}[\.\@\#\!]/";

    if($user !== '' && $pass !==''){

                // reguler exp, user input 
        if(preg_match($userReg,$user) && preg_match($passReg,$pass)){
            
            // algorithm 
            $password = password_hash($_POST['pass'], CRYPT_BLOWFISH);
            
            // insert query 
             $insert = "INSERT INTO `hash` (`username`, `password`) VALUES ('$user', '$password')";
             $res = mysqli_query($conn,$insert);

             if($res){
                $succes =  "User Registered";
             }

        }else{
            $req = "Please match the patterns";
        }

    }else{
        $req = 'All field are required';
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
    <h1 class="text-center">Signup Using Hashing Algorithm</h1>
        <form method="post">
            <div class="row">
                <div class="col-6">

                    <input type="text" name='user' class='form-control' placeholder="Enter Username">
                </div>
                <div class="col-6">

                    <input type="password" name='pass' class='form-control' placeholder='Enter Password'>
                </div>
                <div class="col-12 mt-2">
                    <p class="text-danger text-center"><?php echo @$req;?></p>
                    <p class="text-success text-center"><?php echo @$succes;?></p>
                </div>
                <div class="col-12 my-3 d-flex justify-content-center">

                    <input type="submit" name='submit' class='btn btn-dark'>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
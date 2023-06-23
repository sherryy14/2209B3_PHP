<?php 
$conn = mysqli_connect('localhost','root','','2209b3form');

session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
  }

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $image = $_FILES['file'];

    $image_name = $image['name'];
    $temp_name = $image['tmp_name'];
    $image_size = $image['size'];

    if($image_size <=1000000){
        move_uploaded_file($temp_name, "images/$image_name");

        $insert = "INSERT INTO `products` (`title`, `description`, `price`, `image`) VALUES ('$title', '$desc', '$price', '$image_name')";
        $result = mysqli_query($conn,$insert);

        if($result){
            $success = "Product has been added into your database";
        }else{
            $failed = "Product failded to upload";
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
    <title>Add Products</title>
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center">Add Products</h2>
        <div class="container d-flex justify-content-end">
            <a href="products.php" class='btn btn-success'>Show Products</a>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter title" name='title'>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter description" name='desc'></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Price</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter price" name='price'>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Image</label>
                <input class="form-control" type="file" id="formFile" name='file'>
            </div>
            <div class="mb-3">
                <button type="submit" class='btn btn-primary' name='submit'>Upload</button>
            </div>


        </form>
        <h4 class="text-success"><?php echo @$success;?></h4>
        <h4 class="text-warning"><?php echo @$failed;?></h4>
    </div>
</body>

</html>
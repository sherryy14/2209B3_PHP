<?php

if(isset($_POST['upload'])){
    $image = $_FILES['file'];

    $img_name = $image['name'];
    $temp_name = $image['tmp_name'];
    $img_size = $image['size'];
    $img_type = $image['type'];


    // echo "<pre>";
    // print_r($image);
    // echo "</pre>";


    if($img_type == 'image/jpeg' || $img_type == 'image/jpg' || $img_type == 'image/jfif' || $img_type == 'image/png'){

        if($img_size <=1000000){
            move_uploaded_file($temp_name,"images/$img_name");
        }else{
            $error = "Please choose image less than 1 mb.";
        }
    }else{
        $error = "Image type must be jpg/jpeg/png";
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
    <title>Document</title>
</head>

<body>
    <div class="container my-5">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Your Product</label>
                <input class="form-control" type="file" id="formFile" name='file'>
            </div>

            <button type="submit" name='upload' class='btn btn-primary'>Upload</button>

            <h5 class="text-danger"><?php echo @$error;?></h5>
        </form>
    </div>

    
</body>

</html>
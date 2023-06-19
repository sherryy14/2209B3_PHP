<?php 

function products($title, $desc, $price, $image){
    echo "<div class='col-lg-4'>
    <div class='card' style='width: 18rem;'>
  <img src='$image' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$title</h5>
    <p class='card-text'>$desc</p>
    <p class='card-text'>$price</p>
    <a href='#' class='btn btn-primary'>Add To Cart</a>
  </div>
</div>
</div>
    
    ";
}



?>


<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>products</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>
</head>
<body>
    <div class="container">
        <div class="row">
        <?php products("Chocolate","Choco Bisconi","$99","product-img-1.jpg")?>
        <?php products("Chocolate","Choco Bisconi","$99","product-img-2.jpg")?>
        <?php products("Chocolate","Choco Bisconi","$99","product-img-3.jpg")?>
        </div>
    </div>
</body>
</html>
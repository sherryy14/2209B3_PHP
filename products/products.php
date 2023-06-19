<?php 
$conn = mysqli_connect('localhost','root','','2209b3form');


$fetch = "SELECT * FROM `products`";
$res = mysqli_query($conn,$fetch);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Products</title>
</head>
<style>
    .card{
        transition: 0.2s;
    }
    .card:hover{
        box-shadow: 0 0 6px 2px gray;
    }
</style>

<body>
    <div class="container my-5">
    <h2 class="text-center">Products</h2>
    <div class="container d-flex justify-content-end">
            <a href="add-products.php" class='btn btn-success'>Add Products</a>
        </div>
       
        <div class="row">
        <?php 
        while($row = mysqli_fetch_assoc($res)){

        
        ?>
            <div class="col-lg-4">
                <div class="card" style="width: 20rem;">
                    <img src="images/<?php echo $row['image'];?>" class="card-img-top" alt="..." height="300px">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $row['title'];?></h4>
                        <p class="card-text"><?php echo $row['description'];?></p>
                        <h6 class="card-title">Price: <?php echo $row['price'];?> Rs</h6>
                        <a href="#" class="btn btn-primary">Add To Cart</a>
                    </div>
                </div>
            </div>
<?php }?>
        </div>
    </div>
</body>

</html>
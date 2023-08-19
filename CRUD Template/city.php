<?php 
include 'header.php';

if(isset($_POST['add'])){

    $name = $_POST['name'];

    $insert = "INSERT INTO `city` (`ct_name`) VALUES ('$name')";
   mysqli_query($conn,$insert);
   
}

?>


<div class="container bg-body-tertiary py-3">
<h2 class="my-3">Add City</h2>
    <form method="post" class="d-flex justify-content-center flex-column align-items-center">
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="name" id="floatingInput" placeholder="City Name" autocomplete="off" required>
            <label for="floatingInput">City</label>
        </div>
        

        <input type="submit" value="Send" name='add' class="btn btn-dark">
    </form>
</div>


</div>
</body>
</html>
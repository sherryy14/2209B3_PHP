<?php
include 'header.php';

if(isset($_POST["send"])){
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $insert = "INSERT INTO `student` ( `name`, `address`, `course`, `city`, `phone`) VALUES ( '$name', '$address', '$course', '$city', '$phone')";
    $result = mysqli_query($conn, $insert);
    if($result){
        header('location: index.php');
    }
}


?>


<div class="container bg-body-tertiary py-3">
<h2 class="my-3">Add Record</h2>
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Your full name" autocomplete="off" required>
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="address" id="floatingPassword" placeholder="Your complete address" autocomplete="off" required>
            <label for="floatingPassword">Address</label>
        </div>
        <select class="form-select mb-3 w-50" name="course" aria-label="Default select example" required>
                    <option selected disabled>Course</option>
                    <?php 
                    $course = "SELECT * FROM `course`";
                    $courseRes = mysqli_query($conn,$course);
                    
                    while($crRow = mysqli_fetch_assoc($courseRes)){

                    

                    ?>

                    <option value='<?php echo $crRow['cr_id']?>'><?php echo $crRow['cr_name']?></option>
                   
                        <?php }?>
                   
                </select>
        <select class="form-select mb-3 w-50" name="city" aria-label="Default select example" required>
                    <option selected disabled>City</option>
                    <?php 
                    $city = "SELECT * FROM `city`";
                    $cityRes = mysqli_query($conn,$city);
                    
                    while($ctRow = mysqli_fetch_assoc($cityRes)){

                    

                    ?>

                    <option value='<?php echo $ctRow['ct_id']?>'><?php echo $ctRow['ct_name']?></option>
                   
                        <?php }?>

                   
                </select>
        <div class="form-floating mb-3 w-50">
            <input type="tel" class="form-control" name="phone" id="floatingPhone" placeholder="Your phone number" autocomplete="off" required>
            <label for="floatingPhone">Phone</label>
        </div>

        <input type="submit" value="Send" name='send' class="btn btn-dark">
    </form>
</div>


</div>
</body>
</html>
<?php
include 'header.php';

$id = $_GET['id'];
$fetch = "SELECT * FROM `student` WHERE id = $id";
$res = mysqli_query($conn,$fetch);
$row = mysqli_fetch_array($res);


if(isset($_POST["update"])){
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $update = "UPDATE `student` SET `name` = '{$name}', `address` = '{$address}', `course` = $course, `city` = $city, `phone` = '{$phone}' WHERE id = $id";
    $updateRes = mysqli_query($conn,$update);
    if($updateRes){
        header("location: index.php");
    }
}


?>



<div class="container bg-body-tertiary py-3">
    <h2>Update Records</h2>
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">

                <input type="hidden" class="form-control" name="hidden" value=''>

                <div class="form-floating mb-3 w-50">
                    <input type="text" class="form-control" name="name" value='<?php echo $row[1]?>' id="floatingInput" placeholder="Your full name" autocomplete="off">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3 w-50">
                    <input type="text" class="form-control" name="address" value='<?php echo $row['address']?>' id="floatingPassword" placeholder="Your complete address" autocomplete="off">
                    <label for="floatingPassword">Address</label>
                </div>
                <select class="form-select mb-3 w-50" name="course" aria-label="Default select example" required>
                    <option  disabled>Course</option>
                    <?php 
                    $course = "SELECT * FROM `course`";
                    $courseRes = mysqli_query($conn,$course);
                    
                    while($crRow = mysqli_fetch_assoc($courseRes)){
                        if($crRow['cr_id'] == $row['course']){
                            $crSelect = "selected";
                        }else{
                            $crSelect = "";

                        }

                    

                    ?>

                    <option  <?php echo $crSelect?> value='<?php echo $crRow['cr_id']?>'><?php echo $crRow['cr_name']?></option>
                   
                        <?php }?>
                   
                </select>
        <select class="form-select mb-3 w-50" name="city" aria-label="Default select example" required>
                    <option  disabled>City</option>
                    <?php 
                    $city = "SELECT * FROM `city`";
                    $cityRes = mysqli_query($conn,$city);
                    
                    while($ctRow = mysqli_fetch_assoc($cityRes)){
                        if($ctRow['ct_id'] == $row['city']){
                            $ctSelect = "selected";
                        }else{
                            $ctSelect = "";

                        }
                    

                    ?>

                    <option <?php echo $ctSelect;?> value='<?php echo $ctRow['ct_id']?>'><?php echo $ctRow['ct_name']?></option>
                   
                        <?php }?>

                   
                </select>

                <div class="form-floating mb-3 w-50">
                    <input type="tel" class="form-control" name="phone" value='<?php echo $row[5]?>' id="floatingPhone" placeholder="Your phone number" autocomplete="off">
                    <label for="floatingPhone">Phone</label>
                </div>


                <input type="submit" value="Update" name='update' class="btn btn-dark">

     
    </form>
</div>


</div>
</body>

</html>
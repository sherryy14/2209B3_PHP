<?php
include 'header.php';

// data fetch 
if (isset($_POST['show'])) {
    // id from user input
    $id = $_POST['id'];
    $fetch = "SELECT * FROM `student` WHERE id = $id";
    $res = mysqli_query($conn, $fetch);
    $row = mysqli_fetch_array($res);
}

// data update 

if(isset($_POST["update"])){
    // id from hidden field 
    $sid = $_POST['sid'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $update = "UPDATE `student` SET `name` = '{$name}', `address` = '{$address}', `course` = $course, `city` = $city, `phone` = '{$phone}' WHERE id = $sid";
    $updateRes = mysqli_query($conn,$update);
    if($updateRes){
        header("location: index.php");
    }
}
?>



<div class="container bg-body-tertiary py-3">
    <h2 class="my-3">Edit Record</h2>
    <form method="post" class="d-flex justify-content-center flex-column align-items-center">
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="id" id="floatingInput" placeholder="Your ID" autocomplete="off" required>
            <label for="floatingInput">ID</label>
        </div>
        <input type="submit" value="Show" name='show' class="btn btn-dark">
    </form>


    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">
        <input type="hidden" name="sid"  value='<?php echo @$row[0]?>'>
        <div class="form-floating mb-3 w-50 mt-5">
            <input type="text" class="form-control" value='<?php echo @$row[1]?>' name="name" id="floatingInput" placeholder="Your full name" autocomplete="off" required>
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="address" value='<?php echo @$row[2]?>' id="floatingPassword" placeholder="Your complete address" autocomplete="off" required>
            <label for="floatingPassword">Address</label>
        </div>
        <select class="form-select mb-3 w-50" name="course" aria-label="Default select example" required>
            <option selected disabled>Course</option>
            <?php
            $course = "SELECT * FROM `course`";
            $courseRes = mysqli_query($conn, $course);

            while ($crRow = mysqli_fetch_assoc($courseRes)) {
                if($crRow['cr_id'] == $row['course']){
                    $crSelect = 'selected';
                }else{
                    $crSelect = '';

                }

            ?>

                <option <?php echo $crSelect;?> value='<?php echo $crRow['cr_id'] ?>'><?php echo $crRow['cr_name'] ?></option>

            <?php } ?>

        </select>
        <select class="form-select mb-3 w-50" name="city" aria-label="Default select example" required>
            <option selected disabled>City</option>
            <?php
            $city = "SELECT * FROM `city`";
            $cityRes = mysqli_query($conn, $city);

            while ($ctRow = mysqli_fetch_assoc($cityRes)) {

                if($ctRow['ct_id'] == $row['city']){
                    $ctSelect = 'selected';
                }else{
                    $ctSelect = '';

                }

            ?>

                <option <?php echo $ctSelect;?> value='<?php echo $ctRow['ct_id'] ?>'><?php echo $ctRow['ct_name'] ?></option>

            <?php } ?>


        </select>
        <div class="form-floating mb-3 w-50">
            <input type="tel" class="form-control" name="phone" value='<?php echo @$row[5]?>' id="floatingPhone" placeholder="Your phone number" autocomplete="off" required>
            <label for="floatingPhone">Phone</label>
        </div>

        <input type="submit" value="Update" name='update' class="btn btn-dark">
    </form>
</div>



</div>
</body>

</html>
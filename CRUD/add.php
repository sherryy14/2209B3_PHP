<?php
include 'header.php';

if(isset($_POST['send'])){
    $phone =$_POST['phone'];
    $name =$_POST['name'];
    $address =$_POST['address'];
    $course =$_POST['course'];

    $insert = "INSERT INTO `studentrecord` (`name`, `address`, `course`, `phone`) VALUES ('$name', '$address', '$course', '$phone')";
    $result = mysqli_query($conn,$insert);
    if($result){
        header("Location: index.php");
    }
}

?>


<div class="container bg-body-tertiary py-5">
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
            <option selected disabled>Courses</option>

            <?php
            $courses = "SELECT * FROM  `courses`";
            $coursesResult = mysqli_query($conn, $courses);

            while ($row = mysqli_fetch_assoc($coursesResult)) {


            ?>

                <option value='<?php echo $row['cid']?>'> <?php echo $row['cname']?> </option>

            <?php
            }
            ?>

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
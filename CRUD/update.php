<?php
include 'header.php';

if (isset($_POST['show'])) {
    $id = $_POST['sid'];

    $fetch = "SELECT * FROM `studentrecord` AS s JOIN `courses` AS c ON s.course = c.cid WHERE id = $id";
    $res = mysqli_query($conn, $fetch);
}
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];

    $update = "UPDATE `studentrecord` SET name = '{$name}', address = '{$address}', course = '{$course}', phone = '{$phone}' WHERE id = '{$id}'";

    $updateRes = mysqli_query($conn,$update);

    if($updateRes){
        header("location: index.php");
    }
}
?>



<div class="container bg-body-tertiary py-3">
    <h2 class="my-3">Edit Record</h2>
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="sid" id="floatingInput" placeholder="Your ID" autocomplete="off" required>
            <label for="floatingInput">ID</label>
        </div>
        <input type="submit" value="Show" name='show' class="btn btn-dark">
    </form>


    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">
        <?php
        if (@$res) {



            $row = mysqli_fetch_assoc($res);
        ?>
         <div class="form-floating mb-3 w-50 mt-5">
                <input type="hidden" class="form-control" name="id" id="floatingInput" value="<?php echo $row['id'] ?>" >
            </div>


            <div class="form-floating mb-3 w-50 mt-5">
                <input type="text" class="form-control" name="name" id="floatingInput" value="<?php echo $row['name'] ?>" placeholder="Your full name" autocomplete="off" required>
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3 w-50">
                <input type="text" class="form-control" name="address" id="floatingPassword" value="<?php echo $row['address'] ?>" placeholder="Your complete address" autocomplete="off" required>
                <label for="floatingPassword">Address</label>
            </div>
            <select class="form-select mb-3 w-50" name="course" aria-label="Default select example" required>
                <option selected disabled>Course</option>
                <?php
                $course = "SELECT * FROM `courses`";
                $courseRes = mysqli_query($conn, $course);
                while ($cRow = mysqli_fetch_assoc($courseRes)) {
                    if($row['course'] == $cRow['cid']){
                        $select = "selected";
                    }else{
                        $select = "";
                    }


                ?>

                    <option <?php echo $select?> value="<?php echo $cRow['cid']?>"><?php echo $cRow['cname']?></option>
                <?php   }
                ?>

            </select>
            <div class="form-floating mb-3 w-50">
                <input type="tel" class="form-control" name="phone" id="floatingPhone" value="<?php echo $row['phone'] ?>" placeholder="Your phone number" autocomplete="off" required>
                <label for="floatingPhone">Phone</label>
            </div>

            <input type="submit" value="Update" name='update' class="btn btn-dark">

        <?php
        }
        ?>
    </form>
</div>



</div>
</body>

</html>
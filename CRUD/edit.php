<?php
include 'header.php';
$sid = $_GET['id'];

$fetch = "SELECT * FROM `studentrecord` WHERE id  = $sid";
$res = mysqli_query($conn,$fetch);


if(isset($_POST['update'])){
    $name =$_POST['name'];
    $address =$_POST['address'];
    $course =$_POST['course'];
    $phone =$_POST['phone'];

    $update = "UPDATE `studentrecord` SET name = '{$name}', address = '{$address}', course = $course, phone = '{$phone}' WHERE id = '{$sid}'";
    $updateRes = mysqli_query($conn,$update);
    if($updateRes){
        header("location: index.php");
    }
}

?>


<div class="container bg-body-tertiary py-3">
    <h2>Update Records</h2>
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">

    <?php 
    $row = mysqli_fetch_assoc($res);
    ?>

             

                <div class="form-floating mb-3 w-50">
                    <input type="text" class="form-control" name="name" value=' <?php echo $row['name']?>' id="floatingInput" placeholder="Your full name" autocomplete="off">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3 w-50">
                    <input type="text" class="form-control" name="address" value=' <?php echo $row['address']?>' id="floatingPassword" placeholder="Your complete address" autocomplete="off">
                    <label for="floatingPassword">Address</label>
                </div>
                <select class="form-select mb-3 w-50" name="course" aria-label="Default select example" required>
                    <option selected disabled>Courses</option>

                    <?php 
                    $courses = "SELECT * FROM `courses`";
                    $courseRes = mysqli_query($conn,$courses);
                    while($cRow = mysqli_fetch_array($courseRes)){
                        if($row['course'] == $cRow['cid']){
                            $select = 'selected';
                        }else{
                            
                            $select = '';
                        }
                   
                    ?>
                    
                    <option <?php echo $select?> value='<?php echo $cRow[0]?>'><?php echo $cRow[1] ?></option>
                    
                    <?php 
                     }
                    ?>

                   
                </select>


                <div class="form-floating mb-3 w-50">
                    <input type="tel" class="form-control" name="phone" value= '<?php echo $row['phone']?>' id="floatingPhone" placeholder="Your phone number" autocomplete="off">
                    <label for="floatingPhone">Phone</label>
                </div>


                <input type="submit" value="Update" name='update' class="btn btn-dark">

     
    </form>
</div>


</div>
</body>

</html>
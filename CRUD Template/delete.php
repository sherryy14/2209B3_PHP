<?php
include 'header.php';

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $delete = "DELETE FROM `student` WHERE id = $id";
    $res = mysqli_query($conn,$delete);
    if($res){
        $success = "Record Has Been Deleted 😎";
        echo "<script>
        setTimeout(() => {
            window.location.href = 'index.php'
        }, 1000);
    </script>";
      
    }
}

?>


<div class="container bg-body-tertiary py-3">
    <h2 class="my-3">Delete Record</h2>
    <h6 class='text-success text-center' id='delete'><?php echo @$success;?></h6>
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="id" id="floatingInput" placeholder="Your ID" autocomplete="off" required>
            <label for="floatingInput">ID</label>
        </div>
        <input type="submit" value="Delete" name='delete' class="btn btn-dark">
    </form>

</div>
</div>
</body>

</html>
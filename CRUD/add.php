<?php
include 'header.php';
include 'config.php';


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
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="class" id="floatingAddress" placeholder="Your class" autocomplete="off" required>
            <label for="floatingAddress">Class</label>
        </div>
       
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
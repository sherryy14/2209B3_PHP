<?php
include 'header.php';
include 'config.php';


?>



<div class="container bg-body-tertiary py-3">
    <h2>Update Records</h2>
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">

                <input type="hidden" class="form-control" name="hidden" value=''>

                <div class="form-floating mb-3 w-50">
                    <input type="text" class="form-control" name="name" value='' id="floatingInput" placeholder="Your full name" autocomplete="off">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3 w-50">
                    <input type="text" class="form-control" name="address" value='' id="floatingPassword" placeholder="Your complete address" autocomplete="off">
                    <label for="floatingPassword">Address</label>
                </div>
                <select class="form-select mb-3 w-50" name="class" aria-label="Default select example" required>
                    <option disabled>Class</option>
                    
                    <option value=''>IT</option>
                    <option value=''>CS</option>
                    <option value=''>SE</option>
                    <option value=''>BSCS</option>

                   
                </select>


                <div class="form-floating mb-3 w-50">
                    <input type="tel" class="form-control" name="phone" value='' id="floatingPhone" placeholder="Your phone number" autocomplete="off">
                    <label for="floatingPhone">Phone</label>
                </div>


                <input type="submit" value="Update" name='update' class="btn btn-dark">

     
    </form>
</div>


</div>
</body>

</html>
<?php 

include 'header.php';

if(isset($_POST['submit'])){
    $name = $_POST['cat_name'];
    $pc_name = $_POST['category'];

    $insert = "INSERT INTO `sub_category` (`sc_name`, `sc_category`) VALUES ('$name', '$pc_name')";
    $res = mysqli_query($conn,$insert);
}
?>

               <!-- main -->
            <main class="main-content-wrapper">
                   <!-- container -->
                <div class="container">
                       <!-- row -->
                    <div class="row mb-8">
                        <div class="col-md-12">
                            <div class="d-md-flex justify-content-between align-items-center">
                                   <!-- page header -->
                                <div>
                                    <h2>Add New Category</h2>
                                       <!-- breacrumb -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="#" class="text-inherit">Categories</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add New Category</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div>
                                    <a href="categories.html" class="btn btn-light">Back to Categories</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <!-- card -->
                            <div class="card mb-6 shadow border-0">
                                <!-- card body -->
                                <div class="card-body p-6 ">
                                   
                                    <h4 class="mb-4 h5 mt-5">Category Information</h4>

                                    <form method="post">
                                    <div class="row">
                                        <!-- input -->
                                        <div class="mb-3 col-lg-6">
                                            <label class="form-label">Category Name</label>
                                            <input type="text" class="form-control" name="cat_name" placeholder="Category Name"
                                                required>
                                        </div>
                                     
                                        <!-- input -->
                                        <div class="mb-3 col-lg-6">
                                            <label class="form-label">Parent Category</label>
                                            <select class="form-select" name='category'>
                                                <option selected disabled>Category Name</option>
                                                <?php 
                                                $category = "SELECT * FROM `parent_category`";
                                                $categoryRes = mysqli_query($conn,$category);
                                                while ($catRow=mysqli_fetch_assoc($categoryRes)) {
                                                ?>
                                                <option value="<?php echo $catRow['pc_id']?>"><?php echo $catRow['pc_name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                       

                                        <div class="col-lg-12">
                                           <input type="submit" value="Create Category" name="submit" class="btn btn-primary">
                                           
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </main>

        </div>
  
    <script src="../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>
    <script src="../assets/libs/quill/dist/quill.min.js"></script>
    <script src="../assets/js/vendors/editor.js"></script>
    <script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>


</body>


<!-- Mirrored from freshcart.codescandy.com/dashboard/add-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Mar 2023 10:11:28 GMT -->
</html>
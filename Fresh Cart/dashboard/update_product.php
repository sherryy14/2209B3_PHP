<?php 
include 'header.php';

$id = $_GET['id'];

$fetch = "SELECT * FROM `products` WHERE id = $id";
$fetchRes = mysqli_query($conn,$fetch);
$row = mysqli_fetch_assoc($fetchRes);

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $weight = $_POST['weight'];
    $unit = $_POST['unit'];
    $description = $_POST['description'];

    $code = $_POST['code'];
    $dimension = $_POST['dimension'];
    $status = $_POST['status'];
    $price = $_POST['price'];

    // images 
    $img1 = $_FILES['img1'];
    $img_name1 = $img1['name'];
    $tmp_name1 = $img1['tmp_name'];

    $img2 = $_FILES['img2'];
    $img_name2 = $img2['name'];
    $tmp_name2 = $img2['tmp_name'];

    $img3 = $_FILES['img3'];
    $img_name3 = $img3['name'];
    $tmp_name3 = $img3['tmp_name'];

    $img4 = $_FILES['img4'];
    $img_name4 = $img4['name'];
    $tmp_name4 = $img4['tmp_name'];



    if (isset($_POST['stock']) == "on") {
        $stock = "In Stock";
    } else{
        $stock = "Out Of Stock";
    }


    $update = "UPDATE `products` SET title = $title, category = $category, price = $price, weight = $weight, code = $code, status= $status, availblity= $stock, unit = $unit, description= $description, dimension = $dimension, img1 = $img_name1, img2 = $img_name2, img3 = $img_name3, img4 = $img_name4";

    $res = mysqli_query($conn, $update);

    if($res){
        move_uploaded_file($tmp_name1, "../assets/images/products/$img_name1");
        move_uploaded_file($tmp_name2, "../assets/images/products/$img_name2");
        move_uploaded_file($tmp_name3, "../assets/images/products/$img_name3");
        move_uploaded_file($tmp_name4, "../assets/images/products/$img_name4");
    }

}


?>


<main class="main-content-wrapper">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <!-- page header -->
                    <div>
                        <h2>Add New Product</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="text-inherit">Products</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- button -->
                    <div>
                        <a href="products.php" class="btn btn-light">Back to Product</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- row -->
        <div class="row">
            <form method="post" enctype="multipart/form-data">
                <div class="col-lg-8 col-12">
                    <!-- card -->
                    <div class="card mb-6 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6 ">
                            <h4 class="mb-4 h5">Product Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Product Name" value='<?php echo $row['title']?>'>
                                </div>
                                <!-- input -->
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Product Category</label>
                                    <select class="form-select" name='category'>
                                        <option selected disabled>Product Category</option>
                                        <?php
                                        $fetchCat = "SELECT * FROM `sub_category`";
                                        $catResult = mysqli_query($conn, $fetchCat);
                                        while ($rowCat = mysqli_fetch_assoc($catResult)) {

                                            if($row['category'] == $rowCat['sc_id'] ){
                                                $select = "selected";
                                            }else{
                                                $select = "";

                                            }
                                            

                                        ?>
                                            <option <?php echo $select?> value="<?php echo $rowCat['sc_id'] ?>"><?php echo $rowCat['sc_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- input -->
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Weight</label>
                                    <input type="text" class="form-control" name="weight" value='<?php echo $row['weight']?>' placeholder="Weight">
                                </div>
                                <!-- input -->
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Units</label>
                                    <input type="text" name="unit" value='<?php echo $row['unit']?>' class="form-control" placeholder="Units">
                                </div>
                                <div>
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <!-- heading -->
                                        <h4 class="mb-3 h5">Product Images</h4>

                                        <!-- input -->

                                        <input type="file" name='img1'>
                                        <input type="file" name='img2'>
                                        <input type="file" name='img3'>
                                        <input type="file" name='img4'>

                                    </div>
                                </div>
                                <!-- input -->
                                <div class="mb-3 col-lg-12 mt-5">
                                    <h4 class="mb-3 h5">Product Descriptions</h4>
                                    <textarea name="description" cols="30" rows="10" value='<?php echo $row['description']?>' class="form-control" placeholder='Write description'></textarea>
                                    <!-- <div class="py-8" id="editor">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-12">
                    <!-- card -->
                    <div class="card mb-6 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <!-- input -->
                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchStock" name="stock">
                                <label class="form-check-label" for="flexSwitchStock">In Stock</label>
                            </div>
                            <!-- input -->
                            <div>
                                <div class="mb-3">
                                    <label class="form-label">Product Code</label>
                                    <input type="text" class="form-control" name="code" value='<?php echo $row['code']?>' placeholder="Enter Product Title">
                                </div>
                                <!-- input -->
                                <div class="mb-3">
                                    <label class="form-label">Product Dimension</label>
                                    <input type="text" class="form-control" name="dimension" value='<?php echo $row['dimension']?>' placeholder="Enter Product Title">
                                </div>
                                <!-- input -->

                                <?php 
                                if($row['status'] == 'Active'){
                                    $checkA = 'checked';
                                }else if($row['status'] == 'Disable'){
                                    $checkD = 'checked';
                                   
                                }
                                ?>
                                <div class="mb-3">

                                    <label class="form-label" id="productSKU">Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" <?php echo @$checkA;?> value='Active'>
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <!-- input -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" <?php echo @$checkD;?> type="radio" name="status" id="inlineRadio2" value="Disable">
                                        <label class="form-check-label" for="inlineRadio2">Disabled</label>
                                    </div>
                                    <!-- input -->

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- card -->
                    <div class="card mb-6 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Product Price</h4>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" value='<?php echo $row['price']?>' placeholder="$0.00">
                            </div>
                            <!-- input -->


                        </div>
                    </div>

                    <!-- button -->
                    <div class="d-grid">
                        <input type="submit" value="Update Product" name="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

</div>


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


<!-- Mirrored from freshcart.codescandy.com/dashboard/add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Mar 2023 10:11:27 GMT -->

</html>
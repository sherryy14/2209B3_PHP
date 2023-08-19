<?php
include 'header.php';


if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}


$per_page = 5;
$start = ($page - 1) * $per_page;


?>

<!-- main -->
<main class="main-content-wrapper">
  <div class="container">
    <div class="row mb-8">
      <div class="col-md-12">
        <!-- page header -->
        <div class="d-md-flex justify-content-between align-items-center">
          <div>
            <h2>Products</h2>
            <!-- breacrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
              </ol>
            </nav>
          </div>
          <!-- button -->
          <div>
            <a href="add-product.php" class="btn btn-primary">Add Product</a>
          </div>
        </div>
      </div>
    </div>
    <!-- row -->
    <div class="row ">
      <div class="col-xl-12 col-12 mb-5">
        <!-- card -->
        <div class="card h-100 card-lg">
          <div class="px-6 py-6 ">
            <div class="row justify-content-between">
              <!-- form -->
              <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                <form class="d-flex" role="search">
                  <input class="form-control" type="search" placeholder="Search Products" aria-label="Search">
                </form>
              </div>
              <!-- select option -->
              <div class="col-lg-2 col-md-4 col-12">
                <select class="form-select">
                  <option selected>Status</option>
                  <option value="1">Active</option>
                  <option value="2">Deactive</option>
                  <option value="3">Draft</option>
                </select>
              </div>
            </div>
          </div>
          <!-- card body -->
          <div class="card-body p-0">
            <!-- table -->
            <div class="table-responsive">
              <table class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                <thead class="bg-light">
                  <tr>
                    <th>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkAll">
                        <label class="form-check-label" for="checkAll">

                        </label>
                      </div>
                    </th>
                    <th>Image</th>
                    <th>Proudct Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Availiblity</th>
                    <th>Price</th>
                    <th>Create at</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $fetch = "SELECT * FROM `products` AS p INNER JOIN `sub_category` AS sc ON p.category = sc.sc_id LIMIT $start, $per_page";
                  $res = mysqli_query($conn, $fetch);
                  while ($row = mysqli_fetch_assoc($res)) {

                    if ($row['availblity'] == "In Stock") {
                      $colorStock = "bg-light-primary text-dark-primary";
                    } else {
                      $colorStock = "bg-light-danger text-dark-danger";
                    }
                    if ($row['status'] == "Active") {
                      $colorStatus = "bg-light-primary text-dark-primary";
                    } else {
                      $colorStatus = "bg-light-danger text-dark-danger";
                    }
                  ?>
                    <tr>

                      <td>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="productOne">
                          <label class="form-check-label" for="productOne">

                          </label>
                        </div>
                      </td>
                      <td>
                        <a href="#!"> <img src="../assets/images/products/<?php echo  $row['img1'] ?>" alt="" class="icon-shape icon-md"></a>
                      </td>
                      <td><a href="#" class="text-reset"><?php echo $row['title'] ?></a></td>
                      <td><?php echo $row['sc_name'] ?></td>


                      <td>
                        <span class="badge <?php echo $colorStatus; ?>"><?php echo $row['status'] ?></span>
                      </td>
                      <td>
                        <span class="badge <?php echo $colorStock; ?>"><?php echo $row['availblity'] ?></span>
                      </td>
                      <td>$<?php echo $row['price'] ?></td>
                      <td><?php echo $row['created_at'] ?></td>
                      <td>
                        <div class="dropdown">
                          <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="feather-icon icon-more-vertical fs-5"></i>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-3"></i>Delete</a></li>
                            <li><a class="dropdown-item" href="update_product.php?id=<?php echo $row['id'] ?>"><i class="bi bi-pencil-square me-3 "></i>Edit</a>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>

            </div>
          </div>
          <div class=" border-top d-md-flex justify-content-between align-items-center px-6 py-6">
            <span>Showing 1 to 8 of 12 entries</span>
            <nav class="mt-2 mt-md-0">
              <ul class="pagination mb-0 ">
                <?php
                // count products 
                $count = "SELECT * FROM `products`";
                $countRes = mysqli_query($conn, $count);
                $total = mysqli_num_rows($countRes);

                $total_pages = ceil($total / $per_page);
                // Condition for Previous 
                if ($page > 1) {
                ?>
                  <li class="page-item"><a class="page-link " href="products.php?page=<?php echo $page - 1 ?>">Previous</a></li>
                  <!-- Pagination number   -->
                <?php
                }
                for ($i = 1; $i <= $total_pages; $i++) {
                ?>
                  <li class="page-item"><a class="page-link" href="products.php?page=<?php echo $i ?>"><?php echo $i; ?></a></li>
                <?php
                }
                // Condition for Nect 
                if ($page < $total_pages) {
                ?>
                  <li class="page-item"><a class="page-link" href="products.php?page=<?php echo $page + 1 ?>">Next</a></li>
                <?php } ?>
              </ul>
            </nav>
          </div>
        </div>

      </div>

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

</body>


<!-- Mirrored from freshcart.codescandy.com/dashboard/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Mar 2023 10:11:08 GMT -->

</html>
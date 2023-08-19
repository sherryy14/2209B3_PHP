<?php
include 'header.php';
$chart = "SELECT sc.sc_name as label, count(sc.sc_id) as y FROM sub_category AS sc INNER JOIN products As p ON sc.sc_id = p.category group by sc.sc_id";
$chartRes = mysqli_query($conn,$chart);

$dataPoints = [];

while($chartRow = mysqli_fetch_assoc($chartRes)){
    array_push($dataPoints,$chartRow);
}

// count products 

$countProduct = "SELECT count(id) AS prodCount FROM `products`";
$countProductRes = mysqli_query($conn,$countProduct);
$countProductRow = mysqli_fetch_assoc($countProductRes);

// count active products 

$countActiveProduct = "SELECT count(id) AS activeCount FROM `products` WHERE status ='Active'";
$countActiveProductRes = mysqli_query($conn,$countActiveProduct);
$countActiveProductRow = mysqli_fetch_assoc($countActiveProductRes);

?>

<!-- main wrapper -->
<main class="main-content-wrapper">
    <section class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <!-- card -->
                <div class="card bg-light border-0 rounded-4" style="background-image: url(../assets/images/slider/slider-image-1.jpg); background-repeat: no-repeat; background-size: cover; background-position: right;">
                    <div class="card-body p-lg-12">
                        <h1>Welcome back! FreshCart
                        </h1>
                        <p>FreshCart is simple & clean design for developer and
                            designer.</p>
                        <a href="add-product.php" class="btn btn-primary">
                            Create Product
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- table -->

        <div class="row">
            <div class="col-lg-4 col-12 mb-6">
                <!-- card -->
                <div class="card h-100 card-lg">
                    <!-- card body -->
                    <div class="card-body p-6">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <div>
                                <h4 class="mb-0 fs-5">Products</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-danger text-dark-danger rounded-circle">
                                <i class="bi bi-currency-dollar fs-5"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1">
                            <h1 class=" mb-2 fw-bold fs-2"><?php echo $countProductRow['prodCount'];?></h1>
                            <span>All Products</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb-6">
                <!-- card -->
                <div class="card h-100 card-lg">
                    <!-- card body -->
                    <div class="card-body p-6">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <div>
                                <h4 class="mb-0 fs-5">No. Of Products</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-warning text-dark-warning rounded-circle">
                                <i class="bi bi-cart fs-5"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1">
                            <h1 class=" mb-2 fw-bold fs-2"><?php echo $countActiveProductRow['activeCount'];?></h1>
                            <span>Active</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb-6">
                <!-- card -->
                <div class="card h-100 card-lg">
                    <!-- card body -->
                    <div class="card-body p-6">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <div>
                                <h4 class="mb-0 fs-5">Customer</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-info text-dark-info rounded-circle">
                                <i class="bi bi-people fs-5"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div class="lh-1">
                            <h1 class=" mb-2 fw-bold fs-2">39,354</h1>
                            <span><span class="text-dark me-1">30+</span>new in 2 days</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row ">
            <div class="col-xl-8 col-lg-6 col-md-12 col-12 mb-6">
                <!-- card -->
                <div class="card h-100 card-lg">
                    <div class="card-body p-6">
                        <!-- heading -->
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="mb-1 fs-5">Revenue </h3>
                                <small>(+63%) than last year)</small>
                            </div>
                            <div>
                                <!-- select option -->
                                <select class="form-select ">
                                    <option selected>2019</option>
                                    <option value="2023">2020</option>
                                    <option value="2024">2021</option>
                                    <option value="2025">2022</option>
                                    <option value="2025">2023</option>
                                </select>
                            </div>

                        </div>
                        <!-- chart -->
                        <div id="revenueChart" class="mt-6"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12 mb-6">
                <!-- card -->
                <div class="card h-100 card-lg">
                    <!-- card body -->
                    <div class="card-body p-6">
                        <!-- heading -->
                        <h3 class="mb-0 fs-5">Total Sales </h3>
                        <!-- <div id="totalSale" class="mt-6 d-flex justify-content-center"></div> -->
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
       
        <!-- row -->
        <div class="row ">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-6">
                <div class="card h-100 card-lg">
                    <!-- heading -->
                    <div class="p-6">
                        <h3 class="mb-0 fs-5">Recent Products</h3>
                    </div>
                    <div class="card-body p-0">
                        <!-- table -->
                        <div class="table-responsive">
                            <table class="table table-centered table-borderless text-nowrap table-hover">
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
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $fetch = "SELECT * FROM `products` AS p INNER JOIN `sub_category` AS sc ON p.category = sc.sc_id ORDER BY p.id DESC LIMIT 5";
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
                  
                    </tr>

                  <?php } ?>
                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
            <a href="products.php" class="btn btn-primary">View All Products</a>
            </div>
        </div>
    </section>
</main>


</div>
</div>

<!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/js/vendors/chart.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<script>
    window.onload = function() {


        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "No. Of Products By Category" 
            },
            subtitles: [{
                text: "July 2023"
            }],
            data: [{
                type: "pie",
                // yValueFormatString: "",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>
</body>


<!-- Mirrored from freshcart.codescandy.com/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Mar 2023 10:10:46 GMT -->

</html>
<?php 
include 'header.php';

?>

    <main class="main-content-wrapper">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row mb-8">
          <div class="col-md-12">
            <div class="d-md-flex justify-content-between align-items-center">
              <div>
                <!-- page header -->
                <h2>Sliders</h2>
                 <!-- breacrumb -->
                 <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sliders</li>
                  </ol>
                </nav>
              </div>
              <!-- button -->
              <div>
                <a href="#" class="btn btn-primary">Back to all orders</a>
              </div>

            </div>
          </div>
        </div>
        <!-- row -->
        <div class="row ">
          <div class="col-xl-12 col-12 mb-5">
            <!-- card -->
            <div class="card h-100 card-lg">
             
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <!-- Table -->
                    <table class="table mb-0 text-nowrap table-centered">
                      <!-- Table Head -->
                      <thead class="bg-light">
                        <tr>
                          <th>Slider</th>
                          <th>Description</th>
                          
                          <th>Action</th>
                        </tr>
                      </thead>
                      <!-- tbody -->
                      <tbody>
                        <?php 
                        $fetch = "SELECT * FROM `slider`";
                        $res = mysqli_query($conn, $fetch);


                        while($row = mysqli_fetch_array($res)){

                        
                        ?>
                        <tr>
                          <td>
                            <a href="#" class="text-inherit">
                              <div class="d-flex align-items-center">
                                <div>
                                  <img src="../assets/images/slider/<?php echo $row['img']?>" alt=""
                                    class="icon-shape icon-lg">
                                </div>
                                <div class="ms-lg-4 mt-2 mt-lg-0">
                                  <h5 class="mb-0 h6">
                                  <?php echo $row['title']?>
                                  </h5>

                                </div>
                              </div>
                            </a>
                          </td>
                          <td><?php echo $row['description']?></td>
                          <td>
                          <div class="dropdown">
                            <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="feather-icon icon-more-vertical fs-5"></i>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-3"></i>Delete</a></li>
                              <li><a class="dropdown-item" href=""><i class="bi bi-pencil-square me-3 "></i>Edit</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                          
                        </tr>
                        <?php }?>
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
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


<!-- Mirrored from freshcart.codescandy.com/dashboard/order-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Mar 2023 10:11:11 GMT -->
</html>
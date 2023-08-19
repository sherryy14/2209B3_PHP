<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Ajax</title>
</head>

<body class='bg-dark text-white'>
    <div class="container-fluid bg-secondary py-4">
        <h1 class="text-center text-white">Students Record</h1>
    </div>

    <div class="container my-5">
        <form class="row g-3" id='myForm'>
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Full name</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Email</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="col-md-4">
                <label for="validationDefault05" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone">
            </div>
            <div class="col-md-4 offset-2">
                <label for="validationDefault03" class="form-label">City</label>
                <input type="text" class="form-control" id="city">
            </div>
            <div class="col-md-4">
                <label for="validationDefault04" class="form-label">Age</label>
                <input type="number" class="form-control" id="age">

            </div>


            <div class="col-12 d-flex justify-content-center">
                <button class="btn btn-secondary" type="submit" id='btn'>Add Record</button>
            </div>
        </form>
    </div>

    <!-- filters  -->

    <div class="container my-3">
        <div class="row">

            <div class="col-md-4">
                <input type="text" class="form-control" id='search' placeholder="Search By Name">
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control" id='searchEmail' placeholder="Search By Email">
            </div>

            <div class="col-md-4">
                <select class="form-control" id="sortAge">
                    <option selected disabled>Sort By Age</option>
                    <option value="ASC">Low To High</option>
                    <option value="DESC">High To Low</option>
                </select>
            </div>

            <div class="col-md-4 offset-4 my-3">
                <select class="form-control" id="filterCity">
                    <option selected disabled>Search By City</option>
                    
                    <?php
                    $connection = mysqli_connect('localhost', 'root', '', '2209b3form');
                    $city = "SELECT DISTINCT(city) FROM `student_record`";
                    $res = mysqli_query($connection, $city);
                    while ($row = mysqli_fetch_assoc($res)) {


                    ?>

                        <option value="<?php echo $row['city'] ?>"><?php echo $row['city'] ?></option>

                    <?php } ?>
                </select>
            </div>
        </div>
    </div>

    <!-- table  -->
    <div class="container mt-5">
        <table class="table table-dark text-center table-hover border">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Phone</th>
                </tr>
            </thead>

            <tbody id="data">

            </tbody>

        </table>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $(document).ready(function() {

            // fetch data 
            function fetch() {
                $.ajax({
                    url: 'fetch.php',
                    type: "POST",
                    // ye function data get krega fetch.php sy 
                    success: function(getData) {
                        $('#data').html(getData)
                    }

                })
            }
            // calling or invoking function 
            fetch();

            // insert data  
            $('#btn').click(function(e) {
                e.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                let phone = $('#phone').val();
                let age = $('#age').val();
                let city = $('#city').val();

                if (name != '' && email != '' && phone != '' && age != '' && city != '') {
                    // ajax 
                    $.ajax({
                        url: 'insert.php',
                        type: 'POST',
                        data: {
                            fullname: name,
                            email: email,
                            phone: phone,
                            age: age,
                            city: city
                        }
                    })
                    // reset form
                    $('#myForm').get(0).reset()
                    fetch();

                } else {
                    alert('Please fill all fields')
                }

                fetch();
            })

            // filter by name search

            $('#search').keyup(function() {
                // let search = $('#search').val()
                let search = $(this).val()

                $.ajax({
                    url: 'search.php',
                    type: 'POST',
                    data: {
                        search: search
                    },
                    success: function(getData) {
                        $('#data').html(getData)
                    }
                })

            })
            // filter by email search

            $('#searchEmail').keyup(function() {
                // let search = $('#search').val()
                let email = $(this).val()

                $.ajax({
                    url: 'searchEmail.php',
                    type: 'POST',
                    data: {
                        email: email
                    },
                    success: function(getData) {
                        $('#data').html(getData)
                    }
                })

            })

            // Sort by age

            $('#sortAge').change(function() {

                let age = $(this).val()


                $.ajax({
                    url: 'sortAge.php',
                    type: 'POST',
                    data: {
                        age: age
                    },
                    success: function(getData) {
                        $('#data').html(getData)
                    }
                })

            })
            // Filter by City

            $('#filterCity').change(function() {

                let city = $(this).val()


                $.ajax({
                    url: 'filterCity.php',
                    type: 'POST',
                    data: {
                        city: city
                    },
                    success: function(getData) {
                        $('#data').html(getData)
                    }
                })

            })
        })
    </script>

</body>

</html>
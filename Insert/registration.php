<?php
$conn = mysqli_connect('localhost', 'root', '', 'fetch') or die("Failed to connect DB");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $cnic = $_POST['cnic'];
    $gender = $_POST['gender'];


    $insert = "INSERT INTO `registration` ( `name`, `age`, `address`, `phone`, `cnic`, `gender`) VALUES ('$name', '$age', '$address', '$phone', '$cnic', '$gender')";

    $result = mysqli_query($conn, $insert);

    if ($result) {
        echo "Data inserted";
    } else {
        echo "Data Failed to insert";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="text-center bg-secondary text-white py-4">Registration</h1>
    <div class="container my-5">
        <form class="row g-3" method="post">
            <div class="col-md-6">
                <label for="validationDefault01" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="validationDefault01" required>
            </div>
            <div class="col-md-6">
                <label for="validationDefault02" class="form-label">Age</label>
                <input type="text" class="form-control" name="age" id="validationDefault02" required>
            </div>

            <div class="col-md-12">
                <label for="validationDefault03" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="validationDefault03" required>
            </div>
            <div class="col-md-6">
                <label for="validationDefault03" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" id="validationDefault03" required>
            </div>
            <div class="col-md-6">
                <label for="validationDefault03" class="form-label">CNIC</label>
                <input type="text" class="form-control" name="cnic" id="validationDefault03" required>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    Gender
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="M" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="F" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Female
                </label>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" name="submit" type="submit">Register</button>
            </div>
        </form>
    </div>

    <h1 class="text-center">Users</h1>
    <div class="container">
        <table class="table table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Phone</th>
                <th>CNIC</th>
                <th>Gender</th>
            </tr>

            <?php

            $fetch = "SELECT * FROM `registration`";
            $fetchResult = mysqli_query($conn, $fetch);
            while ($row = mysqli_fetch_assoc($fetchResult)) {


            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['age'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['cnic'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                </tr>

            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>
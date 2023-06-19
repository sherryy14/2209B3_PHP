<?php 

                // ServerName , Username, Password, DatabaseName 
$conn = mysqli_connect('localhost','root','','fetch');

if($conn){
    echo "Connected";
}else{
    echo "Connection Failed";
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $edu = $_POST['education'];

    $query = "INSERT INTO `users` (`name`, `age`, `education` ) VALUES ('$name', '$age', '$edu')";
                        // database Conneciton , MySql query
    $result = mysqli_query($conn, $query);

    if($result){
        echo "Data Inserted";
    }else{
        echo "Data Not Insert";
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
    <div class="container">
        <form class="row g-3" method="post">
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="validationDefault01" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Age</label>
                <input type="text" class="form-control" name="age" id="validationDefault02" required>
            </div>

            <div class="col-md-6">
                <label for="validationDefault03" class="form-label">Education</label>
                <input type="text" class="form-control" name="education" id="validationDefault03" required>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
            </div>
        </form>
    </div>
</body>

</html>
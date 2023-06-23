<?php 

include 'header.php';


?>

        <table class="table text-center table-stripted">
            <thead class="bg-dark text-white table-active">
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Address</td>
                    <td>Course</td>
                    <td>Phone</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                $fetch = "SELECT * FROM `studentrecord` AS std INNER JOIN `courses` AS c ON std.course = c.cid";
                $result = mysqli_query($conn,$fetch);

                while($row = mysqli_fetch_array($result)){

                
                ?>
                <tr>
                    <td> <?php echo $row['id']?> </td>
                    <td> <?php echo $row['name']?> </td>
                    <td> <?php echo $row['address']?> </td>
                    <td> <?php echo $row['cname']?> </td>
                    <td> <?php echo $row['phone']?> </td>
                
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-warning text-white">Edit</a>
                        <a href="inlinedelete.php?id=<?php echo $row['id']?>" class="btn btn-danger text-white">Delete</a>
                    </td>
                </tr>

                <?php 
                }
                ?>

             
            </tbody>
        </table>

        
    </div>
</body>
</html>
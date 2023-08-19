<?php
require_once 'header.php';
?>

<div class="container my-3">
    <div class="row">
        <div class="col-md-6 offset-3 border rounded bg-dark p-3">
            <input type="text" class='form-control' placeholder="Search" id="search">
        </div>
    </div>
</div>




<table class="table text-center table-stripted">
    <thead class="bg-dark text-white table-active">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Address</td>
            <td>Course</td>
            <td>Class</td>
            <td>Phone</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody id="data">
        <?php
        $fetch = "SELECT * FROM `student` AS s JOIN `course` AS cr ON cr.cr_id = s.course JOIN `city` AS ct ON ct.ct_id = s.city";
        $res = mysqli_query($conn, $fetch);

        while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['cr_name'] ?></td>
                <td><?php echo $row['ct_name'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>" class='btn btn-warning text-white'>Update</a>
                    <a href="inlinedelete.php?id=<?php echo $row['id'] ?>" class='btn btn-danger text-white>'>Delete</a>
                </td>
            </tr>

        <?php } ?>


    </tbody>
</table>


</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- ajax fetch  -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#search').on('keyup', function() {
            let search = $(this).val();
            console.log(search);
            if (search != '') {
                $.ajax({
                    url: 'search.php',
                    type: "POST",
                    data: {
                        search: search
                    },
                    success: function(a) {
                        $('#data').html(a)
                    }
                })

            } else {

                $.ajax({
                    url: 'fetch.php',
                    type: "POST",
                    data: {
                        search: search
                    },
                    success: function(a) {
                        $('#data').html(a)
                    }
                })
            }
        })
    })
</script>

</body>

</html>
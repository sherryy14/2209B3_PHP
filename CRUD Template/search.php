<?php
include 'config.php';

$search = $_POST['search'];

if (!empty($search)) {
    $fetch = "SELECT * FROM `student` AS s JOIN `course` AS cr ON cr.cr_id = s.course JOIN `city` AS ct ON ct.ct_id = s.city WHERE `name` LIKE '$search%'";
}

$res = mysqli_query($conn, $fetch);
$output = '';
while ($row = mysqli_fetch_assoc($res)) {
    $output .= "
    <tr>
    <td>" . $row['id'] . "</td>
    <td>" . $row['name'] . "</td>
    <td>" . $row['address'] . "</td>
    <td>" . $row['cr_name'] . "</td>
    <td>" . $row['ct_name'] . "</td>
    <td>" . $row['phone'] . "</td>
    <td>
        <a href=edit.php?id=" . $row['id'] . " class='btn btn-warning text-white'>Update</a>
        <a href=inlinedelete.php?id=" . $row['id'] . " class='btn btn-danger text-white>'</a>Delete</a>
    </td>
    </tr>
    ";

}

echo $output;

?>
<?php
//include constants.php
include('../config/constants.php');


//1. get the id of admin to delete
echo $id = $_GET['id'];
//2. create a sql query
$sql = "DELETE FROM t_admin WHERE id=$id";
//execute the query
$res = mysqli_query($conn, $sql);
//check whether query executed successfully
if ($res == true) {
    //successfully executed and admin deleted
    // echo "Admin deleted";
    $_SESSION['delete'] = "Admin deleted successfully";
    header('location:' . URL . './admin/manage-admin.php');
} else {
    //failed to deleete admin
    // echo "Failed to delete";
    $_SESSION['delete'] = "Admin deletion failed. Try again...";
    header('location:' . URL . './admin/manage-admin.php');
}
//3. rederict to manage admin page with message

?>
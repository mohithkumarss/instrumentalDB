<?php include('./partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <?php
        //1.get the id of selected admin
        $id = $_GET['id'];
        //2.create sql query to get the details
        $sql = "SELECT * FROM t_admin WHERE id=$id";
        //execution
        $res = mysqli_query($conn, $sql);
        //check whether query is exe or not
        if ($res == true) {
            $count = mysqli_num_rows($res);
            //check whether we have admin data or not
            if ($count == 1) {
                //get the details
                //echo "admin available";
                $row = mysqli_fetch_assoc($res);
                $f_name = $row['f_name'];
                $username = $row['username'];
            } else {
                //rederict to manage admin page
                header('location:' . URL . 'admin/manage-admin.php');
            }
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name :</td>
                    <td><input type="text" name="f_name" value="<?php echo $f_name; ?>"></td>
                </tr>
                <tr>
                    <td>
                        Username :
                    </td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary text-center"
                            style="border: none;">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>


<?php
//check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    // echo "Button Clicked";
    //get all the values from Form to update
    $id = $_POST['id'];
    $f_name = $_POST['f_name'];
    $username = $_POST['username'];

    //create query to update admin
    $sql = "UPDATE t_admin SET
    f_name='$f_name',
    username='$username'
    WHERE id='$id'
    ";

    //exe query
    $res = mysqli_query($conn, $sql);
    //check whether query exe successfully or not
    if ($res == true) {
        //exe succes and updated admin
        $_SESSION['update'] = "Admin Updated Successfully";
        header('location:' . URL . 'admin/manage-admin.php');
    } else {
        //failed
        $_SESSION['update'] = "Admin Updated failed";
        header('location:' . URL . 'admin/manage-admin.php');
    }
}
?>
<?php include('./partials/footer.php') ?>
<?php include('./partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <div class="main-content">
            <h1>Add Admin</h1>
        </div>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>FullName</td>
                    <td><input type="text" name="f_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>UserName</td>
                    <td><input type="text" name="username" placeholder="Enter Your Username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Add Admin"
                            class="btn-secondary text-center" style="border: none;"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<h4 style="  margin: 3rem 0 2rem 4rem;
  color: teal; font-weight: 500;">
    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    ?>
</h4>

<?php include('./partials/footer.php') ?>
<?php
// Process the value from Form and Save it in DB
// Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    // Button clicked
    $f_name = $_POST['f_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password encryption with md5

    // query to save data into base
    $sql = "INSERT INTO t_admin SET
    f_name='$f_name',
    username='$username',
    password='$password'
    ";


    //execute query and save data in DB
    $res = mysqli_query($conn, $sql);

    //check whether the data is inserted or not and display message
    if ($res == TRUE) {
        //data inserted
        // echo "data inserted";
        $_SESSION['add'] = "Admin added successfully";
        header("location:" . URL . './admin/manage-admin.php'); //redirect back to manageadmin page
    } else {
        //failed to insert
        // echo "failed ot insert data";
        $_SESSION['add'] = "failed to add admin";
        header("location:" . URL . './admin/add-admin.php');
    }
}
?>
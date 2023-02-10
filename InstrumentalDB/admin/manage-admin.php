<?php include('./partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
        <div class="main-content">
            <h1>Manage Admin</h1>

            <!-- Button to add Admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br /><br />
            <table class="tbl-full">
                <tr>
                    <th>Sl. no</th>
                    <th>FullName</th>
                    <th>UserName</th>
                    <th>Actions</th>
                </tr>
                <?php
                $sql = "SELECT * FROM t_admin";
                $res = mysqli_query($conn, $sql); //execution
                
                //check whether the query is executed or not
                if ($res == TRUE) {
                    //count rows to check whether we have data in DB
                    $count = mysqli_num_rows($res);
                    $sn = 1; //create a variable and assign a value
                    if ($count > 0) {
                        //we have data in db
                        while ($rows = mysqli_fetch_assoc($res)) {
                            //using while loop to get all data in db
                            $id = $rows['id'];
                            $f_name = $rows['f_name'];
                            $username = $rows['username'];

                            //display the values in our tables
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td>
                                    <?php echo $f_name; ?>
                                </td>
                                <td><?php echo $username; ?></td>
                                <td><a href="<?php echo URL; ?>admin/update-admin.php?id=<?php echo $id; ?>"
                                        class="btn-secondary">Update Admin</a><a
                                        href="<?php echo URL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"
                                        class="btn-danger">Delete Admin</a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        //empty data
                        echo "<div style='color: red;
                        margin: 2rem 0 1rem 4rem;'>No data found</div>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
<h4 style="  margin: 3rem 0 2rem 4rem;
  color: teal; font-weight: 500;">
    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if (isset($_SESSION['delete'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
    if (isset($_SESSION['update'])) {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

    ?>

    <?php include('./partials/footer.php') ?>
</h4>
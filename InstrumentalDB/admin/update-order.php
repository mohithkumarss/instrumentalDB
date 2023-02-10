<?php include('./partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <?php

        //CHeck whether id is set or not
        if (isset($_GET['id'])) {
            //GEt the Order Details
            $id = $_GET['id'];

            //Get all other details based on this id
            //SQL Query to get the order details
            $sql = "SELECT * FROM t_order WHERE id=$id";
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count Rows
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                //Detail Availble
                $row = mysqli_fetch_assoc($res);

                $product = $row['product'];
                $price = $row['price'];
                $qty = $row['qty'];
                $status = $row['status'];
                $c_name = $row['c_name'];
                $c_contact = $row['c_contact'];
                $c_mail = $row['c_mail'];
                $c_address = $row['c_address'];
            } else {
                //DEtail not Available/
                //Redirect to Manage Order
                header('location:' . URL . 'admin/manage-order.php');
            }
        } else {
            //REdirect to Manage ORder PAge
            header('location:' . URL . 'admin/manage-order.php');
        }

        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Product Name</td>
                    <td><b>
                            <?php echo $product; ?>
                        </b></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <b> $ <?php echo $price; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if ($status == "Ordered") {
                                echo "selected";
                            } ?> value="Ordered">Ordered</option>
                            <option <?php if ($status == "On Delivery") {
                                echo "selected";
                            } ?> value="On Delivery">On
                                Delivery</option>
                            <option <?php if ($status == "Delivered") {
                                echo "selected";
                            } ?> value="Delivered">Delivered
                            </option>
                            <option <?php if ($status == "Cancelled") {
                                echo "selected";
                            } ?> value="Cancelled">Cancelled
                            </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td>
                        <input type="text" name="c_name" value="<?php echo $c_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact: </td>
                    <td>
                        <input type="text" name="c_contact" value="<?php echo $c_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email: </td>
                    <td>
                        <input type="text" name="c_mail" value="<?php echo $c_mail; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Address: </td>
                    <td>
                        <textarea name="c_address" cols="30" rows="5"><?php echo $c_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>


        <?php
        //CHeck whether Update Button is Clicked or Not
        if (isset($_POST['submit'])) {
            //echo "Clicked";
            //Get All the Values from Form
            $id = $_POST['id'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $price * $qty;
            $status = $_POST['status'];
            $c_name = $_POST['c_name'];
            $c_contact = $_POST['c_contact'];
            $c_mail = $_POST['c_mail'];
            $c_address = $_POST['c_address'];

            //Update the Values
            $sql2 = "UPDATE t_order SET 
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    c_name = '$c_name',
                    c_contact = '$c_contact',
                    c_mail = '$c_mail',
                    c_address = '$c_address'
                    WHERE id=$id
                ";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //CHeck whether update or not
            //And REdirect to Manage Order with Message
            if ($res2 == true) {
                //Updated
                $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                header('location:' . URL . 'admin/manage-order.php');
            } else {
                //Failed to Update
                $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                header('location:' . URL . 'admin/manage-order.php');
            }
        }
        ?>


    </div>
</div>

<?php include('./partials/footer.php') ?>
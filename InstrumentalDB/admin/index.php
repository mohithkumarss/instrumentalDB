<?php include('./partials/menu.php') ?>

<!-- Main content start -->
<div class="main-content">
    <div class="wrapper">
        <div class="main-content">
            <h1>DashBoard</h1>
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <div class="c text-center">

                <?php
                //Sql Query 
                $sql = "SELECT * FROM t_category";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);
                ?>

                <h1>
                    <?php echo $count; ?>
                </h1>

                Categories
            </div>

            <div class="c text-center">

                <?php
                //Sql Query 
                $sql2 = "SELECT * FROM t_product";
                //Execute Query
                $res2 = mysqli_query($conn, $sql2);
                //Count Rows
                $count2 = mysqli_num_rows($res2);
                ?>

                <h1><?php echo $count2; ?></h1>
                Products

            </div>

            <div class="c text-center">

                <?php
                //Sql Query 
                $sql3 = "SELECT * FROM t_order";
                //Execute Query
                $res3 = mysqli_query($conn, $sql3);
                //Count Rows
                $count3 = mysqli_num_rows($res3);
                ?>

                <h1><?php echo $count3; ?></h1>

                Total Orders
            </div>

            <div class="c text-center">

                <?php
                //Creat SQL Query to Get Total Revenue Generated
                //Aggregate Function in SQL
                $sql4 = "SELECT SUM(total) AS Total FROM t_order WHERE status='delivered'";

                //Execute the Query
                $res4 = mysqli_query($conn, $sql4);

                //Get the VAlue
                $row4 = mysqli_fetch_assoc($res4);

                //GEt the Total REvenue
                $total_revenue = $row4['Total'];

                ?>

                <h1>$<?php echo $total_revenue; ?></h1>
                Revenue Generated
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- Main content end -->

<a href="../index.php">
    <p class="text-center" style="padding: 4%; background-color: rgb(237, 237, 237); border-radius: 30px; ">Enter Into
        the Website</p>
</a>

<?php include('./partials/footer.php') ?>
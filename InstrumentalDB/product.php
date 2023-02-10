<?php include('./partials-m/menu.php'); ?>

<!-- product sEARCH Section Starts Here -->
<section class="product-search text-center">
    <div class="container">
        
        <form action="<?php echo URL; ?>product-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Product..." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- product sEARCH Section Ends Here -->



<!-- product MEnu Section Starts Here -->
<section class="product-menu">
    <div class="container">
        <h2 class="text-center">Product Menu</h2>

        <?php 
            //Display Products that are Active
            $sql = "SELECT * FROM t_product WHERE active='Yes'";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //CHeck whether the products are availalable or not
            if($count>0)
            {
                //Products Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <div class="product-menu-box">
                        <div class="product-menu-img">
                            <?php 
                                //CHeck whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo URL; ?>images/product/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="product-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="product-price">$<?php echo $price; ?></p>
                            <p class="product-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo URL; ?>order.php?product_id=<?php echo $id; ?>" class="">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //Product not Available
                echo "<div class='error'>Product not found.</div>";
            }
        ?>

        

        

        <div class="clearfix"></div>

        

    </div>

</section>
<!-- product Menu Section Ends Here -->

<?php include('./partials-m/footer.php'); ?>
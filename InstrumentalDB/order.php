<?php include('./partials-m/menu.php'); ?>

    <?php 
        //CHeck whether food id is set or not
        if(isset($_GET['product_id']))
        {
            //Get the Food id and details of the selected food
            $product_id = $_GET['product_id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM t_product WHERE id=$product_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //Food not Availabe
                //REdirect to Home Page
                header('location:'.URL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.URL);
        }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="product-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Product</legend>

                    <div class="product-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo URL; ?>images/product/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="product-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="product" value="<?php echo $title; ?>">

                        <p class="product-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend style="color: teal; margin-bottom: 1rem; font-size: 18px;">Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Leokonda" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="c_contact" placeholder="E.g. 7349xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="mail" name="c_mail" placeholder="E.g. ssmohithkumar@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="c_address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary" style="padding: 3.5%; width: 70%;">
                </fieldset>

            </form>

            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $product = $_POST['product'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty; // total = price x qty 
                    $order_date = date("Y-m-d H:i:s"); //Order DAte
                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled
                    $c_name = $_POST['full-name'];
                    $c_contact = $_POST['c_contact'];
                    $c_mail = $_POST['c_mail'];
                    $c_address = $_POST['c_address'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO t_order SET 
                        product = '$product',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        c_name = '$c_name',
                        c_contact = '$c_contact',
                        c_mail = '$c_mail',
                        c_address = '$c_address'
                    ";

                    // echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Product Ordered Successfully.</div>";
                        header('location:'.URL);
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Product.</div>";
                        header('location:'.URL);
                    }

                }
            
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('./partials-m/footer.php'); ?>
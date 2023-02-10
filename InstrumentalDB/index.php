<?php include('./partials-m/menu.php'); ?>

<!-- product sEARCH Section Starts Here -->
<section class="product-search text-center">
    <div class="container">
        
        <form action="<?php echo URL; ?>product-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for product.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- product sEARCH Section Ends Here -->

<?php 
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>

<!-- <button onclick="rerun();">Again!</button> -->
<div id="myobj" width="100%" height="100%" class="welcomemsg">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="470.321px" height="203.871px" viewBox="0 0 470.321 203.871" enable-background="new 0 0 470.321 203.871"
	 xml:space="preserve">
<g>
	<path id="i0" fill="none" stroke="#000000" d="M79.839,119.27H69.194l-8.07-33.188H60.78l-8.07,33.188H42.065L21.289,34.731h8.929
		l16.998,69.886h0.343l8.929-36.821l-8.07-33.064h8.928l16.999,69.886h0.344l16.998-69.886h8.929L79.839,119.27z"/>
	<path id="i1"fill="none" stroke="#000000" d="M119.845,41.244v32.438h20.776v6.639h-20.776v32.438h29.533v6.512h-38.461V34.731h37.088
		v6.513H119.845z"/>
	<path id="i2"fill="none" stroke="#000000" d="M198.484,112.758v6.512h-36.916V34.731h8.928v78.026H198.484z"/>
	<path id="i3"fill="none" stroke="#000000" d="M245.013,63.036V49.76c0-5.385-6.011-9.769-13.393-9.769c-7.384,0-13.394,4.383-13.394,9.769
		v54.481c0,5.385,6.01,9.77,13.394,9.77c7.382,0,13.393-4.385,13.393-9.77V92.719h8.928v11.522c0,9.018-9.958,16.281-22.32,16.281
		c-12.363,0-22.322-7.264-22.322-16.281V49.76c0-9.017,9.959-16.281,22.322-16.281c12.362,0,22.32,7.264,22.32,16.281v12.524
		L245.013,63.036z"/>
	<path id="i4"fill="none" stroke="#000000" d="M267.504,49.76c0-9.017,9.959-16.281,22.321-16.281s22.32,7.264,22.32,16.281v54.481
		c0,9.018-9.958,16.281-22.32,16.281s-22.321-7.264-22.321-16.281V49.76z M276.432,104.241c0,5.385,6.01,9.77,13.394,9.77
		c7.382,0,13.393-4.385,13.393-9.77V49.76c0-5.385-6.011-9.769-13.393-9.769c-7.384,0-13.394,4.383-13.394,9.769V104.241z"/>
	<path id="i5"fill="none" stroke="#000000" d="M366.229,119.27h-10.129l-18.373-70.887h-0.344v70.887h-8.928V34.731h13.393l19.059,74.519
		h0.344l19.23-74.519h13.564v84.538h-8.93V47.757h-0.342L366.229,119.27z"/>
	<path id="i6"fill="none" stroke="#000000" d="M420.145,41.244v32.438h20.775v6.639h-20.775v32.438h29.532v6.512h-38.461V34.731h37.087
		v6.513H420.145z"/>
</g>
</svg>
</div>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Product</h2>

        <?php 
            //Create SQL Query to Display CAtegories from Database
            $sql = "SELECT * FROM t_category WHERE active='Yes' AND featured='Yes' LIMIT 4";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count rows to check whether the category is available or not
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //CAtegories Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the Values like id, title, image_name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <a href="<?php echo URL; ?>category-product.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php 
                                //Check whether Image is available or not
                                if($image_name=="")
                                {
                                    //Display MEssage
                                    echo "<div class='error'>Image not Available</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo URL; ?>images/category/<?php echo $image_name; ?>" alt="" class="img-responsive1 img-curve">
                                    <?php
                                }
                            ?>
                            

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                //Categories not Available
                echo "<div class='error'>Category not Added.</div>";
            }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->



<!-- product MEnu Section Starts Here -->
<section class="product-menu">
    <div class="container">
        <h2 class="text-center">Product Menu</h2>

        <?php 
        
        //Getting Product from Database that are active and featured
        //SQL Query
        $sql2 = "SELECT * FROM t_product WHERE active='Yes' AND featured='Yes' LIMIT 7";

        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Count Rows
        $count2 = mysqli_num_rows($res2);

        //CHeck whether product available or not
        if($count2>0)
        {
            //product Available
            while($row=mysqli_fetch_assoc($res2))
            {
                //Get all the values
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>

                <div class="product-menu-box">
                    <div class="product-menu-img">
                        <?php 
                            //Check whether image available or not
                            if($image_name=="")
                            {
                                //Image not Available
                                echo "<div class='error'>Image not available.</div>";
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

                        <a href="<?php echo URL; ?>order.php?product_id=<?php echo $id; ?>" class="button" style="background-color: #ececec; padding: 8%; border-radius: 6px; font-size: 14px;">Order Now</a>
                    </div>
                </div>

                <?php
            }
        }
        else
        {
            //product Not Available 
            echo "<div class='error'>product not available.</div>";
        }
        
        ?>
        <p class="product-menu-box text-center">
        <a href="product.php"><i class="fa-solid fa-plus" style="margin-top: 12rem; margin-bottom: 1rem; font-size: 40px;"></i><br>See All Product</a>
    </p>
        <div class="clearfix"></div>
    </div>
</section>
<!-- product Menu Section Ends Here -->


<?php include('./partials-m/footer.php'); ?>


<script>

var current_frame, total_frames, path, length, handle, myobj;

myobj = document.getElementById('myobj').cloneNode(true);

var init = function() {
  current_frame = 0;
  total_frames = 60;
  path = new Array();
  length = new Array();
  for(var i=0; i<7;i++){
    path[i] = document.getElementById('i'+i);
    l = path[i].getTotalLength();
    length[i] = l;
    path[i].style.strokeDasharray = l + ' ' + l; 
    path[i].style.strokeDashoffset = l;
  }
  handle = 0;
}
 
 
var draw = function() {
   var progress = current_frame/total_frames;
   if (progress > 1) {
     window.cancelAnimationFrame(handle);
   } else {
     current_frame++;
     for(var j=0; j<path.length;j++){
	     path[j].style.strokeDashoffset = Math.floor(length[j] * (1 - progress));
     }
     handle = window.requestAnimationFrame(draw);
   }
};

init();
draw();

var rerun = function() {
  var old = document.getElementsByTagName('div')[0];
  old.parentNode.removeChild(old);
  document.getElementsByTagName('body')[0].appendChild(myobj);
  init();
  draw();
};
</script>
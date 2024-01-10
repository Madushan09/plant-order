<?php include('partials-front/menu.php'); ?>

    <!-- Plant sEARCH Section Starts Here -->
    <section class="Plant-search text-center">
	
	 <h1>Fresh Plants at <br>Your Doorstep</h1> 
       <h2>For a longer Life </h2>

       <div class="change-text">
            <h3 style="color:#fff;">We've</h3>
            <h3>
               <span class="word">Fruit&nbsp;Plants</span>
               <span class="word">Vegetable&nbsp;Plants</span>
               <span class="word">Flower&nbsp;Plants</span>
               <span class="word">Medicinal&nbsp;Plants</span>
               <span class="word">Fancy&nbsp;Plants</span>
            </h3>
         </div>
  
         
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>plant-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Plants.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
		 <p>
            "Nature's Bounty at Your Fingertips: Nourishing Plants <br> Delivered to Your Home"
        </p>
        <a href="plants.php" class="hero-btn">Pick your Plants</a>

    </section>
    <!-- Plant sEARCH Section Ends Here -->


    <?php
       if(isset($_SESSION['order']))
       {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
       }

    ?>




<!-- How it's Works -->

<section class="Plant">
<h1>How it works</h1>

<div class="row">
    <div class="Plant-col">
        <h3>Pick a Plant</h3>
        		
				
		<div class="Plant_img-col">
        <img src="images/Plant2.jpeg">
		</div>
	
        <p>Discover ultimate plant ordering convenience from home! Browse and select fresh, vibrant plants effortlessly.</p>
        
    </div>
    <div class="Plant-col">
	
	
        <h3>Customize it</h3>
		
		<div class="Plant_img-col">
        <img src="images/Plant1.jpeg">
		</div>
        <p>Experience ease in ordering plants from home. Explore a diverse selection of fresh, vibrant plants. Green up your living space effortlessly!</p>
        
    </div>
    <div class="Plant-col">
        <h3>Prepare it up</h3>
		
		<div class="Plant_img-col">
        <img src="images/Plant4.jpeg">
		</div>
		
        <p>Our platform ensures you receive only the highest quality, carefully packed plant selections, directly delivered to your doorstep.</p>
        
    </div>
</div>

</section>


<!-- How it's Works end -->





<!------Welcome------->
<section class="about-us">
    <div class="row">
       <div class="about-col">
        <img src="images/Welcome.jpeg">
        </div>
		
        <div class="about-col">
            <h1>Welcome</h1>
            <p>Welcome to Nature Hub, your go-to destination for all things green and thriving! At Nature Hub, we believe in the power of plants to elevate your living space and enrich your life. Whether you're an avid gardener, a plant enthusiast, or just looking to add some greenery to your home, we've got you covered.<br><br>

Our wide range of plant options caters to every taste and preference, allowing you to create your own green sanctuary. From lush indoor plants that purify the air to delightful outdoor blooms that brighten up your garden, we offer a diverse selection to suit any space.</p>
            <a href="#" class="hero-btn red-btn">EXPLORE NOW</a>
        </div>
      
</div>

</section>






<!-----testimonials------>
<section class="testimonials">
<h1>What Our Customers Says </h1>
<p>Customers' perceptions on our service Response</p>
<div class="row">
    <div class="testimonial-col">
        <img src="images/user.jpg">
        <div>
            <p>i recommend this.<br> why <br>
                they have nice service.</p>
            <h3> Dasun Madushan</h3>
            <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-o"></i>
      </div>
   </div>
   <div class="testimonial-col">
    <img src="images/user2.jpg">
    <div>
        <p>Nature Hub has beautiful Plants.<br>.I saw new beautiful plants. with Nature Hub. </p>
        <h3>Dulmi Bogawaththa</h3>
		  <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-o"></i>
      
        </div>
    </div>
</div>
</section>







    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Plants</h2>

            <?php
              //Create SQL Query to Display categories from Database
              $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3" ;
              //Execute the Query
              $res = mysqli_query($conn, $sql);
              //Count rows to check whether the category is available or not

              $count = mysqli_num_rows($res);

              if($count>0)
              {
                  // Categories Available
                  while($row=mysqli_fetch_assoc($res))
                  {
                      //Get the values like title, image_name
                      $id = $row['id'];
                      $title = $row['title'];
                      $image_name = $row['image_name'];
                      ?>

                        <a href="<?php echo SITEURL; ?>category-plants.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php
                                   // Check whether image is Available or not
                                   if($image_name=="")
                                   {
                                       // Display Message
                                       echo "<div class='error'>Image not Available.</div>";
                                   }
                                   else
                                   {
                                       //Image Available
                                       ?>
                                       <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Fruit" class="img-responsive img-curve">
                                       <?php
                                   }

                                ?>
                                

                                 <h3 class="float-text1 text-white layer"><?php echo $title; ?></h3>
                            </div>
                        </a>

                      
                      <?php
                  }
              }
              else
              {
                  // Categories not Available
                  echo "<div class='error'>Category not Added.</div>";
              }


            ?>

            
           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Plant MEnu Section Starts Here -->
    <section class="plant-menu">
        <div class="container">
            <h2 class="text-center">Plants Menu</h2>

            <?php
               //Getting plants from Database that are active and featured
               //SQL Query
               $sql2 = "SELECT * FROM tbl_plant WHERE active='Yes' AND featured='Yes' LIMIT 6";

               //Execute the Query
               $res2 = mysqli_query($conn, $sql2);

               //Count Rows
               $count2 = mysqli_num_rows($res2);

               //Check whether plant Available or not
               if($count2>0)
               {
                  // Plant Available
                  while($row=mysqli_fetch_assoc($res2))
                  {
                     $id = $row['id'];
                     $title = $row['title'];
                     $price = $row['price'];
                     $description = $row['description'];
                     $image_name = $row['image_name'];

                     ?>
                     <div class="plant-menu-box">
                            <div class="plant-menu-img">
                                <?php
                                   //Check whether image Available or not
                                   if($image_name=="")
                                   {
                                      //Image not Available
                                      echo "<div class='error'>Image not Available.</div>";
                                   }
                                   else
                                   {
                                      //Image Available
                                      ?>
                                         <img src="<?php echo SITEURL; ?>images/plant/<?php echo $image_name; ?>" alt="Pineapple" class="img-responsive img-curve">

                                      <?php
                                   }

                                ?>
                            
                     </div>

                        <div class="plant-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="plant-price">Rs.<?php echo $price; ?></p>
                            <p class="plant-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?plant_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>


                     <?php


                  }
               }
               else
               {
                   // Plant not Available
                   echo "<div class='error'>Plant not Available.</div>";
               }

            ?>
           
            
            <div class="clearfix"></div> 

        </div>
        <p class="text-center">
            <a href="<?php echo SITEURL; ?>plants.php">See All Plants</a>
        </p>

    </section>
    <!-- plant Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
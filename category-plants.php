<?php include('partials-front/menu.php'); ?>

<?php
   //Check whether id is passed or not
   if(isset($_GET['category_id']))
   {
        //Category id is set and get the id
        $category_id = $_GET['category_id'];

        //Get the category title based on category ID
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Get the value from Database
        $row = mysqli_fetch_assoc($res);

        //Get the title
        $category_title = $row['title'];
   }
   else
   {
      //Category not passed
      //Redirect to Home page
      header('location:'.SITEURL);
   }

?>


    <!-- Plant MEnu Section Starts Here -->
	
	    <section class="Plants-search text-center">
        <div class="container">
            
            <h2>Plants on <a href="#" class="text-white">"<?php echo $category_title; ?> "</a></h2>

        </div>
    </section>
	  <!-- Plant sEARCH Section Ends Here -->

    <section class="plant-menu">
        <div class="container">
            <h2 class="text-center">Plants Menu</h2>

            <?php 

               //Create SQL Query to Get plants based on search Category
               $sql2= "SELECT * FROM tbl_plant WHERE category_id=$category_id";

               //Execute the Query
               $res2 = mysqli_query($conn, $sql2);

               //count the rpows
               $count2 = mysqli_num_rows($res2);

               //check whether plant is available or not 
               if($count2>0)
               {
                  // plant is available
                  while($row2=mysqli_fetch_assoc($res2))
                  {
                    $id = $row2['id'];
                     $title = $row2['title'];
                     $price = $row2['price'];
                     $description = $row2['description'];
                     $image_name = $row2['image_name'];

                     ?>
                    <div class="plant-menu-box">
                        <div class="plant-menu-img">

                        <?php 
                           if($image_name=="")
                           {
                              // Image not Available
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
                            <p class="plant-price">Rs. <?php echo $price; ?></p>
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
                   //plant not available
                   echo "<div class='error'>Plant not Available.</div>";
               }


            ?>

            


            <div class="clearfix"></div>

            

        </div>

    </section>

   <?php include('partials-front/footer.php'); ?>

<?php include('partials-front/menu.php'); ?>


    <!-- Plant sEARCH Section Starts Here -->
    <section class="Plants-search text-center">
        <div class="container">

            <?php

                //get the search keyword
               //$search = $_POST['search'];
               $search = mysqli_real_escape_string($conn, $_POST['search']);

            ?>

            
            <h2>Plants on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- plant sEARCH Section Ends Here -->



   <!-- Plant MEnu Section Starts Here -->
    <section class="plant-menu">
        <div class="container">
            <h2 class="text-center">Plants Menu</h2>

            <?php
               
               //SQL Query to Get foods based on search keyword
               //$search = flower'; Drop database name;
               //"SELECT * FROM tbl_plant WHERE title LIKE '%flower'%' OR description LIKE '%flower%'";
               $sql = "SELECT * FROM tbl_plant WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

               //Execute the Query
               $res = mysqli_query($conn, $sql);

               //count rows
               $count = mysqli_num_rows($res);

               //Check whether plant available or not
               if($count>0)
               {
                  //Plant Available
                  while($row=mysqli_fetch_assoc($res))
                  {
                     //Get the details
                     $id = $row['id'];
                     $title = $row['title'];
                     $price = $row['price'];
                     $description = $row['description'];
                     $image_name = $row['image_name'];

                    ?>

                    <div class="plant-menu-box">
                        <div class="plant-menu-img">

                        <?php
                          //Check whether image name is available or not
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

                            <a href="order.html" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                  }
               }
               else
               {
                  // Plant not available
                  echo "<div class='error'>Plant not found.</div>";

               }

            ?>


                    
                </div>
            </div>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- plant Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>

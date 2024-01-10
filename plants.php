<?php include('partials-front/menu.php'); ?>


    <!-- plant sEARCH Section Starts Here -->
    <section class="Plants-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>plant-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Plants.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Plant sEARCH Section Ends Here -->



    <!-- Plant MEnu Section Starts Here -->
    <section class="plant-menu">
        <div class="container">
            <h2 class="text-center">Plants Menu</h2>

            <?php
                // Display Plants that are active
                $sql = "SELECT *FROM tbl_plant WHERE active='Yes'";

                //Execute thre Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether the plants are available or not

                if($count>0)
                {
                    //plants Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];

                        ?>
                        <div class="plant-menu-box">
                            <div class="plant-menu-img">
                                <?php

                                  //Check whether image available or not
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
                    // Plants not Available
                    echo "<div class='error'>Plants not Available.</div>";
                }

            ?>

            

            <div class="clearfix"></div>


        </div>

    </section>
    <!-- plant Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>

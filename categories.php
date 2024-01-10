<?php include('partials-front/menu.php'); ?>




    <!-- CAtegories Section Starts Here -->
    <section class="categories-search text-center">
        <div class="container">      
        <h1>Categories</h1>

        </div>
    </section>




    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Plants</h2>

            <?php

                //Display all the categories that are active
                //sql Query
                $sql =  "SELECT * FROM tbl_category WHERE active='Yes'";
                
                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //check whether categories available or not
                if($count>0)
                {
                    //categories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>
                        <a href="<?php echo SITEURL; ?>category-plants.php?category_id=<?php echo $id; ?> ">
                            <div class="box-3 float-container">
                                <?php
                                   if($image_name=="")
                                   {
                                      // Image not Available
                                      echo "<div class='error'>Image not found.</div>";
                                   }
                                   else
                                   {
                                       // Image Available
                                       ?>
                                       <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;  ?>" alt="Fruit" class="img-responsive img-curve">

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
                    // categories not Available
                    echo "<div class='error'>Category not found.</div>";
                }

            ?>

            


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php include('partials-front/footer.php'); ?>

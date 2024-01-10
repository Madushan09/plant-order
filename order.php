<?php include('partials-front/menu.php'); ?>

   <?php
      // check whether plant id is set or not
      if(isset($_GET['plant_id']))
      {
          // Get the plant id and details of the selected plant
          $plant_id = $_GET['plant_id'];

          //Get the details
          $sql = "SELECT * FROM tbl_plant WHERE id=$plant_id";

          //Execute the Query
          $res = mysqli_query($conn, $sql);

          //count the rows
          $count = mysqli_num_rows($res);
          //Check whether the data is available or not 
          if($count==1)
          {
            //We have data
            //Get the data from database
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];

            

          }
          else
          {
              // plant not Available
              //Redirect to home page
              header('location:'.SITEURL);
          }

      }
      else
      {
          // Redirect to homepage
          header('location:'.SITEURL);
      }

   ?>


    <!-- plant sEARCH Section Starts Here -->
    <section class="plantsorder-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Plant</legend>

                    <div class="plant-menu-img">
                        <?php

                        //Check whether the image is available or not 
                        if($image_name=="")
                        {
                            //image not available
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //Image is Available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/plant/<?php echo $image_name; ?> " alt="Pineapple" class="img-responsive img-curve">

                            <?php
                        }

                        ?>
                        
                    </div>
    
                    <div class="plant-menu-desc">
                        <h3><?php echo $title; ?></h3>

                        <input type="hidden"name="plant"value="<?php echo $title; ?>">

                        <p class="plant-price">Rs<?php echo $price; ?> </p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" min="1" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Nathure Hub" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. +9443xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. Nathure@Hub.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php

               // Check whether submit button is checked or not
               if(isset($_POST['submit']))
               {

                // Get all the details from the form

                $plant = $_POST['plant'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price*$qty; // total = price*qty

                $order_date = date("Y-m-d h:i:sa"); //order date

                $status = "Ordered"; // ordered, on Delivery ,Delivered,cancelled
                
                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];

                //Save the order in Database
                //Create SQL to save the data

                $sql2 = "INSERT INTO tbl_order SET
                plant ='$plant',
                price ='$price',
                qty = '$qty',
                total = '$total',
                order_date ='$order_date',
                status = '$status',
                customer_name='$customer_name',
                customer_contact='$customer_contact',
                customer_email ='$customer_email',
                customer_address = '$customer_address'

                ";
               
                 //execute the query
                 $res2 = mysqli_query($conn, $sql2);
                 
                 //Check whether query executed successfully or not
                 if($res2==true)
                 {
                    //Query executed and order saved
                    $_SESSION['order'] = "<div class='success text-center'>Plant ordered Successfully.</div>";
                    header('location:'.SITEURL);


               }
               else
               {
                  //Failed to save order
                   $_SESSION['order'] = "<div class='error text-center'>Failed to Plant ordered .</div>";
                   header('location:'.SITEURL);

               }
            }
            ?>

        </div>
    </section>
    <!-- plants sEARCH Section Ends Here -->

<?php include('partials-front/footer.php'); ?>

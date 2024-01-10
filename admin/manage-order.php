<?php include('partials/menu.php') ?>

<div class="main-content1">
    <div class="wrapper1">
        <h1>Manage Order</h1>

          <br/><br/><br/>

          <?php
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

          ?>
          <br><br>

          <table class = "tbl-full">
            <tr>
               <th>S.N.</th>
               <th>Plant</th>
               <th>Price</th>
               <th>Qty.</th>
               <th>Total</th>
               <th>Order Date</th>
               <th>Status</th>
               <th>Customer Name</th>
               <th>Customer Contact</th>
               <th>Email</th>
               <th>Address</th>
               <th>Actions</th>
               <th></th>
            </tr>


            <?php
                //Get all the orders from Databse
                $sql = "SELECT * FROM tbl_order ORDER BY id DESC";//Display the latest order at First 

                //Execute Query
                $res = mysqli_query($conn, $sql);

                //count the rows
                $count = mysqli_num_rows($res);

                $sn =1; // Create a serial number and set its initails value

                if($count>0)
                {
                     // order Available
                     while($row=mysqli_fetch_assoc($res))
                     {
                        //Get all the order details
                        $id = $row['id'];
                        $plant = $row['plant'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $customer_name= $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_address = $row['customer_address'];

                        ?>

                        <tr>
                            <td><?php echo $sn++; ?>.</td>
                            <td><?php echo $plant; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php echo $qty; ?></td>
                            <td><?php echo $total; ?></td>
                            <td><?php echo $order_date; ?></td>

                            <td>
                                <?php 
                                //Ordered , on Delivery, Delivered, cancelled
                                   if($status=="Ordered")
                                   {
                                      echo "<label>$status</label>";
                                   }
                                   elseif($status=="On Delivery")
                                   {
                                      echo "<label style='color:orange;'>$status</label>";
                                   }
                                   elseif($status=="Delivered")
                                   {
                                      echo "<label style='color:green;'>$status</label>";
                                   }
                                   elseif($status=="Cancelled")
                                   {
                                      echo "<label style='color: red;'>$status</labele>";
                                   }
                                 ?>
                            </td>
                            
                            <td><?php echo $customer_name; ?></td>
                            <td><?php echo $customer_contact; ?></td>
                            <td><?php echo $customer_email; ?></td>
                            <td><?php echo $customer_address; ?></td>
                            
                            <td>
                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary1" >Update_Order</a>
                   
                            </td>
                        </tr>

                        <?php

                     }
                }
                else
                {
                    // Order not Available
                    echo "<tr><td colspan='12' class='error'>Orders Not Available.</td></tr>";
                }
            ?>


            

            

          </table>
    </div>

</div>

<?php include('partials/footer.php') ?>

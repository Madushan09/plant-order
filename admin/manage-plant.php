<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Plant</h1>

        <br/><br/>

          <!-- Button to Add Plant -->
          <a href="<?php echo SITEURL; ?>admin/add-plant.php" class="btn-primary">Add Plant</a>

          <br/><br/><br/>

          <?php
           if(isset($_SESSION['add']))
           {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
           }

           if(isset($_SESSION['delete']))
           {
              echo $_SESSION['delete'];
              unset($_SESSION['delete']);
           }
           
           if(isset($_SESSIOBN['unathorize']))
           {
            echo $_SESSION['unathorize'];
            unset($_SESSION['unathorize']);
            
           }

           if(isset($_SESSION['update']))
           {
            echo $_SESSION['update'];
            unset($_SESSION['update']);

           }




          ?>

          <table class = "tbl-full">
            <tr>
               <th>S.N.</th>
               <th>Title</th>
               <th>Price</th>
               <th>Image</th>
               <th>Featured</th>
               <th>Active</th>
               <th>Actions</th>
            </tr>

            <?php
            //Create Sql Query to get all the plant
            $sql = "SELECT * FROM tbl_plant";

            // Execute Query
                $res = mysqli_query($conn, $sql);

            // Count Rows to check  wether we have plants or not
                $count = mysqli_num_rows($res);


                //Create serial  Number and set default value as 1
                $sn=1;

                 if($count > 0)
                 {
                   // We have plant in the database 
                   // Get the data and display
                   while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                        ?>
                        <tr>
                           <td><?php echo $sn++; ?>. </td>
                           <td><?php echo $title; ?></td>
                           <td><?php echo $price; ?></td>
                           <td>
                               <?php 
                               //Check wether image name is available or not
                                if($image_name=="")
                                {
                                    //we do not have image, Display error message
                                    echo "<div class='error'>Image not Added.</div>";
                                }
                                else
                                {
                                     //we  have image, Display image
                                     ?>
                                     <img src="<?php echo SITEURL; ?>images/plant/<?php echo $image_name; ?>" width="100px">

                                     <?php
                                }



                               ?>
                           </td>
                           <td><?php echo $featured; ?></td>
                           <td><?php echo $active; ?></td>
                           <td>
                           <a href="<?php echo SITEURL; ?>admin/update-plant.php?id=<?php echo $id; ?>" class="btn-secondary" > Update Plant</a>
                           <a href="<?php echo SITEURL; ?>admin/delete-plant.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger" > Delete Plant</a>
                           </td>
                        </tr>
                        <?php
                    }
                 }
                 else
                 {
                    // plant  not Added in database
                   echo "<tr> <td colspan='7' class='error'>Plant Not Added yet.</td></tr>";
                 }


            ?>
            

            
          </table>
    </div>

</div>

<?php include('partials/footer.php') ?>

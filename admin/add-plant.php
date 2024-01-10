<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Plant</h1>

        <br><br>


         <?php
           
           if(isset($_SESSION['upload']))
           {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
           }
        
        
        ?>
        <br><br>

       <form action="" method="POST" enctype="multipart/form-data">


          <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Plant">
                    </td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Plant."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                        <?php
                            //Create PHP code to display categories from database
                            //1.Create SQL to get all active categories from database
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                            //Executing query
                            $res = mysqli_query($conn, $sql);
                            //Count Rows to check wether we have categories or not
                            $count = mysqli_num_rows($res);

                            //If  count is greater than zero,we have categories else we donot have categories
                            if ($count > 0) 
                            {
                                //We do  have categories
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    //get the details of categories
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    ?>

                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                    <?php

                                }

                            }
                            else
                            {
                               //We do not have category
                                ?>

                                <option value="0">No Category Found</option>

                                <?php
                            }
                            //2.Display on Dropdown

                        ?>
                        
                         <option value="1">vegitables plant</option> 
                         <option value="2">Flower plant</option>
                          <option value="3">search</option>  
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                       <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured"value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                       <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active"value="No">No 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                       <input type="submit" name="submit" value="Add Plant"class="btn-secondary">

                    </td>
                </tr>

            </table>

    

       </form>

       <?php
          // Check whether the button is clicked or not

          if(isset($_POST['submit']))
          {
            //Add the food in Database
            //echo "Clicked";

            //1.Get the data from form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            //Check wether radion button for featured and active are checked or not
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No";  // Setting the Default value
            }


            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No";  // Setting the Default value
            }
            


            //2.Upload the image if selected
            //Check whether the select image is clicked or not and upload the image only if  the image is selected
            if(isset($_FILES['image']['name']))
            {
                //Get the detaials of the selected image
                  $image_name = $_FILES['image']['name'];

                 //Check whether the  image is selected or not and upload the image only if  selected 
                 if($image_name!="")
                 {
                    //Image is selected
                    //A.Rename the Image
                    //Get the extension of selected image(jpg,png,gif,etc)"plant-fruit.jpg"
                    $ext = end(explode('.', $image_name));

                    //create New Name for Image
                    $image_name = "Plant-Name-".rand(0000,9999).".".$ext; //New Image Name may be "Plant-Name-657.jpg"

                    //B.upload the Image
                    //Get the Src path and Description path

                    //Sourse path is the current location of the Image
                    $src = $_FILES['image']['tmp_name'];

                    //Destination path for the image  to  be uploaded.
                    $dst = "../images/plant/".$image_name;

                    //Finally upload the plant image
                    $upload = move_uploaded_file($src, $dst);


                    //Check wether image uploaded of not
                    if($upload==false)
                     {
                        //Failed to upload the image
                        //Redirect to Add plant page with error Message

                        $_SESSION['upload'] = "<div class ='error'>Failed to upload Image.</div>";

                        //Redirect to Add Category page
                        header('location:'.SITEURL.'admin/add-plant.php');
                        //stop the process
                        die();
                     }

                
                 }

            }
            else
            {
                $image_name = "";  // Setting the Default value as blank
            }


            //3.Insert Into Database
            
            //Create  a SQL Query to saver or Add plant

            //For Numerical we do not need to pass value inside quotes '' But for string value iit is complusory to add quotes''
            $sql2 = "INSERT INTO tbl_plant SET
            title ='$title',
            description ='$description',
            price ='$price',
            image_name ='$image_name',
            category_id='$category',
            featured='$featured',
            active='$active'
            ";

            //Execute the Query

            $res2 = mysqli_query($conn, $sql2);

            //4. Redirect with Message to Manage Plant Page
            //Check wether data inserted or not
            if($res2==true)
            {
                //Data inserted Successfully
                $_SESSION['add'] = "<div class='success'>Plant Added Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-plant.php');
            }
            else
            {
                //failed to  insert data
                $_SESSION['add'] = "<div class='error'>Failed to Add Plant.</div>";
                header('location:'.SITEURL.'admin/manage-plant.php');
            }

            

            


          }

       ?>





    </div>
</div>



<?php include('partials/footer.php');?>
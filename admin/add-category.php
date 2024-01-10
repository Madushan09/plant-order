<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php
           if(isset($_SESSION['add']))
           {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
           }
           if(isset($_SESSION['upload']))
           {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
           }
        
        
        ?>
        <br><br>


        <!-- Add category from Starts -->

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>


                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
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
                       <input type="submit" name="submit" value="Add Category"class="btn-secondary">

                    </td>
                </tr>

            </table>
        </form>
         <!-- Add category from Ends -->

         <?php


         //Check whether the Submit Button is Clicked or Not
         if(isset($_POST["submit"]))
         {
            //echo "Clicked";

            //1.Get the Value from Category from
            $title= $_POST["title"];
         

            //For Radio input, we need to check whether the button is selected or not 
            if(isset($_POST['featured']))
            {
                //Get the value from form
                $featured =$_POST['featured'];
            }
            else
            {
                //Set the Default value
                $featured ="No";
            }
            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }else
            {
                $active = "No";
            }

            //Check whether the image is selected or not and set the value for image name accoridingly
            //print_r($_FILES['image']);

            //die();//Break the code here
            if(isset($_FILES['image']['name']))
            {
                //Upload the Image
                //To upload image we need image name,source path and destination path
                $image_name = $_FILES['image']['name'];


                //upload the Image only if image is selected
                if($image_name != "")
                {

                

                  //Auto rename our Image
                  //Get the Extention of our image(jpg,png,gif,etc)e.g."specialplant.jpg"
                  $ext = end(explode('.',$image_name));

                  //Rename the Image
                  $image_name = "Plant_Category_".rand(000,999).'.'.$ext; // e.g.Food_Category_834.jpg
                

                  $sourse_path = $_FILES['image']['tmp_name'];

                  $destination_path = "../images/category/".$image_name;

                  //Finally Upload  the Image
                  $upload = move_uploaded_file($sourse_path, $destination_path);

                  //Check wether the image is upload or not
                  //Add if the image is not uploaded then we will stop the process and redirect with error  message
                  if($upload==false)
                     {
                        //SET message
                        $_SESSION['upload'] = "<div class ='error'>Failed to upload Image.</div>";
                        //Redirect to Add Category page
                        header('location:'.SITEURL.'admin/add-category.php');
                        //stop the process
                        die();
                     }
                }
            }
            else
            {
                //Don't upload Image and set the image_name value as blank
                $image_name="";
            }


            //2.create SQL Query to insert Category into Database
            $sql = "INSERT INTO tbl_category SET
            title ='$title',
            image_name ='$image_name',
            featured='$featured',
            active='$active'
            ";
            
            //3.Execute the Query and Save in Database 
            $res = mysqli_query($conn, $sql);

            //4.Check whether the query executed or not and data added or not
            if($res==true)
            {
                //Query Executed and Category Added
                $_SESSION['add'] = "<div class='success'>Category added Successfully.</div>";
                //Redirect to Manage Category Page
                header('location:'.SITEURL.'admin/manage-category.php');

            }
            else{
                //Failed to Add category
                $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
                //Redirect to Manage Category Page
                header('location:'.SITEURL.'admin/add-category.php');

            }


        }
         ?>


    </div>
</div>

<?php include('partials/footer.php') ?>


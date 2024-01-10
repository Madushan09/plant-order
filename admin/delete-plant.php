<?php
     //Include Constraint Page
     include('../config/constants.php');


     //echo "Delete Plant Page";

     if(isset($_GET['id']) && isset($_GET['image_name']))  // Either use '&&' or 'AND'
     {
        //Process to Delete
        //echo "Process to Delete";

        //1.Get IED and Image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2.Remove the Image if Available
        //Check whether the image is available or not and Delete only if available
        if($image_name != "")
        {
            //IT has image andf need to remove from folder
            //Get the Image path
            $path = "../images/plant/".$image_name;

            //Remove Image file from folder
            $remove = unlink($path);

            //Check whether the image is removed or not
            if($remove==false)
            {
                //Failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
                //Redirect to Manage plant
                header('location:'.SITEURL.'admin/plant-manage.php');
                //stop the  process of deleting Plant
                die();
                
            }
        }

        //3.Delete Plant from Database
        $sql = "DELETE FROM tbl_plant WHERE id=$id";
        //Execute the query
        $res = mysqli_query($conn,$sql);

        //Check whether the query executed or not and set the session message respectively
        if($res==true)
        {
            //Plant Deleted
            $_SESSION['delete'] ="<div class ='success'>Plant Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-plant.php');

        }
        else{
            //Failed to EDelete Plant
            $_SESSION['delete'] ="<div class ='error'>Failed to Deleted Plant.</div>";
            header('location:'.SITEURL.'admin/manage-plant.php');

        }

        //4.Redirect to manage Plant with Session Message
     }
     else
     {
        //Redirect to Manage Food page
        //echo " REdirect";
        $_SESSION['unathorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-plant.php');

     }
?>
<?php
     
     //Authorization - Access Control 
     //Check whether the user is logged in  or not
    if(!isset($_SESSION['user']))//IF user session is not set
    {
        //User is not Login in 
        //Redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
        //REdirect to login page 
        header('location:'.SITEURL.'admin/login.php');
    }


?>
<?php

      //Include constants.php for SITURL
      include('../config/constants.php');

      //1. Destory the Session
      session_destroy();//Unsets $_SESSION['user']
    
      //2. REdirect to Login page
      header('location:'.SITEURL.'admin/login.php');

?>
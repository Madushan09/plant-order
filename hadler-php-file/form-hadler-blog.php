<?php

    $con = mysqli_connect("localhost","root","","plant-order");

    if(!$con){
        die('Could not connect'.mysql_error());
    }else{
        echo 'Connection Established Successfully.....';
        echo nl2br("\n");

       $sql = "INSERT INTO customer_comment(name,email,comment)
        VALUES 
	   ('$_POST[name]',
        '$_POST[email]',
        '$_POST[comment]')";
    }
	
    if(!mysqli_query($con,$sql)){
        die('Error'.mysql_error());
    }else{
        echo 'your record added successfully...';
    }
    mysqli_close($con);
	

?>
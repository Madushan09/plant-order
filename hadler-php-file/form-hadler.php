<?php

    $con = mysqli_connect("localhost","root","","plant-order");

    if(!$con){
        die('Could not connect'.mysql_error());
    }else{
        echo 'Connection Established Successfully.....';
        echo nl2br("\n");

       $sql = "INSERT INTO customer_feedback(name,email,place,message)
        VALUES 
	   ('$_POST[name]',
        '$_POST[email]',
        '$_POST[place]',
        '$_POST[message]')";
    }
	
    if(!mysqli_query($con,$sql)){
        die('Error'.mysql_error());
    }else{
        echo 'your record added successfully...';
    }
    mysqli_close($con);
	

?>
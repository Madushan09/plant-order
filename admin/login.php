
<?php include('../config/constants.php');?>
<html>
    <head>
        <title>Login - Plant Order System</title>
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    </head>

    <body>

        <?php
        if(isset($_SESSION['login']))
          {
             echo $_SESSION['login'];
             unset($_SESSION['login']);
          }

          if(isset($_SESSION['no-login-message']))
          {
             echo $_SESSION['no-login-message'];
             unset($_SESSION['no-login-message']);
          }


        ?>

        <!------------ login Form Start Here----------->
		<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/bg1.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Admin Login
				</span>
				<form action="" method="POST" class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
					<input type="submit" name="submit" value="Login" class="login100-form-btn">
					</div>

				</form>
                <br><br>
                <p class="text-center" style="color:#fff;">Created by - <a href="www.naturehub.com">Nature Hub</a></p>
			</div>
		</div>
	</div>
        <!------------ login Form End Here----------->

    </body>
</html>

<?php

//Check Whether the submit Button is Clicked or Not
if(isset($_POST['submit']))
{
    //Process for login
    //1.Get the Data form Login Form 
   
    // $username = $_POST['username'];
    // $password = md5($_POST['password']);

    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $raw_password = md5($_POST['password']);

    $password = mysqli_real_escape_string($conn, $raw_password);


    //2.SQL to Whether the user with username and password exists or not
    $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    //3.Executed the Query
    $res = mysqli_query($conn, $sql);

    //4.Count rows to check whether the user exists or not
    $count = mysqli_num_rows($res);


    if($count==1)
    {
        //User Available and Login Success
        $_SESSION['login'] = "<div class='success1'>Login Successful.</div>";
        $_SESSION['user'] = $username;//To check whether the user is logged in or not and logout will unset it

        
        //REdirect to Home Page/Dashboard
        header('location:'.SITEURL.'admin/');

    }
    else
    {
        //User not Available and Login Failed
        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
        //REdirect to Home Page/Dashboard
        header('location:'.SITEURL.'admin/login.php');
    }

}


?>
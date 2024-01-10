<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nathure Hub</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">    
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Nature Hub Logo" class="img-responsive">
                </a>
            </div>
            

            <div class="menu text-right">  
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>plants.php">Plants</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
                    </li>
                     <li>
                        <a href="<?php echo SITEURL; ?>blog.php">Blog</a>
                    </li>
                </ul>
            </div>
           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
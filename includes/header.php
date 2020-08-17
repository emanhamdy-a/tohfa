<?php include("includes/function.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tohfa | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    
</head>

<body>

    <!-- Header Section Begin -->
    <header id='header' class="header-section mt-4">
         <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2"style='margin-right: 40px;'>
                        <div class="logo">
                            <a href="index.php">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- search -->
                    <div class="col-lg-8 col-md-8 p-0"style=''>
                    <?php include("includes/search_form.php"); ?>

                    </div>
                    <div class="col-lg-1 col-md-1"id=''>
                        <ul class="nav-right" style="color:red;">
                            <li class="heart-icon" style="float:right;">
                              <?php echo_favorit_icon();?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item"id='miniNav'>
                <nav class="nav-menu mobile-menu"style='margin:auto;border:0px solid white;'>
                    <ul >
                        <li id='hom' style='border-left:1px solid #3b3b3b;'><a href='index.php'>Home</a></li>
                        <li id='cats'><a href='categories.php'>Categories</a></li>
                        <li id='myacont'> <?php echo_myaccount(); ?></li>
                        <li id='crtacont'><?php echo_creatacount(); ?></li>
                        <li id='rgst'> <?php echo_regester(); ?> </li>
                        <li id='favort'>     <?php echo_favorit(); ?> </li>     
                        <li id='orders_link'><a href="orders.php">Orders</a></li>
                        <li id='search_link'><a href="search.php?pag=nowrd">Search</a></li>
                        <li id='log'>     <?php echo_logout_or_logn(); ?> </li> 
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>


    <?php include("includes/create_account.php"); ?>
    <?php include("includes/signup.php"); ?>
    <?php include("includes/login.php"); ?>
    
    <div id='main_cntnr'>
   <!-- Header End -->
   
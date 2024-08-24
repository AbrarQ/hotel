<?php
session_start();
?>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alexander Luxury Hotel</title>
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/line-awesome.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/daterangepicker.css">
    <link rel="stylesheet" href="css/animated-headline.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/flag-icon.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- start cssload-loader -->
<!--<div class="preloader" id="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>-->
<!-- end cssload-loader -->



<!-- ================================
            START HEADER AREA
================================= -->
<header class="header-area">
    <div class="header-top-bar padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-left">
                            <ul class="list-items">
                                <li><a href="#"><i class="la la-phone mr-1"></i>+91 79950  26009</a></li>
                                <li><a href="#"><i class="la la-envelope mr-1"></i>info@alexanderluxuryhotel.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
    <div class="header-menu-wrapper padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-wrapper justify-content-between">
                        <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                        <div class="logo">
                            <a href="index.php"><img src="images/logo.png" alt="logo" ></a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div><!-- end menu-toggler -->
                        </div><!-- end logo -->
                        <div class="main-menu-content pr-0 ml-0">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="index.php">Home </a>
                                    </li>
                                    <li>
                                        <a href="about.php">About Us </i></a>
                                        
                                    </li>
                                    <li>
                                        <a href="rooms.php">Rooms </a>
                                       
                                    </li>
                                    <li>
                                        <a href="banquet.php">Banquet </a>
                                        </li>
                                    <li>
                                        <a href="dining.php">Dining</a>
                                        
                                    </li>
                                    <li>
                                        <a href="gallery.php">Gallery</a>
                                        
                                    </li>
                                 <!--   <li>
                                        <a href="dining.php">Events</a>
                                        
                                    </li>-->
                                    <li>
                                        <a href="contact.php">Contact Us</a>
                                       
                                    </li>
                                    
                                </ul>
                            </nav>
                        </div><!-- end main-menu-content -->
                        <div class="nav-btn">
                            <a href="rooms.php" class="theme-btn">Book Now</a>
                        </div><!-- end nav-btn -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
</header>
<!-- ================================
         END HEADER AREA
================================= -->

<?php
$con = mysqli_connect("localhost", "alex_atp1", "qwert@1234", "alex_atp");

?>
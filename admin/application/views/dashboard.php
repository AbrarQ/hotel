<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dasboard</title>
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/line-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/animated-headline.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/css/style.css">
</head>
<body class="section-bg">
<!-- start cssload-loader -->
<div class="preloader" id="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!-- ================================
       START USER CANVAS MENU
================================= -->
<?php include("header.php");?>
<!-- ================================
       END USER CANVAS MENU
================================= -->

<!-- ================================
       START DASHBOARD NAV
================================= -->

<!-- ================================
       END DASHBOARD NAV
================================= -->

<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">
    <div class="dashboard-nav dashboard--nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-wrapper">
                        
                        
                        
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-nav -->
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Dashboard</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    
                </div><!-- end row -->
				<?php
				$all = 0;
				$pending = 0;
				$cancelled = 0;
				$confirmed = 0;
				foreach($counts as $c){
					$all += $c['count'];
					if($c['Booking_Status']=="APPROVED"){
						$confirmed += $c['count'];
					}else if($c['Booking_Status']=="CANCELLED"){
						$cancelled += $c['count'];
					}else if($c['Booking_Status']=="PENDING"){
						$pending += $c['count'];
					}
					
				}
				?>
                <div class="row mt-4">
                    <div class="col-lg-3 responsive-column-l">
                        <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                            <div class="d-flex pb-3 justify-content-between">
                                <div class="info-content">
                                    <p class="info__desc">Total Booking!</p>
                                    <h4 class="info__title"><?php echo $all;?></h4>
                                </div><!-- end info-content -->
                                <div class="info-icon icon-element bg-4">
                                    <i class="la la-shopping-cart"></i>
                                </div><!-- end info-icon-->
                            </div>
                            <div class="section-block"></div>
                            <a href="<?php echo base_url().'index.php/Admin/bookings';?>" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
                        </div>
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column-l">
                        <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                            <div class="d-flex pb-3 justify-content-between">
                                <div class="info-content">
                                    <p class="info__desc">Pending</p>
                                    <h4 class="info__title"><?php echo $pending;?></h4>
                                </div><!-- end info-content -->
                                <div class="info-icon icon-element bg-3">
                                    <i class="la la-star"></i>
                                </div><!-- end info-icon-->
                            </div>
                            <div class="section-block"></div>
                            <a href="<?php echo base_url().'index.php/Admin/bookings';?>" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
                        </div>
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column-l">
                        <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                            <div class="d-flex pb-3 justify-content-between">
                                <div class="info-content">
                                    <p class="info__desc">Confirmed</p>
                                    <h4 class="info__title"><?php echo $confirmed;?></h4>
                                </div><!-- end info-content -->
                                <div class="info-icon icon-element bg-2">
                                    <i class="la la-envelope"></i>
                                </div><!-- end info-icon-->
                            </div>
                            <div class="section-block"></div>
                            <a href="<?php echo base_url().'index.php/Admin/bookings';?>" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
                        </div>
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column-l">
                        <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                            <div class="d-flex pb-3 justify-content-between">
                                <div class="info-content">
                                    <p class="info__desc">Cancelled</p>
                                    <h4 class="info__title"><?php echo $cancelled;?></h4>
                                </div><!-- end info-content -->
                                <div class="info-icon icon-element bg-1">
                                    <i class="la la-bookmark-o"></i>
                                </div><!-- end info-icon-->
                            </div>
                            <div class="section-block"></div>
                            <a href="<?php echo base_url().'index.php/Admin/bookings';?>" class="d-flex align-items-center justify-content-between view-all">View All <i class="la la-angle-right"></i></a>
                        </div>
                    </div><!-- end col-lg-3 -->
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 responsive-column--m">
                        <div class="form-box dashboard-card">
                            <div class="form-title-wrap" style="height: 350px; text-align: center">
							<br><br><br>
                                <img src="<?php echo base_url();?>images/logo.png"><br><br>
								<h2>Alexander Luxury Hotel</h2>
                            </div>
                            
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-6 -->
                    
                    
                    
                     
                    
                    
                     
                </div><!-- end row -->
                <div class="border-top mt-4"></div>
                <?php include('footer.php');?>
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap -->
</section><!-- end dashboard-area -->
<!-- ================================
    END DASHBOARD AREA
================================= -->

<!-- start scroll top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<!-- Template JS Files -->
<script src="<?php echo base_url();?>template/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url();?>template/js/jquery-ui.js"></script>
<script src="<?php echo base_url();?>template/js/popper.min.js"></script>
<script src="<?php echo base_url();?>template/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>template/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url();?>template/js/moment.min.js"></script>
<script src="<?php echo base_url();?>template/js/daterangepicker.js"></script>
<script src="<?php echo base_url();?>template/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>template/js/jquery.fancybox.min.js"></script>
<script src="<?php echo base_url();?>template/js/jquery.countTo.min.js"></script>
<script src="<?php echo base_url();?>template/js/animated-headline.js"></script>
<script src="<?php echo base_url();?>template/js/jquery.sparkline.js"></script>
<script src="<?php echo base_url();?>template/js/dashboard.js"></script>
<script src="<?php echo base_url();?>template/js/chart.js"></script>
<script src="<?php echo base_url();?>template/js/chart.extension.js"></script>
<script src="<?php echo base_url();?>template/js/bar-chart.js"></script>
<script src="<?php echo base_url();?>template/js/line-chart.js"></script>
<script src="<?php echo base_url();?>template/js/jquery.ripples-min.js"></script>
<script src="<?php echo base_url();?>template/js/main.js"></script>
</body>
</html>
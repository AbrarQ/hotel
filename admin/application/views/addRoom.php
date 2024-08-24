<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Room</title>
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


<div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Add Room</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <!-- end col-lg-6 -->
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title">Add Room</h3>
                            </div>
                            <div class="form-content">
                                <div class="contact-form-action">
                                     <form action="<?php echo base_url().'index.php/Admin/insertRoom'?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-2 responsive-column">
											 <label class="label-text" style="margin-top: 10px;float: right; font-weight: 600">Room Type</label>
											</div>
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                   
                                                    <div class="form-group">
                                                       
                                                        <input class="form-control" name="Room_Type_Name" type="text" placeholder="Room Type">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
											</div>
											
											<div class="row">
                                            <div class="col-lg-2 responsive-column">
											 <label class="label-text" style="margin-top: 10px;float: right; font-weight: 600">No.of Adults</label>
											</div>
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                   
                                                    <div class="form-group">
                                                       
                                                        <input class="form-control" name="Number_of_Adults" type="number" placeholder="No.of Adults">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
											</div>
											<div class="row">
                                            <div class="col-lg-2 responsive-column">
											 <label class="label-text" style="margin-top: 10px;float: right; font-weight: 600">No.of Childrens</label>
											</div>
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                   
                                                    <div class="form-group">
                                                       
                                                        <input class="form-control" name="Number_of_Childrens" type="number" placeholder="No.of Childrens">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
											</div>
											<div class="row">
                                            <div class="col-lg-2 responsive-column">
											 <label class="label-text" style="margin-top: 10px;float: right; font-weight: 600">Room Price</label>
											</div>
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                   
                                                    <div class="form-group">
                                                       
                                                        <input class="form-control" name="Room_Price" type="text" placeholder="Room Price">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
											</div>
											<div class="row">
                                            <div class="col-lg-2 responsive-column">
											 <label class="label-text" style="margin-top: 10px;float: right; font-weight: 600">Room Description</label>
											</div>
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                   
                                                    <div class="form-group">
                                                       <textarea class="form-control" name="Room_Description"></textarea>
                                                        
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
											</div>
											
											
											<div class="row">
                                            <div class="col-lg-2 responsive-column">
											 <label class="label-text" style="margin-top: 10px;float: right; font-weight: 600">Room Images</label>
											</div>
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                   
                                                    <div class="form-group">
                                                       
                                                       <input type="file" class="form-control" name="Room_Image[]" multiple />
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
											</div>
											
                                             <div class="row">
                                            
                                             <div class="col-lg-12">
                                                 <div class="btn-box">
                                                     <input type="submit" class="theme-btn" value="Add Room">
                                                 </div>
                                            </div><!-- end col-lg-12 -->
                                        </div><!-- end row -->
                                    </form>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-6 -->
                    
                    
                </div><!-- end row -->
               
                
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap -->

	</section>
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
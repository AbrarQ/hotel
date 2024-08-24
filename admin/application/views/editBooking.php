<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Booking</title>
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
                                <h2 class="sec__title font-size-30 text-white">Edit Booking</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <!-- end col-lg-6 -->
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
                                <h3 class="title">Edit Booking</h3>
                            </div>
							<?php
							//print_r($bookingDetails);
							//print_r($roomList);
							?>
                            <div class="form-content">
                                <div class="contact-form-action">
                                     <form action="<?php echo base_url().'index.php/Admin/updateBooking'?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">First Name</label>
											<input  type="hidden" value="<?php echo $bookingDetails->Booking_ID;?>" name="Booking_ID">
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" value="<?php echo $bookingDetails->First_Name;?>" name="First_Name" placeholder="First name">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Last Name</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" value="<?php echo $bookingDetails->Last_Name;?>" name="Last_Name" placeholder="Last name">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Your Email</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control" type="email" value="<?php echo $bookingDetails->Email;?>" name="Email" placeholder="Email address">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Phone Number</label>
                                            <div class="form-group">
                                                <span class="la la-phone form-icon"></span>
                                                <input class="form-control" type="text" value="<?php echo $bookingDetails->Mobile;?>" name="Mobile" placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Address Line</label>
                                            <div class="form-group">
                                                <span class="la la-map-marked form-icon"></span>
                                                <input class="form-control" type="text" value="<?php echo $bookingDetails->Address;?>" name="Address" placeholder="Address line">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    
                                    
									
									
									<div class="col-lg-6 input-box">
                                            <label class="label-text">Check-in</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="form-control" type="date" value="<?php echo $bookingDetails->From_Date;?>" name="From_Date" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6 input-box">
                                            <label class="label-text">Check-out</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="form-control" type="date" value="<?php echo $bookingDetails->To_Date;?>" name="To_Date" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6 input-box">
                                            <label class="label-text">Rooms</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select" name="Number_Of_Rooms" required >
                                                        <option value="">Select Room</option>
														<?php
														for($k=1;$k<=10;$k++){
														?>
                                                        <option <?php if($bookingDetails->Number_Of_Rooms=="$k"){ echo "Selected";}?> value="<?php echo $k;?>"><?php echo $k;?> Room</option>
                                                        <?php
														}
														?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
										
										<div class="col-lg-6 input-box">
                                            <label class="label-text">Number of Adults</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="number" value="<?php echo $bookingDetails->Number_of_Adults;?>" name="Number_of_Adults" >
                                            </div>
                                        </div>
										<div class="col-lg-6 input-box">
                                            <label class="label-text">Number of Childrens</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="number" value="<?php echo $bookingDetails->Number_of_Childrens;?>" name="Number_of_Childrens" >
                                            </div>
                                        </div>
										<div class="col-lg-6 input-box">
                                            <label class="label-text">Room Type</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select" name="Room_Type_ID" required >
                                                        <option value="">Select Room Type</option>
														<?php
														foreach($roomList as $room){
														?>
                                                        <option <?php if($bookingDetails->Room_Type_ID==$room['Room_Type_ID']){ echo "Selected";}?> value="<?php echo $room['Room_Type_ID'];?>"><?php echo $room['Room_Type_Name'];?></option>
                                                        <?php
														}
														?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
										
										<div class="col-lg-6 input-box">
                                            <label class="label-text">Booking Status</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select" name="Booking_Status" required >
                                                        <option value="">Select Status</option>
														
                                                        <option <?php if($bookingDetails->Booking_Status=="APPROVED"){ echo "Selected";}?> value="APPROVED">APPROVED</option>
														
														<option <?php if($bookingDetails->Booking_Status=="PENDING"){ echo "Selected";}?> value="PENDING">PENDING</option>
                                                        
														<option <?php if($bookingDetails->Booking_Status=="CANCELLED"){ echo "Selected";}?> value="CANCELLED">CANCELLED</option>
                                                        
														<option <?php if($bookingDetails->Booking_Status=="CHECKOUT"){ echo "Selected";}?> value="CHECKOUT">CHECKOUT</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
										
										<div class="col-lg-12 input-box">
                                            <label class="label-text">Remarks</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-open-text form-icon"></span>
												
                                                <input class="form-control" type="text" value="<?php echo $bookingDetails->Remarks;?>" name="Remarks" >
                                            </div>
                                        </div>
										
                                </div>
                            </div><!-- end sidebar-widget-item -->
                            
                                
                                
                            
									
									
                                    
                                </div>
											 
                                             <div class="row">
                                            
                                             <div class="col-lg-12">
                                                 <div class="btn-box">
                                                     <input type="submit" class="theme-btn" value="Update Room">
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
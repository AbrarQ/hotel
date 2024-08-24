<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookings</title>
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
    <!-- end dashboard-nav -->
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Booking</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="title">Booking Results</h3>
                                    
                                </div>
                            </div>
							<form action="<?php echo base_url().'index.php/Admin/bookings'?>" method="post" enctype="multipart/form-data">
								<div class="row">
                                            <div class="col-lg-1 responsive-column pt-2">
											 <label class="label-text" style="margin-top: 10px;float: right; font-weight: 600">From</label>
											</div>
                                            <div class="col-lg-2 responsive-column pt-2">
                                                <div class="input-box">
                                                   
                                                    <div class="form-group">
                                                       
                                                        <input class="form-control" name="From_Date" type="date" value="<?php echo $this->input->post('From_Date');?>">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
											<div class="col-lg-1 responsive-column pt-2">
											 <label class="label-text" style="margin-top: 10px;float: right; font-weight: 600">To</label>
											</div>
                                            <div class="col-lg-2 responsive-column pt-2">
                                                <div class="input-box">
                                                   
                                                    <div class="form-group">
                                                       
                                                        <input class="form-control" name="To_Date" type="date" value="<?php echo $this->input->post('To_Date');?>">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
											
											<div class="col-lg-1 responsive-column pt-2">
											 <label class="label-text" style="margin-top: 10px;float: right; font-weight: 600">Status</label>
											</div>
                                            <div class="col-lg-2 responsive-column pt-2">
                                                <div class="input-box">
                                                   
                                                    <div class="form-group">
                                                       
                                                        <select class=" pt-2" name="Booking_Status">
												
														<option value="0">Select Type</option>
														<option <?php if($this->input->post('Booking_Status')=="PENDING"){ echo "Selected";}?> value="PENDING">PENDING</option>
														<option <?php if($this->input->post('Booking_Status')=="APPROVED"){ echo "Selected";}?> value="APPROVED">APPROVED</option>
														<option <?php if($this->input->post('Booking_Status')=="CANCELLED"){ echo "Selected";}?> value="CANCELLED">CANCELLED</option>
													</select>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
											
											<div class="btn-box pt-2">
										<input class="btn-box theme-btn text-center" type="submit" value="Apply Filter">
                            </div>
											
								
								</div>
							</form>
                            <div class="form-content pb-2">
							
							<?php
							//print_r($bookings);
							foreach($bookings as $booking){
								
							?>
                                <div class="card-item card-item-list card-item--list">
                                    
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <h3 class="card-title"><?php echo $booking['Room_Type_Name'];?></h3>
											
											<?php
											if($booking['Booking_Status']=="PENDING"){
											?>
                                            <span class="badge badge-warning text-white ml-2"><?php echo $booking['Booking_Status'];?></span>
											<?php
											}else if($booking['Booking_Status']=="APPROVED"){
											?>
                                            <span class="badge badge-success text-white ml-2"><?php echo $booking['Booking_Status'];?></span>
											<?php
											}else if($booking['Booking_Status']=="CANCELLED"){
											?>
                                            <span class="badge badge-danger text-white ml-2"><?php echo $booking['Booking_Status'];?></span>
											<?php
											}
											?>
                                        </div><br>
										<div class="row">
										<div class="col-lg-6">
									   <h3 class="card-title">Booking Details</h3>
                                       <ul class="list-items list-items-2 pt-2 pb-3">
                                           <li><span>Booking ID:</span><?php echo "ALEX_".$booking['Booking_ID'];?></li>
                                           <li><span>Start date:</span><?php echo date("d M Y", strtotime($booking['From_Date']));?></li>
                                           <li><span>End date:</span><?php echo date("d M Y", strtotime($booking['To_Date']));?></li>
                                           <li><span>Booking details:</span> <?php echo $booking['Number_of_Adults'];?> Adults, <?php echo $booking['Number_of_Childrens'];?> Childrens </li>
                                           <li><span>Number of Rooms:</span> <?php echo $booking['Number_Of_Rooms'];?> </li>
                                       </ul>
									   </div>
										<div class="col-lg-6">
										 <h3 class="card-title">Client Details</h3>
										
                                       <ul class="list-items list-items-2 pt-2 pb-3">
                                           <li><span>Name:</span><?php echo $booking['First_Name']." ".$booking['Last_Name'];?></li>
                                           <li><span>Mobile:</span><?php echo $booking['Mobile'];?></li>
                                           <li><span>Email:</span><?php echo $booking['Email'];?></li>
                                           <li><span>Address:</span><?php echo $booking['Address'];?></li>
                                           
										   </ul>
									   </div>
									   
									   </div>
                                       
                                    </div>
									
                                    <div class="action-btns">
									
                                        <a href="<?php echo base_url().'index.php/Admin/editBooking/'.$booking['Booking_ID'];?>" class="theme-btn theme-btn-small mr-2"><i class="la la-pencil mr-1"></i>Edit</a>
                                        
                                    </div>
									
                                </div><!-- end card-item -->
                               <?php
								}
							?>							   
                                
                                
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                
                <div class="border-top mt-5"></div>
                
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap -->
</section><!-- end dashboard-area -->
<!-- ================================
    END DASHBOARD AREA
================================= -->

<!-- end modal-shared -->
<div class="modal-popup">
    <div class="modal fade" id="modalPopup" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title" id="exampleModalLongTitle">Send Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contact-form-action">
                        <form method="post">
                            <div class="input-box">
                                <div class="form-group mb-0">
                                    <i class="la la-pencil form-icon"></i>
                                    <textarea class="message-control form-control" name="message" placeholder="Write message here..."></textarea>
                                </div>
                            </div>
                        </form>
                    </div><!-- end contact-form-action -->
                </div>
                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn font-weight-bold font-size-15 color-text-2 mr-2" data-dismiss="modal">Cancel</button>
                    <button type="button" class="theme-btn theme-btn-small">Send Message</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- end modal-popup -->


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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Room</title>
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
                                <h2 class="sec__title font-size-30 text-white">Rooms List</h2>
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
                                <div class="col-lg-6">
                                    <h3 class="title">Room Lists &emsp;<a href="<?php echo base_url().'index.php/admin/addRoom';?>" class="theme-btn theme-btn-small mr-2" data-toggle="tooltip" data-placement="top" title="View"><i class="la la-plus">Add Room</i></a></h3>
                                    
                                </div>
								
                            </div>
                            <div class="form-content">
                                <div class="table-form table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">Room Name</th>
                                            <th scope="col">No.of Adults</th>
                                            <th scope="col">No.of Childrens</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php
										$i=1;
										foreach($roomList as $room){
										?>
                                        <tr>
                                            <th scope="row"><?php echo $i++;?></th>
                                           
                                            <td><?php echo $room['Room_Type_Name'];?></td>
                                            <td><?php echo $room['Number_of_Adults'];?></td>
                                            <td><?php echo $room['Number_of_Childrens'];?></td>
                                            <td><?php echo $room['Room_Price'];?></td>
                                            <td><?php echo $room['Room_Description'];?></td>
                                            <td>
											<?php if($room['Room_Type_Status'] == "ACTIVE"){
												?>
												<span class="badge badge-success py-1 px-2">Active</span>
												<?php
											}else if($room['Room_Type_Status'] == "BOOKED"){
												?>
												<span class="badge badge-warning py-1 px-2">Booked</span>
												<?php
											}else if($room['Room_Type_Status'] == "DELETED"){
												?>
												<span class="badge badge-danger py-1 px-2">DELETED</span>
												<?php
											}else  ?>
											
											
											</td>
                                            
                                            <td>
                                                <div class="table-content">
                                                    
                                                    <a href="<?php echo base_url().'index.php/admin/editRoom/'.$room['Room_Type_ID'];?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="la la-edit"></i></a> 
													<br><br>
                                                    <a onclick="return confirm('Are you sure you want to delete record?')" href="<?php echo base_url().'index.php/admin/deleteRoom/'.$room['Room_Type_ID'];?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="la la-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
										<?php
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div>
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
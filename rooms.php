<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-3">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title line-height-50 text-white"> Enjoy the perfect blent of warm, <br> hospitality, luxury and local flavours.</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
   
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START CARD AREA
================================= -->
<section class="card-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-wrap margin-bottom-40px">
                    <div class="filter-top d-flex align-items-center justify-content-between">
					
                        <div class="section-tab section-tab-3">
                            <ul class="nav nav-tabs" id="myTab4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false">
                                        All
                                    </a>
                                </li>
								<?php
								$getRoomTypes= mysqli_query($con, "SELECT * FROM room_type where Room_Type_Status='ACTIVE';");
								while($row = mysqli_fetch_assoc($getRoomTypes)){
								?>
                                <li class="nav-item">
                                    <a class="nav-link" id="<?php echo $row['Room_Type_Name'];?>-tab" data-toggle="tab" href="#<?php echo $row['Room_Type_Name'];?>" role="tab" aria-controls="<?php echo $row['Room_Type_Name'];?>" aria-selected="false">
                                        <?php echo $row['Room_Type_Name'];?>
                                    </a>
                                </li>
                                <?php
								}
								?>
                            </ul>
                        </div><!-- end section-tab -->
                       
                    </div>
                </div><!-- end filter-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="tab-content" id="may-tabContent4">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="row">
				<?php
					$getRooms= mysqli_query($con, "SELECT * FROM room_type where Room_Type_Status='ACTIVE';");
					while($room = mysqli_fetch_assoc($getRooms)){
								?>
                    <div class="col-lg-6">
                        <div class="card-item room-card">
                            <div class="card-img-carousel carousel-action carousel--action">
							<?php
							$Room_Type_ID = $room['Room_Type_ID'];
							$getImages= mysqli_query($con, "SELECT * FROM room_images where Room_Type_ID=$Room_Type_ID")or die(mysqli_error($con));
								while($images = mysqli_fetch_assoc($getImages)){
									
							?>
                                <div class="card-img">
                                    <a href="room-details.php?Room_Type_ID=<?php echo $Room_Type_ID;?>" class="d-block">
                                        <img src="<?php echo $images['Room_Image'];?>" alt="hotel-img" height="300px">
                                    </a>
                                </div>
                              <?php
							 
								}
								?>
                                
                            </div>
                            <div class="card-body">
                                <div class="card-price pb-2">
                                    <p>
                                        <span class="price__from">From</span>
                                        <span class="price__num"><?php echo "Rs.".number_format($room['Room_Price'], 2);?></span>
                                    </p>
                                </div>
                                <h3 class="card-title font-size-26"><a href="room-details.php"><?php echo $room['Room_Type_Name'];?></a></h3>
                                <p class="card-text pt-2" style="min-height: 200px;max-height: 200px;overflow-y: scroll;"><?php echo $room['Room_Description'];?></p>
                                
                                <div class="card-btn">
                                    <a href="room-details.php?Room_Type_ID=<?php echo $room['Room_Type_ID'];?>" class="theme-btn theme-btn-transparent">Book Now</a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                    </div><!-- end col-lg-6 -->
                    
                    <?php
						}
					?>
                 </div><!-- end row -->
            </div>
          
            
        </div>
        
    </div><!-- end container -->
</section><!-- end card-area -->
<!-- ================================
    END CARD AREA
================================= -->
<?php include 'footer.php'; ?>
</body>
</html>
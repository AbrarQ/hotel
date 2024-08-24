<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>


<?php
$Room_Type_ID = $_GET['Room_Type_ID'];
/* if($Room_Type_ID<=0){
echo "<script>alert('Number of Adults minimum Should be 1')</script>";	
echo "<script>window.location.href = 'rooms.php';</script>";	
} */
$getRooms= mysqli_query($con, "SELECT * FROM room_type where Room_Type_ID=$Room_Type_ID AND Room_Type_Status='ACTIVE'");
if(mysqli_num_rows($getRooms)<=0){
	echo "<script>alert('Selected room is invalid, Please select a valid room')</script>";	
	echo "<script>window.location.href = 'rooms.php';</script>";
}
$room = mysqli_fetch_assoc($getRooms);

			?>
<!-- ================================
    START ROOM DETAIL BREAD
================================= -->
<section class="room-detail-bread">
    <div class="full-width-slider carousel-action">
	<?php
	$getImages= mysqli_query($con, "SELECT * FROM room_images where Room_Type_ID=$Room_Type_ID")or die(mysqli_error($con));
	while($images = mysqli_fetch_assoc($getImages)){
	?>
        <div class="full-width-slide-item">
            <img src="<?php echo $images['Room_Image'];?>" alt="" height="350px">
        </div><!-- end full-width-slide-item -->
   <?php
	}
	?>								
    </div><!-- end full-width-slider -->
</section><!-- end room-detail-bread -->
<!-- ================================
    END ROOM DETAIL BREAD
================================= -->

<!-- ================================
    START TOUR DETAIL AREA
================================= -->
<section class="tour-detail-area padding-bottom-90px">
    <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content-nav" id="single-content-nav">
                        <ul>
                            <li><a data-scroll="description" href="#description" class="scroll-link active">Description</a></li>
                           
                            
                        
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end single-content-navbar-wrap -->
    <div class="single-content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content-wrap padding-top-60px">
                        <div id="description" class="page-scroll">
                            <div class="single-content-item pb-4">
                                <h3 class="title font-size-26"><?php echo$room['Room_Type_Name'];?></h3>
                                
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item padding-top-30px padding-bottom-40px">
                                <h3 class="title font-size-20">Description</h3>
                                <p class="py-3"><?php echo $room['Room_Description'];?></p>
                                
                               
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end description -->
                        <div id="services" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Services</h3>
                                <div class="row pt-4">
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-air-freshener"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Air Conditioning</h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="las la-clock"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">24 Hours Check in & out</h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                               <i class="las la-plug"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Electronic Access </h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                               <i class="las la-bath"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Anti Fungal WC seats</h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                               <i class="la la-hand-holding-usd"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Electronic Safe Lockers</h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                     <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                               <i class="las la-coffee"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Coffee dispenser</h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                     <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                  <i class="la la-wifi"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Free Wifi</h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                     <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                               <i class="las la-glass-martini-alt"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Mini Bar </h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                     <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                               <i class="las la-user-nurse"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Doctor on call</h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                     <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="las la-map-marked"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Travel Assistance</h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                               <i class="las la-car"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Valet Car parking </h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->

                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                              <i class="las la-tshirt"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Laundry service</h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->

                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-bullhorn"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Hair Dryer</h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                              <i class="las la-newspaper"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">News paper</h3>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->

                                </div><!-- end row -->
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end itinerary -->
                        
                       
                        
                    </div><!-- end single-content-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar single-content-sidebar mb-0">
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Your Reservation</h3>
                            <div class="sidebar-widget-item">
                                <div class="contact-form-action">
                                     <form action="cart.php" method="post" class="extraServiceForm" id="extraServiceForm">
									 <input type="hidden" name="Room_Type_ID" value="<?php echo $room['Room_Type_ID'];?>">
                                        
										<div class="input-box">
                                           <label style="color: red">*</label> <label class="label-text">Check-in</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="form-control" type="date" name="From_Date" required >
                                            </div>
                                        </div>
                                        <div class="input-box">
                                            <label style="color: red">*</label><label class="label-text">Check-out</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="form-control" type="date" name="To_Date" required >
                                            </div>
                                        </div>
                                        <div class="input-box">
                                           <label style="color: red">*</label> <label class="label-text">Rooms</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select" name="Number_Of_Rooms" required >
                                                        <option value="">Select Room</option>
                                                        <option value="1" selected>1 Room</option>
                                                        <option value="2">2 Rooms</option>
                                                        <option value="3">3 Rooms</option>
                                                        <option value="4">4 Rooms</option>
                                                        <option value="5">5 Rooms</option>
                                                        <option value="6">6 Rooms</option>
                                                        <option value="7">7 Rooms</option>
                                                        <option value="8">8 Rooms</option>
                                                        <option value="9">9 Rooms</option>
                                                        <option value="10">10 Rooms</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div><!-- end sidebar-widget-item -->
                            <div class="sidebar-widget-item">
                                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                    <label class="font-size-16"><label style="color: red">*</label>Adults <span>Age 18+</span></label>
                                    <div class="qtyBtn d-flex align-items-center">
                                        <div class="qtyDec"><i class="la la-minus"></i></div>
                                        <input type="text" name="Number_of_Adults" value="1">
                                        <div class="qtyInc"><i class="la la-plus"></i></div>
                                    </div>
                                </div><!-- end qty-box -->
                                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                    <label class="font-size-16">Children <span>2-12 years old</span></label>
                                    <div class="qtyBtn d-flex align-items-center">
                                        <div class="qtyDec"><i class="la la-minus"></i></div>
                                        <input type="text" name="Number_of_Childrens" value="0">
                                        <div class="qtyInc"><i class="la la-plus"></i></div>
                                    </div>
                                </div><!-- end qty-box -->
                                
                            </div><!-- end sidebar-widget-item -->
                            <div class="sidebar-widget-item py-4">
                                
                                <div class="extra-service-wrap">
                                   
                                        
                                        <div class="total-price pt-3">
                                            <p class="text-black">Your Price</p>
                                            <p class="d-flex align-items-center"><span class="font-size-22 text-black" style="font-weight: 900;">Rs.<?php echo number_format($room['Room_Price'],2);?></span> <span>/ per room</span></p>
                                        </div><br>
										<input class="btn-box theme-btn text-center w-100 mb-2" type="submit">
										
                                    </form>
                                </div>
                            </div><!-- end sidebar-widget-item -->
                            
                        </div><!-- end sidebar-widget -->
                       
                        <
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->
</section><!-- end tour-detail-area -->
<!-- ================================
    END TOUR DETAIL AREA
================================= -->

<div class="section-block"></div>

<?php include 'footer.php'; ?>
</body>
</html>
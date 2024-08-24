<!DOCTYPE html>
<html lang="en">

<div id="head">
<?php include 'header.php'; ?>
</div>
<style>
	.text-center{
    text-align: center;
}
.ctn-preloader {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    cursor: default;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    height: 100%;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    z-index: 9000;
  }
  
  .ctn-preloader .animation-preloader {
    z-index: 1000;
  }
  
  .ctn-preloader .animation-preloader .spinner {
    -webkit-animation: spinner 1s infinite linear;
    animation: spinner 1s infinite linear;
    border-radius: 50%;
    border: 3px solid rgba(0, 0, 0, 0.2);
    border-top-color: #000000;
    height: 9em;
    margin: 0 auto 3.5em auto;
    width: 9em;
  }
  
  .ctn-preloader .animation-preloader .txt-loading {
    font: bold 5em "Roboto", sans-serif;
    text-align: center;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  
  .ctn-preloader .animation-preloader .txt-loading .letters-loading {
    color: #28285B;
    position: relative;
  }
  
  .ctn-preloader .animation-preloader .txt-loading .letters-loading:before {
    -webkit-animation: letters-loading 4s infinite;
    animation: letters-loading 4s infinite;
    color: #D2AC54;
    content: attr(data-text-preloader);
    left: 0;
    opacity: 0;
    font-family: "Poppins", sans-serif;
    position: absolute;
    top: -3px;
    -webkit-transform: rotateY(-90deg);
    transform: rotateY(-90deg);
  }
  
  .ctn-preloader .animation-preloader .txt-loading .letters-loading:nth-child(2):before {
    -webkit-animation-delay: 0.2s;
    animation-delay: 0.2s;
  }
  
  .ctn-preloader .animation-preloader .txt-loading .letters-loading:nth-child(3):before {
    -webkit-animation-delay: 0.4s;
    animation-delay: 0.4s;
  }
  
  .ctn-preloader .animation-preloader .txt-loading .letters-loading:nth-child(4):before {
    -webkit-animation-delay: 0.6s;
    animation-delay: 0.6s;
  }
  
  .ctn-preloader .animation-preloader .txt-loading .letters-loading:nth-child(5):before {
    -webkit-animation-delay: 0.8s;
    animation-delay: 0.8s;
  }
  
  .ctn-preloader .animation-preloader .txt-loading .letters-loading:nth-child(6):before {
    -webkit-animation-delay: 1s;
    animation-delay: 1s;
  }
  
  .ctn-preloader .animation-preloader .txt-loading .letters-loading:nth-child(7):before {
    -webkit-animation-delay: 1.2s;
    animation-delay: 1.2s;
  }
  
  .ctn-preloader .animation-preloader .txt-loading .letters-loading:nth-child(8):before {
    -webkit-animation-delay: 1.4s;
    animation-delay: 1.4s;
  }
  
  .ctn-preloader.dark .animation-preloader .spinner {
    border-color: rgba(255, 255, 255, 0.2);
    border-top-color: #fff;
  }
  
  .ctn-preloader.dark .animation-preloader .txt-loading .letters-loading {
    color: rgba(255, 255, 255, 0.2);
  }
  
  .ctn-preloader.dark .animation-preloader .txt-loading .letters-loading:before {
    color: #fff;
  }
  
  .ctn-preloader p {
    font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 8px;
    color: #28285B;
  }
  
  .ctn-preloader .loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    font-size: 0;
    z-index: 1;
    pointer-events: none;
  }
  
  .ctn-preloader .loader .row {
    height: 100%;
  }
  
  .ctn-preloader .loader .loader-section {
    padding: 0px;
  }
  
  .ctn-preloader .loader .loader-section .bg {
    background-color: #ffffff;
    height: 100%;
    left: 0;
    width: 100%;
    -webkit-transition: all 30ms cubic-bezier(0.77, 0, 0.175, 1);
    -o-transition: all 30ms cubic-bezier(0.77, 0, 0.175, 1);
    transition: all 30ms cubic-bezier(0.77, 0, 0.175, 1);
  }
  
  .ctn-preloader .loader.dark_bg .loader-section .bg {
    background: #111339;
  }
  
  .ctn-preloader.loaded .animation-preloader {
    opacity: 0;
    -webkit-transition: 0.3s ease-out;
    -o-transition: 0.3s ease-out;
    transition: 0.3s ease-out;
  }
  
  .ctn-preloader.loaded .loader-section .bg {
    width: 0;
    -webkit-transition: 0.7s 0.3s allcubic-bezier(0.1, 0.1, 0.1, 1);
    -o-transition: 0.7s 0.3s allcubic-bezier(0.1, 0.1, 0.1, 1);
    transition: 0.7s 0.3s allcubic-bezier(0.1, 0.1, 0.1, 1);
  }
  
  @-webkit-keyframes spinner {
    to {
      -webkit-transform: rotateZ(360deg);
      transform: rotateZ(360deg);
    }
  }
  
  @keyframes spinner {
    to {
      -webkit-transform: rotateZ(360deg);
      transform: rotateZ(360deg);
    }
  }
  
  @-webkit-keyframes letters-loading {
    0%,
    75%,
    100% {
      opacity: 0;
      -webkit-transform: rotateY(-90deg);
      transform: rotateY(-90deg);
    }
    25%,
    50% {
      opacity: 1;
      -webkit-transform: rotateY(0deg);
      transform: rotateY(0deg);
    }
  }
  
  @keyframes letters-loading {
    0%,
    75%,
    100% {
      opacity: 0;
      -webkit-transform: rotateY(-90deg);
      transform: rotateY(-90deg);
    }
    25%,
    50% {
      opacity: 1;
      -webkit-transform: rotateY(0deg);
      transform: rotateY(0deg);
    }
  }
    </style>
<div id="loader">
<!-- Pre loader-->
<div class="preloaderBg" id="preloader" onload="preloader()">
    <div class="preloader"></div>
    <div class="preloader2"></div>
  </div>
  
  <div id="ctn-preloader" class="ctn-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
             <span data-text-preloader="H" class="letters-loading">
   H
</span>
<span data-text-preloader="O" class="letters-loading">
   O
</span>
<span data-text-preloader="T" class="letters-loading">
   T
</span>
<span data-text-preloader="E" class="letters-loading">
   E
</span>
<span data-text-preloader="L" class="letters-loading">
   L
</span>
<span data-text-preloader="S" class="letters-loading">
   S
</span>
<span data-text-preloader="H" class="letters-loading">
   H
</span>
<span data-text-preloader="R" class="letters-loading">
   R
</span>
<span data-text-preloader="E" class="letters-loading">
   E
</span>
<span data-text-preloader="Y" class="letters-loading">
   Y
</span>
<span data-text-preloader="A" class="letters-loading">
   A
</span>
<span data-text-preloader="S" class="letters-loading">
   S
</span>
<span data-text-preloader="G" class="letters-loading">
   G
</span>
<span data-text-preloader="R" class="letters-loading">
   R
</span>
<span data-text-preloader="A" class="letters-loading">
   A
</span>
<span data-text-preloader="N" class="letters-loading">
   N
</span>
<span data-text-preloader="D" class="letters-loading">
   D
</span>

                
            </div>
          
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================================
    START HERO-WRAPPER AREA
================================= -->
<div id="main">
<section class="hero-wrapper hero-wrapper2">
    <div class="hero-box pb-0">
        <div id="fullscreen-slide-contain">
            <ul class="slides-container">
                <li><img src="images/slider/slider1.jpg" alt=""></li>
                <li><img src="images/slider/slider2.jpg" alt=""></li>
                <li><img src="images/slider/slider3.jpg" alt=""></li>
                  <li><img src="images/slider/slider4.jpg" alt=""></li>
            </ul>
        </div><!-- End background slider -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-content pb-5">
                        <div class="section-heading">
                            <p class="sec__desc pb-2">For the most exotic experience and the best value</p>

                            <h2 class="sec__title">Make your bookings with us</h2>

                        </div>
                    </div><!-- end hero-content -->
                    <div class="search-fields-container">
                        <div class="contact-form-action">
                            <form action="cart.php" method="post" class="row" id="extraServiceForm">
                              
                                <div class="col-lg-3 pr-0">
                                    <div class="input-box">
                                           <label style="color: red">*</label> <label class="label-text">Check-in</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="form-control" type="date" name="From_Date" required >
                                            </div>
                                        </div>
									
                                </div><!-- end col-lg-3 -->
                                <div class="col-lg-3 pr-0">
                                    <div class="input-box">
                                           <label style="color: red">*</label> <label class="label-text">Check-out</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="form-control" type="date" name="To_Date" required >
                                            </div>
                                        </div>
									
                                </div><!-- end col-lg-3 -->
                                <div class="col-lg-3 pr-0">
                                    <div class="input-box">
                                        <label style="color: red">*</label><label class="label-text">Room Type</label>
                                        <div class="form-group">
                                            <div class="select-contain select-contain-shadow w-auto">
                                                <select class="select-contain-select" name="Room_Type_ID" required >
												
                                                    <option value="">Select Type</option>
													<?php
											$getRoomTypes= mysqli_query($con, "SELECT * FROM room_type where Room_Type_Status='ACTIVE';");
											while($row = mysqli_fetch_assoc($getRoomTypes)){
											?>
                                                    <option value="<?php echo $row['Room_Type_ID'];?>"><?php echo $row['Room_Type_Name'];?></option>
                                            <?php
											}
											?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-3 -->
                                <div class="col-lg-3">
                                    <div class="input-box">
                                        <label class="label-text">Guests</label>
                                        <div class="form-group">
                                            <div class="dropdown dropdown-contain gty-container">
                                                <a class="dropdown-toggle dropdown-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="adult" data-text="Adult" data-text-multi="Adults">0 Adult</span>
                                                    -
                                                    <span class="children" data-text="Child" data-text-multi="Children">0 Children</span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-wrap">
                                                    <div class="dropdown-item">
                                                        <div class="qty-box d-flex align-items-center justify-content-between">
                                                            <label>Rooms</label>
                                                            <div class="qtyBtn d-flex align-items-center">
                                                                <div class="qtyDec"><i class="la la-minus"></i></div>
                                                                <input type="text" name="Number_Of_Rooms" value="1" class="qty-input">
                                                                <div class="qtyInc"><i class="la la-plus"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="qty-box d-flex align-items-center justify-content-between">
                                                            <label>Adults</label>
                                                            <div class="qtyBtn d-flex align-items-center">
                                                                <div class="qtyDec"><i class="la la-minus"></i></div>
                                                                <input type="text" name="Number_of_Adults" value="0">
                                                                <div class="qtyInc"><i class="la la-plus"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="qty-box d-flex align-items-center justify-content-between">
                                                            <label>Children</label>
                                                            <div class="qtyBtn d-flex align-items-center">
                                                                <div class="qtyDec"><i class="la la-minus"></i></div>
                                                                <input type="text" name="Number_of_Childrens" value="0">
                                                                <div class="qtyInc"><i class="la la-plus"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end dropdown -->
                                        </div>
                                    </div>
                                </div><!-- end col-lg-3 -->
                           
                            <div class="btn-box pt-2">
                                
								 <input class="btn-box theme-btn text-center" type="submit" value="Book Now">
                            </div>
							 </form>
                        </div>
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
</section><!-- end hero-wrapper -->
<!-- ================================
    END HERO-WRAPPER AREA
================================= -->

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area info-bg info-area2 padding-top-80px padding-bottom-45px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 responsive-column">
                <div class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb text-color-2">
                       <i class="las la-hotel"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Unique Atmosphere</h4>
                        <p class="info__desc">
                           Experience world class ambience in your city 
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-3 -->
             <div class="col-lg-3 responsive-column">
                <div class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb-2 text-color-3">
                       <i class="las la-concierge-bell"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Nourishment</h4>
                        <p class="info__desc">
                            Make your taste buds happy like never before
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb-3 text-color-4">
                        <i class="las la-map-marked-alt"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Great Location</h4>
                        <p class="info__desc">
                            Imbibe natural authenticity of location
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb-4 text-color-5">
                        <i class="las la-bed"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Homey Comfort</h4>
                        <p class="info__desc">
                            Away from home? Feel at home away from home
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end info-area -->
<!-- ================================
    END INFO AREA
================================= -->

<!-- ================================
    START ABOUT AREA
================================= -->
<section class="about-area section--padding overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content pr-5">
                    <div class="section-heading">
                        
                        <h2 class="sec__title">Alexander Luxury Hotel</h2>
                        <p class="sec__desc pt-4 pb-2">With ‘Namaste’ as the enduring symbol of our culture, We invite you to sense the distinction,  luxury experience, harmony with the environment and society.</p>
                       
                        <p class="sec__desc">The Alexander Luxury Hotel is on a continuous journey to ravish the guests by providing unparalleled luxury with Indian hospitality culture.</p>
                     
                         <p class="sec__desc pt-4 pb-2">It’s the best place to accommodate family and corporate guests with well-furnished rooms, banquet halls, and multi varieties of restaurant cuisines and a group of catering events will be accomplished at one and only place in Anantapur..</p>
                    </div><!-- end section-heading -->
                    <div class="btn-box pt-4">
                        <a href="about.php" class="theme-btn">Read More <i class="la la-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="image-box about-img-box">
                    <img src="images/slider/home1.jpg" alt="about-img" class="img__item img__item-1">
                   
                </div>
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- ================================
    END ABOUT AREA
================================= -->

<section class="card-area">
    <div class="container">
       <center><h1>Our Rooms</h1></center><br>
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
                                        <span class="price__num"><?php echo "Rs.".number_format($room['Single_Person_Charge'], 2);?></span>
                                    </p>
                                </div>
                                <h3 class="card-title font-size-26"><a href="room-details.php"><?php echo $room['Room_Type_Name'];?></a></h3>
                                <p class="card-text pt-2" style="min-height: 200px;max-height: 200px;overflow-y: scroll;color:#f6da86"><?php echo $room['Room_Description'];?></p>
                                
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
</section><br><br><br><br><br>


<!-- ================================
    START HOTEL AREA
================================= -->

<!-- ================================
    END HOTEL AREA
================================= -->

<!-- ================================
    START DISCOUNT AREA
================================= 
<section class="discount-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="discount-box">
                    <div class="discount-img">
                        <img src="images/discount-hotel-img.jpg" alt="discount img">
                    </div><!-- end discount-img 
                    <div class="discount-content">
                        <div class="section-heading">
                            <p class="sec__desc text-white">Hot deal, save 50%</p>
                            <h2 class="sec__title mb-0 line-height-50 text-white">Discount 50% for the <br> First Booking</h2>
                        </div><!-- end section-heading 
                        <div class="btn-box pt-4">
                            <a href="#" class="theme-btn border-0">Learn More <i class="la la-arrow-right ml-1"></i></a>
                        </div>
                    </div><!-- end discount-content
                    <div class="company-logo">
                        <img src="images/logo2.png" alt="">
                        <p class="text-white font-size-14 text-right">*Terms applied</p>
                    </div><!-- end company-logo 
                </div>
            </div><!-- end col-lg-12
        </div><!-- end row 
    </div><!-- end container 
</section><!-- end discount-area -->
<!-- ================================
    END DISCOUNT AREA
================================= -->

<!-- ================================
       START TESTIMONIAL AREA
================================= -->
<!--<section class="testimonial-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center mb-0">
                    <h2 class="sec__title line-height-50">What Our Customers <br> are Saying Us?</h2>
                </div><!-- end section-heading -->
        <!--    </div><!-- end col-lg-12 -->
        <!--</div> 
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="testimonial-carousel carousel-action">
                    <div class="testimonial-card">
                        <div class="testi-desc-box">
                            <p class="testi__desc">Excepteur sint occaecat cupidatat non proident sunt in culpa officia deserunt mollit anim laborum sint occaecat cupidatat non proident. Occaecat cupidatat non proident des.</p>
                        </div>
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="images/team8.jpg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <h4 class="author__title">Leroy Bell</h4>
                                <span class="author__meta">United States</span>
                                <span class="ratings d-flex align-items-center">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end testimonial-card
                    <div class="testimonial-card">
                        <div class="testi-desc-box">
                            <p class="testi__desc">Excepteur sint occaecat cupidatat non proident sunt in culpa officia deserunt mollit anim laborum sint occaecat cupidatat non proident. Occaecat cupidatat non proident des.</p>
                        </div>
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="images/team9.jpg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <h4 class="author__title">Richard Pam</h4>
                                <span class="author__meta">Canada</span>
                                <span class="ratings d-flex align-items-center">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end testimonial-card 
                    <div class="testimonial-card">
                        <div class="testi-desc-box">
                            <p class="testi__desc">Excepteur sint occaecat cupidatat non proident sunt in culpa officia deserunt mollit anim laborum sint occaecat cupidatat non proident. Occaecat cupidatat non proident des.</p>
                        </div>
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="images/team10.jpg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <h4 class="author__title">Luke Jacobs</h4>
                                <span class="author__meta">Australia</span>
                                <span class="ratings d-flex align-items-center">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end testimonial-card ->
                    <div class="testimonial-card">
                        <div class="testi-desc-box">
                            <p class="testi__desc">Excepteur sint occaecat cupidatat non proident sunt in culpa officia deserunt mollit anim laborum sint occaecat cupidatat non proident. Occaecat cupidatat non proident des.</p>
                        </div>
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="images/team8.jpg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <h4 class="author__title">Chulbul Panday</h4>
                                <span class="author__meta">Italy</span>
                                <span class="ratings d-flex align-items-center">
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                    <i class="la la-star"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end testimonial-card --
                </div><!-- end testimonial-carousel ->
            </div><!-- end col-lg-12 --
        </div><!-- end row --
    </div><!-- end container->
</section><!-- end testimonial-area -->
<!-- ================================
       START TESTIMONIAL AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
       START BLOG AREA
================================= 
<section class="blog-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Recent Articles</h2>
                </div><!-- end section-heading ->
            </div><!-- end col-lg-12 --
        </div><!-- end row --
        <div class="row padding-top-50px">
            <div class="col-lg-4 responsive-column">
                <div class="card-item blog-card">
                    <div class="card-img">
                        <img src="images/img5.jpg" alt="blog-img">
                        <div class="post-format icon-element">
                            <i class="la la-photo"></i>
                        </div>
                        <div class="card-body">
                            <div class="post-categories">
                                <a href="#" class="badge">Travel</a>
                                <a href="#" class="badge">lifestyle</a>
                            </div>
                            <h3 class="card-title line-height-26"><a href="blog-single.html">Best Scandinavian Accommodation – Treat Yourself</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 January, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">5 Mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="images/small-team1.jpg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <a href="#" class="author__title">Leroy Bell</a>
                            </div>
                        </div>
                        <div class="post-share">
                            <ul>
                                <li>
                                    <i class="la la-share icon-element"></i>
                                    <ul class="post-share-dropdown d-flex align-items-center">
                                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                        <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end card-item --
            </div><!-- end col-lg-4 --
            <div class="col-lg-4 responsive-column">
                <div class="card-item blog-card">
                    <div class="card-img">
                        <img src="images/img6.jpg" alt="blog-img">
                        <div class="post-format icon-element">
                            <i class="la la-play"></i>
                        </div>
                        <div class="card-body">
                            <div class="post-categories">
                                <a href="#" class="badge">Video</a>
                            </div>
                            <h3 class="card-title line-height-26"><a href="blog-single.html">Amazing Places to Stay in Norway</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 February, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">4 Mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="images/small-team2.jpg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <a href="#" class="author__title">Phillip Hunt</a>
                            </div>
                        </div>
                        <div class="post-share">
                            <ul>
                                <li>
                                    <i class="la la-share icon-element"></i>
                                    <ul class="post-share-dropdown d-flex align-items-center">
                                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                        <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end card-item --
            </div><!-- end col-lg-4 --
            <div class="col-lg-4 responsive-column">
                <div class="card-item blog-card">
                    <div class="card-img">
                        <img src="images/img7.jpg" alt="blog-img">
                        <div class="post-format icon-element">
                            <i class="la la-music"></i>
                        </div>
                        <div class="card-body">
                            <div class="post-categories">
                                <a href="#" class="badge">audio</a>
                            </div>
                            <h3 class="card-title line-height-26"><a href="blog-single.html">Feel Like Home on Your Business Trip</a></h3>
                            <p class="card-meta">
                                <span class="post__date"> 1 March, 2020</span>
                                <span class="post-dot"></span>
                                <span class="post__time">3 Mins read</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div class="author-content d-flex align-items-center">
                            <div class="author-img">
                                <img src="images/small-team3.jpg" alt="testimonial image">
                            </div>
                            <div class="author-bio">
                                <a href="#" class="author__title">Luke Jacobs</a>
                            </div>
                        </div>
                        <div class="post-share">
                            <ul>
                                <li>
                                    <i class="la la-share icon-element"></i>
                                    <ul class="post-share-dropdown d-flex align-items-center">
                                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                        <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end card-item -->
            <!-- end col-lg-4 ->
        </div><!-- end row ->
    </div><!-- end containe->
</section><!-- end blog-area -->
<!-- ================================
       START BLOG AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= 
<section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-heading">
                    <p class="sec__desc text-white-50 pb-1">Newsletter Sign up</p>
                    <h2 class="sec__title font-size-30 text-white">Subscribe to Get Special Offers</h2>
                </div><!-- end section-heading --
            </div><!-- end col-lg-7 --
            <div class="col-lg-5">
                <div class="subscriber-box">
                    <div class="contact-form-action">
                        <form action="#">
                            <div class="input-box">
                                <label class="label-text text-white">Enter email address</label>
                                <div class="form-group mb-0">
                                    <span class="la la-envelope form-icon"></span>
                                    <input class="form-control" type="email" name="email" placeholder="Email address">
                                    <button class="theme-btn theme-btn-small submit-btn" type="submit">Subscribe</button>
                                    <span class="font-size-14 pt-1 text-white-50"><i class="la la-lock mr-1"></i>Don't worry your information is safe with us.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end section-heading -->
            <!-- end col-lg-5 --
        </div><!-- end row --
    </div><!-- end container ->
</section><!-- end cta-area ->
<!-- ================================
    END CTA AREA
================================= -->

<!-- ================================
       START CLIENTLOGO AREA
================================= -->
<section class="clientlogo-area padding-top-80px padding-bottom-80px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="client-logo">
                    
                    <div class="client-logo-item">
                        <img src="images/partnerlogo/goibibo-logo.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="images/partnerlogo/makemytrip_logo.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="images/partnerlogo/Travelguru_Logo.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="images/partnerlogo/Yatra_company_logo.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                    <div class="client-logo-item">
                        <img src="images/partnerlogo/booking.png" alt="brand image">
                    </div><!-- end client-logo-item -->
                </div><!-- end client-logo -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end clientlogo-area -->
<!-- ================================
       START CLIENTLOGO AREA
================================= -->

<?php include 'footer.php'; ?>
</div>
<script>
$(document).ready(function() {
    $("#head").hide();
    $("#main").hide();
    timer = setTimeout(function () {
        $("#loader").hide();
		$("#head").show();
        $("#main").show();
      }, 5000);
    
  });
</script>
</body>
</html>
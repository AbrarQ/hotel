
<!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area section-bg padding-top-40px padding-bottom-30px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="term-box footer-item">
                    <ul class="list-items list--items d-flex align-items-center">
                        <li><a href="terms_condition.php">Terms & Conditions</a></li>
                       
                    </ul>
                </div>
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="footer-social-box text-right">
                    <ul class="social-profile">
                        <li><a href="https://www.facebook.com/Alexander-Luxury-Hotel-105648288496533" target="_blank"><i class="lab la-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/alexanderluxuryhotel/" target="_blank"><i class="lab la-twitter"></i></a></li>
                        <li><a href="https://twitter.com/LuxAlexandar" target="_blank"><i class="lab la-instagram"></i></a></li>
                        <li><a href="youtube.com/channel/UChmmUOhUvv8poU1ZUec7ZhA" target="_blank"><i class="lab la-youtube"></i></a></li>
                    </ul>
                </div>
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div>
    <div class="section-block mt-4 mb-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <div class="footer-logo padding-bottom-30px">
                        <a href="index.html" class="foot__logo"><img src="images/logof.png" alt="logo"></a>
                    </div><!-- end logo -->
                    <p class="footer__desc">Alexander Luxury Hotel</p>
                    <ul class="list-items pt-3">
                        <li>#11-120, Opp: Muncipal Corp,Sapthagiri Circle,Ananthapur – 515001.</li>
                         <li>
                                       
                                        <p class="map__desc">Telephone: 08554  220 201 /202/ 203</p>
                                        <p class="map__desc">Mobile: +91 79950  26009</p>
                                    </li>
                        <li><a href="#">info@alexanderluxuryhotel.com</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Alexander Luxury Hotel</h4>
                    <ul class="list-items list--items">
                        <li><a href="about.php">About us</a></li>
                        <li><a href="rooms.php">Rooms</a></li>
                        <li><a href="banquet.php">Banquet</a></li>
                        <li><a href="dining.phpl">Dining</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Room Links</h4>
                    <ul class="list-items list--items">
					<?php
											$getRoomTypes= mysqli_query($con, "SELECT * FROM room_type;");
											while($row = mysqli_fetch_assoc($getRoomTypes)){
											?>
                        <li><a href="room-details.php?Room_Type_ID=<?php echo $row['Room_Type_ID'];?>"><?php echo $row['Room_Type_Name'];?></a></li>
					<?php
					}
					?>
                        
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Payment Methods</h4>
                    <p class="footer__desc pb-3">Pay any way you choose, we support all payment options.</p>
                    <img src="images/payment-img.png" alt="">
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->

        <div class="section-block"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="copy-right padding-top-30px text-center">
                    <p class="copy__desc">
                        &copy; Copyright Alexander Luxury Hotel 2021. Developed by
                        <span class="la la-heart"></span> by <a href="#">MKtransformations</a>
                    </p>
                </div><!-- end copy-right -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->




<!-- Template JS Files -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/jquery.countTo.min.js"></script>
<script src="js/animated-headline.js"></script>
<script src="js/jquery.ripples-min.js"></script>
<script src="js/quantity-input.js"></script>
<script src="js/jquery.superslides.min.js"></script>
<script src="js/superslider-script.js"></script>
<script src="js/main.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60fb97f5649e0a0a5ccdb308/1fbbcj8g9';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

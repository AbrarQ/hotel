<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'; ?>

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-10">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content text-center">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Cart</h2>
                        </div>
                        <span class="arrow-blink">
                            <i class="la la-arrow-down"></i>
                        </span>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START CART AREA
================================= -->
<section class="cart-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-wrap">
                    <div class="table-form table-responsive mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Details</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <!--<th scope="col">Action</th>-->
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
							<?php
							
							$Room_Type_ID = $_POST['Room_Type_ID'];
							if(is_numeric($_POST['Room_Type_ID'])){
								
							}else{
								echo "<script>alert('Invalid room selected, please select again')</script>";
								echo "<script>window.location.href = 'rooms.php';</script>";
								
							}
							$From_Date = $_POST['From_Date'];
							$To_Date = $_POST['To_Date'];
							if($From_Date<date('Y-m-d')){
							echo "<script>alert('Check-in or check-out date should not previous dates')</script>";	
							echo "<script>window.location.href = 'index.php';</script>";	
							}
							
							$Number_Of_Rooms = $_POST['Number_Of_Rooms'];
							$Number_of_Adults = $_POST['Number_of_Adults'];
							$Number_of_Childrens = $_POST['Number_of_Childrens'];
							$getRooms= mysqli_query($con, "SELECT * FROM room_type where Room_Type_ID=$Room_Type_ID");
							$room = mysqli_fetch_assoc($getRooms);
							//print_r($room);
							?>
                                <th scope="row">
                                    <div class="table-content product-content d-flex align-items-center">
                                        <a href="#" class="d-block">
                                            <!--<img src="images/small-img12.jpg" alt="" class="flex-shrink-0">-->
                                        </a>
                                       <div class="product-content">
                                           <a href="#" class="title"><?php echo $room['Room_Type_Name'];?></a>
                                           <div class="product-info-wrap">
                                               <div class="product-info line-height-24">
                                                   <span class="product-info-label">Reservation:</span>
                                                       <span class="product-info-value">
                                                       <span class="product-check-in"><?php echo date('M d, Y', strtotime($From_Date));?></span>
                                                       <span class="product-mark">/</span>
                                                       <span class="product-check-out"><?php echo date('M d, Y', strtotime($To_Date));?></span>
                                                       <span class="product-nights">
													   <?php
													$startTimeStamp = date("Y/m/d", strtotime($From_Date));
                                                    $endTimeStamp =  date("Y/m/d", strtotime($To_Date));
                                                    $startTimeStamp = strtotime("$startTimeStamp");
                                                    $endTimeStamp = strtotime("$endTimeStamp");
                                                    $timeDiff = ($endTimeStamp - $startTimeStamp);
                                                    
                                                    $numberDays = $timeDiff/86400; 
                                                    
                                                    $numberDays = intval($numberDays);
													if($numberDays==0){
														$numberDays = 1;
													}
													if($numberDays<0){
													echo "<script>alert('Check-out date should not less than the check-in date')</script>";	
													echo "<script>window.location.href = 'index.php';</script>";	
													}
													if($Number_Of_Rooms<=0){
													echo "<script>alert('Number of Rooms minimum Should be 1')</script>";	
													echo "<script>window.location.href = 'index.php';</script>";	
													}
													if($Number_of_Adults<=0){
													echo "<script>alert('Number of Adults minimum Should be 1')</script>";	
													echo "<script>window.location.href = 'index.php';</script>";	
													}
													   ?>
													   (<?php echo $numberDays;?> day)</span>
                                                    </span>
                                               </div><!-- end product-info -->
                                               <div class="product-info line-height-24">
                                                   <span class="product-info-label">Guests:</span>
                                                   <span class="product-info-value"><?php echo $Number_of_Adults;?> Adults, <?php echo $Number_of_Childrens;?>  Childrens</span>
                                                   
                                               </div><!-- end product-info -->
                                               <!--<div class="product-info line-height-24">
                                                   <span class="product-info-label">Extra Services:</span>
                                                   <span class="product-info-value">cleaning-fee, airport-pickup, breakfast, parking</span>
                                               </div>--><!-- end product-info -->
                                           </div>
                                       </div>
                                    </div>
                                </th>
                                <td><?php echo "Rs.".number_format($room['Room_Price'],2);?></td>
                                <td>
                                    <div class="product-info">
                                        <input type="text" class="form-control" value="<?php echo $Number_Of_Rooms;?>" readonly>
                                    </div>
                                </td>
                                <td><?php 
								$subTotal = ($room['Room_Price']*$Number_Of_Rooms);
								echo "Rs.".number_format($subTotal,2);?></td>
                                <!--<td>
                                    <div class="remove-wrap">
                                        <a href="javascript:void(0)" class="btn font-size-18"><i class="la la-times"></i></a>
                                    </div>
                                </td>-->
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="section-block"></div>
                   <!-- <div class="cart-actions d-flex justify-content-between align-items-center pt-4 pb-5">
                        <div class="contact-form-action">
                            <form method="post" class="d-flex align-items-center">
                                <div class="form-group mb-0 mr-3">
                                    <input class="form-control pl-3" type="text" name="text" placeholder="Coupon code">
                                </div>
                                <button type="button" class="theme-btn">Apply Code</button>
                            </form>
                        </div>
                        <div class="btn-box">
                            <a href="#" class="theme-btn">Update Cart</a>
                        </div>
                    </div>-->
					<br>
                    <div class="row">
                        <div class="col-lg-6 ml-auto">
						<form action="message.php" method="post" class="extraServiceForm" id="extraServiceForm">
						<div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label style="color: red">*</label><label class="label-text">First Name</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="First_Name" placeholder="First name" required >
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Last Name</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="Last_Name" placeholder="Last name">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label style="color: red">*</label><label class="label-text">Your Email</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control" type="email" name="Email" placeholder="Email address" required >
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label style="color: red">*</label><label class="label-text">Phone Number</label>
                                            <div class="form-group">
                                                <span class="la la-phone form-icon"></span>
                                                <input class="form-control" type="text" name="Mobile" placeholder="Phone Number" required >
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Address Line</label>
                                            <div class="form-group">
                                                <span class="la la-map-marked form-icon"></span>
                                                <input class="form-control" type="text" name="Address" placeholder="Address line">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Country</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select" name="Country">
                                                        <option value="select-country">Select country</option>
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Åland Islands">Åland Islands</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antarctica">Antarctica</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                        <option value="Croatia">Croatia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Territories">French Southern Territories</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guernsey">Guernsey</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Isle of Man">Isle of Man</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jersey">Jersey</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macao">Macao</option>
                                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montenegro">Montenegro</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Namibia">Namibia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherlands">Netherlands</option>
                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pitcairn">Pitcairn</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russian Federation">Russian Federation</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Saint Helena">Saint Helena</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Serbia">Serbia</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Slovakia">Slovakia</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Timor-leste">Timor-leste</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States">United States</option>
                                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Viet Nam">Viet Nam</option>
                                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                        <option value="Western Sahara">Western Sahara</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    
                                    
                                </div>
						
						</div>
                        <div class="col-lg-4 ml-auto">
                            <div class="cart-totals table-form">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-content">
                                                    <h3 class="title">Subtotal</h3>
                                                </div>
                                            </th>
                                            <td><?php echo "Rs.".number_format($subTotal,2);?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-content">
                                                    <h3 class="title">Extra Beds</h3>
                                                </div>
                                            </th>
                                            <td><?php 
											$e = $Number_of_Adults - $room['Number_of_Adults'];
											if($e<0){
												$e = 0;
											}
											$Extra_Beds = ($e*$numberDays)*600;
											$subTotal += $Extra_Beds;
											
											echo "Rs.".number_format($Extra_Beds,2);?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-content">
                                                    <h3 class="title">GST(12%)</h3>
                                                </div>
                                            </th>
                                            <td><?php 
											$GST = (12/100)*$subTotal;
											echo "Rs.".number_format($GST,2);?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-content">
                                                    <h3>Total</h3>
                                                </div>
                                            </th>
                                            <td>
											<h3><?php echo "Rs.".number_format(($subTotal+$GST),2);?></h3></td>
                                        </tr>
                                    </tbody>
                                </table><br>
                                <div class="section-block"></div><br><br>
                                <input type="hidden" name="Number_of_Adults" value="<?php echo $Number_of_Adults;?>">
								
                                <input type="hidden" name="Room_Type_ID" value="<?php echo $Room_Type_ID;?>">
								
                                <input type="hidden" name="Room_Price" value="<?php echo $room['Room_Price'];?>">
								
                                <input type="hidden" name="GST" value="<?php echo $GST;?>">
								
                                <input type="hidden" name="Number_Of_Rooms" value="<?php echo $Number_Of_Rooms;?>">
								
                                <input type="hidden" name="Number_of_Adults" value="<?php echo $Number_of_Adults;?>">
								
                                <input type="hidden" name="Number_of_Childrens" value="<?php echo $Number_of_Childrens;?>">
								
                                <input type="hidden" name="Sub_Total" value="<?php echo $subTotal;?>">
								
                                <input type="hidden" name="Total" value="<?php echo $subTotal+$GST;?>">
								
                                <input type="hidden" name="From_Date" value="<?php echo $From_Date;?>">
								
                                <input type="hidden" name="To_Date" value="<?php echo $To_Date;?>">
								
                                            <div class="col-lg-12">
											<input type="submit" class="btn-box theme-btn" name="Submit" value="&emsp;&emsp;&emsp;Book Now&emsp;&emsp;&emsp;">
                                                
                                                   
                                                </div>
                                            </div><!-- end col-lg-12 -->
											</form>
                            </div>
                        </div>
                    </div>
                </div><!-- end cart-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cart-area -->
<!-- ================================
    END CART AREA
================================= -->

<?php include 'footer.php'; ?>
</body>
</html>
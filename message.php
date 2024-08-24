<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
  <div class="container">
  <br><br><br><br><br><br><br>
      <div class="row align-items-center">
<?php
if(isset($_POST['Submit']) AND isset($_POST['Room_Type_ID'])){
	date_default_timezone_set('Asia/Calcutta');
	$Booking_Date = date("Y-m-d H:i:s");
	$Room_Type_ID = $_POST['Room_Type_ID'];
	$From_Date = $_POST['From_Date'];
	$To_Date = $_POST['To_Date'];
	$First_Name = $_POST['First_Name'];
	$Last_Name = $_POST['Last_Name'];
	$Mobile = $_POST['Mobile'];
	$Email = $_POST['Email'];
	$Address = $_POST['Address'];
	$Number_of_Adults = $_POST['Number_of_Adults'];
	$Number_of_Childrens = $_POST['Number_of_Childrens'];
	$Room_Price = $_POST['Room_Price'];
	$GST = $_POST['GST'];
	$Number_Of_Rooms = $_POST['Number_Of_Rooms'];
	$Country = $_POST['Country'];
	$Sub_Total = $_POST['Sub_Total'];
	$Total = $_POST['Total'];
	$Booking_Status = "PENDING";
	
	$query = mysqli_query($con, "INSERT INTO `booking` (`Booking_Date`, `From_Date`, `To_Date`, `First_Name`, `Last_Name`, `Mobile`, `Email`, `Address`, `Number_of_Adults`, `Number_of_Childrens`, `Room_Type_ID`, `Room_Price`, `GST`, `Number_Of_Rooms`, `Booking_Status`, `Country`, `Sub_Total`, `Total`) VALUES ('$Booking_Date', '$From_Date', '$To_Date', '$First_Name', '$Last_Name', '$Mobile', '$Email', '$Address', '$Number_of_Adults', '$Number_of_Childrens', '$Room_Type_ID', '$Room_Price', '$GST', '$Number_Of_Rooms', '$Booking_Status', '$Country', '$Sub_Total', '$Total');");
	$Booking_ID = mysqli_insert_id($con);
	if($Booking_ID>0){
		$_SESSION['Name'] = $First_Name." ".$Last_Name;
		$_SESSION['Booking_ID'] = $Booking_ID;
	?>
	<h2>Thanks for choosing Alexander Luxury Hotel, You will get email notification when your booking is confirmed.  </h2>
	<?php
	
		$email = "Khalid.qurashi36@gmail.com";
		$message = "Dear Admin,<br><br>";
		$message .= "Please loign to see new Booking Details. Booking ID: ALEX_".$_SESSION['Booking_ID'];
				
				
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'http://sreevishnugroups.com/mail.php',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => array('from' => 'Alex@gmail.com','to' => "$email",'subject' => 'New Booking','message' => "$message"),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	//echo $response;
	header("Location: index.php");
	
	}else{
	?>
	<h1>Oops..! Something went wrong, Please try again.</h1>
	
	<?php	
	}
}else{
	?>
	<h1>Oops..! Something went wrong, Please try again.</h1>
	<!--<h1>Thank you Mr Sreenivas. Your Booking Confirmation Id is : 1024 </h1>-->
	<?php
}

?>

</div>
<br><br><br>
</div>



<?php include 'footer.php'; ?>
</body>
</html>
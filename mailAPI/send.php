<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'balambikagroup@gmail.com';
$mail->Password = 'guvyyaqkjnwnxmqi';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom("balambikagroup@gmail.com");
$mail->addAddress("jainabhishek1925@gmail.com");
$mail->isHTML(true);
$mail->Subject = "from Balambika Motors...Regarding Car Bike Servicing Appointment";
$mail->Body = "
<html>
<head>
<title> Thank You for Choosing Balambika Motors </title>
</head>
<style>
	#head{
		padding:20px;
		height:85px;
		width:80%;
		border:4px solid black;
		background-color:pink;
		text-align:center;
		font-size:30px;
	}
	#content{
		width:83%;
		border:4px solid gray;
		border-radius:15px;
		background-color:#ffffb3;
		height:430px;
		margin-top:7px;
	}
</style>
<body style='background-color:pink; padding:20px;'>
<center>
	<div class='container'>
		<h3 id='head'> <h2 id='name'>Thank You For Choosing Balambika Motors...!!</h2>
		We are glad to Serve you the Best...!! </h3>
		<p>-------------------------------------------</p>
		<div id='content'>
			<p>Kindly, Note The Following Details of Your Bike Servicing </p>
			<p> Name : <b> Mr.Abhishek Jain </b></p>
			<p> Vehicle No : <b> MH-16-CC-1925 </b></p>
			<p> Vehicle Type : <b> CAR </b></p>
			<p> Time Slot : <b> 10AM - 12PM </b></p>
			
			<p>-------------------------------------------</p>
			<p><b>Note :</b> We'll Deliver Your Vehicle Within 2 Hours from Given Time Slot.</p>
			<p>-------------------------------------------</p>
			
			
			<div id='msg'>
				<h3>Thanks and Regards,</h3>
				<h3 style='color:brown';>Mr.Abhishek Sachin Jain (Chairman,Balambika Group) </h3>
				<h2 style='color:#660000;'>Balambika Motors Pvt.Ltd.</h2>
				<h4 style='color:#330000;'>AP-Bodhegaon,Tal-Shevgaon,Dist-Ahmednagar-414504.<h4>			
			</div>
		</div>
	</div>
</center>
</body>
</html>
";

$mail->send();
?>
<script>
alert("Kindly Check Your Mail for Details...!!");
</script>
<?php
?>
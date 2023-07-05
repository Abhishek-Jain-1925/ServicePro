<?php 
session_start();
//For sending Mail
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception; 

	require 'mailAPI/src/Exception.php';
	require 'mailAPI/src/PHPMailer.php';
	require 'mailAPI/src/SMTP.php';

$host = "localhost";
$server = "localhost";
$username = "root";
$password ="";
$dbname = "showroom";

$cid = $_SESSION['cid'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$mob =  $_SESSION['mob'];
$addr =  $_SESSION['addr'];
$vehNo =  $_SESSION['vehNo'];
$vehType = $_SESSION['vehType'];
$vehName = $_POST['vehName'];
$timeSlot = $_POST['timeSlot'];
$serviceType = $_POST['op'];
$date = $_POST['date'];

$flag = 0;

try{
    $connect=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    }
    catch(PDOException $e)
    {
        echo "Connection Failed: ".$e->getMessage();
        die();
    }
    $s ="select * from customer";
    foreach($connect->query($s) as $r)
    {
        if($r['cid']==$cid && $r['cname']==$name && $r['mob']==$mob)
        {
            $c_id =$Fc_id=$ap_id =$Fc_id1 =0;


$conn = mysqli_connect($server, $username, $password, $dbname);
    
    $b = "select * from appointment";
    
    $result1 = mysqli_query($conn,$b);
    if($result1)
    {
        $row1 = mysqli_num_rows($result1);
        if($row1)
        {
            $ap_id = $row1;
        }
    }

    $Fc_id1 = $ap_id + 1;

    $query2 =  "insert into appointment values($Fc_id1,$cid,'$vehNo','$vehType','$vehName','$timeSlot','$serviceType','$date','Not Completed')";

   $run1 = mysqli_query($conn,$query2) or die(mysqli_error());


	//For sending Mail
		$mail = new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'balambikagroup@gmail.com';
		$mail->Password = 'guvyyaqkjnwnxmqi';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;

		$mail->setFrom("balambikagroup@gmail.com");
		$mail->addAddress(''.$email.'');
		$mail->isHTML(true);
		$mail->Subject = "from Balambika Motors...Regarding Car Bike Servicing Appointment";
		$mail->Body = "
		<html>
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
					<p> Customer ID : <b> ".$cid." </b></p>
					<p> Appointment ID : <b> ".$Fc_id1." </b></p>
					<p> Name : <b> ".$name." </b></p>
					<p> Vehicle No : <b> ".$vehNo." </b></p>
					<p> Vehicle Name : <b> ".$vehName." </b></p>
					<p> Vehicle Type : <b> ".$vehType." </b></p>
					<p> Date : <b> ".$date." </b></p>
					<p> Time Slot : <b> ".$timeSlot." </b></p>
					<p> Service Type : <b> ".$serviceType." </b></p>
					
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
	
    if($run1){
        $flag = 1;
        echo"<center style='color:white; font-size:25px;'>";
        echo "<h1>Booking Confirmed...!</h1>";
        echo "<h2>Thank You For Choosing Balambika Motors</h2>";
        echo "Stay Connected we'll Deliver your Vehicle After 2 Hours from your Time Slot";
        echo "<br><br><b>Check Your Details as Below-</b>";
        echo "<br>Appointment ID : ".$Fc_id1;
        echo "<br>Customer ID : ".$_SESSION['cid'];
        // echo "<br>Name : ".$name;
        // echo "<br>Mobile Number : ".$mob;
        // echo "<br>Address : ".$_SESSION['addr'];
        echo "<br>Vehicle No : ".$_SESSION['vehNo'];
        echo "<br>Your Time Slot : ".$_POST['timeSlot'];
        echo "<br><br>(<b>Note :</b> Keep Safe Above All Details for Future References.)";
        }
        else{
            echo "Appointment Not Proceed, Try Again with Valid Creadentials !!";
        }
        }
    }

if($flag == 0)
{
    echo"<center style='color:white; font-size:25px;'>";
    echo"<h1>Record Not Found!!!<br>";
    echo "<br>Please Enter Valid Creadentials,<br>";
    echo "Try again With Proper Details...!</center>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thank You for Choosing Balambika Motors</title>
</head>
<body  style="background: linear-gradient(110deg, rgba(2,0,36,1) 0%, rgba(0,16,19,1) 47%, rgba(192,192,192,1) 100%);">
<br><br>
<center> <h2>
<a href="index.html" style="color:white;">Back To Home</a>
</center>
</body>
</html>
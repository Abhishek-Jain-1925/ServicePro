<?php
session_start();

$ap_id = $_SESSION['ap_id'];

$host="localhost";
$user="root";
$pass="";
$sql ="";

try{
$connect=new PDO("mysql:host=$host;dbname=showroom",$user,$pass);
}
catch(PDOException $e)
{
	echo "Connection Failed: ".$e->getMessage();
	die();
}

$sql = "UPDATE appointment SET status='Completed' WHERE ap_id=$ap_id";

if($connect->query($sql) === TRUE)
{
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You For Choosing Balambika Motors Pvt.Ltd.</title>
</head>
<body style="background: linear-gradient(110deg, rgba(2,0,36,1) 0%, rgba(0,16,19,1) 47%, rgba(192,192,192,1) 100%); background-size: 100%;">
    <div class="main" style="text-align: center; color: white; margin-top: 193px; font-size: 24px; padding-bottom: 160px;">
    <h1>Thank You , Visit Again...!</h1>    
    <h2>Have A Safe Ride & Safe Journey</h2><br><br><br>

    <a href="index.html" style="color: white;">Back To Home</a>
    </div>
</body>
</html>
<?php 

$op = $_GET['op'];
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

if($op=="full")
{
    $sql = "select cname,vehNo,vehType,status from customer,appointment where customer.cid=appointment.cid";
}
else if($op=="completed")
{
    $sql = "select cname,vehNo,vehType,status from customer,appointment where customer.cid=appointment.cid AND appointment.status='Completed'";
}
else
{
    $sql = "select cname,vehNo,vehType,status from customer,appointment where customer.cid=appointment.cid AND appointment.status='Not Completed'";
}

echo "<table border='1'>";
echo "<tr>";
echo "<th> Owner Name </th><th> Vehicle Type </th><th> Vehicle No. </th><th> Status </th>";
echo "</tr>";
foreach($connect->query($sql) as $row)
{
	echo " <tr><td> ".$row['cname']." </td><td> ".$row['vehType']. "</td><td> ".$row['vehNo']."</td><td> ".$row['status']."</td></tr>";
}
echo "</table>";
?>
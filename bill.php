<?php
session_start();


$ap_id = $_POST['apid'];
$vehNo = $_POST['vehNo'];

$host = "localhost";
$username = "root";
$password ="";
$dbname = "showroom";

$charge=300;
$flag = 0;

try{
    $connect=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    }
    catch(PDOException $e)
    {
        echo "Connection Failed: ".$e->getMessage();
        die();
    }

    $s ="select * from appointment";
    foreach($connect->query($s) as $row)
    {
        if($row['serviceType']=="Full" && $row['vehNo']==$vehNo && $row['ap_id']==$ap_id)
        {
            if($row['vehType']=="Car"){
            $charge=1100;       }
            elseif($row['vehType']=="Bike"){
                $charge=500;        } 
        }       
    }
    $sql ="select * from appointment,customer where customer.cid=appointment.cid";
    foreach($connect->query($sql) as $row1)
    {
        if($row1['vehNo']==$vehNo && $row1['ap_id']==$ap_id)
        {
            $flag=1;
            $_SESSION['ap_id']=$row1['ap_id'];
            echo "<center style='border: 4px solid white; margin-left:400px;margin-right:400px; '>";
            echo "<div class='main' style='color:white; text-align: center; margin-left:80px;margin-right:80px;'>";
                    echo"<h2 style='white-space:nowrap;'>Balambika Motors Pvt.Ltd.</h2>";
                    echo "<h3 style='border : 1px solid white; padding : 2px;'>INVOICE</h3>";
                    echo "<br><b>Customer Information -</b>";
                    echo "<br>Customer Name : ".$row1['cname'];					
                    echo "<br>Mobile Number : ".$row1['mob'];
                    echo "<br>Address : ".$row1['addr'];
                    echo "<br><b>Vehicle Information -</b>";
                    echo "<br>Vehicle No. :".$row1['vehNo'];
                    echo "<br>Vehicle Type : ".$row1['vehType'];
                    echo "<br>Service Type : ".$row1['serviceType']."<br><br>";
					
					$_SESSION['billCname']= $row1['cname'];
					$_SESSION['billCmob']= $row1['mob'];
					$_SESSION['billCaddr']= $row1['addr'];
					$_SESSION['billVehNo']= $row1['vehNo'];					

                    
                    echo "<table border='1' style='color:white; text-align: center; margin-left:auto;margin-right:auto;'>";
                    echo "<tr>";
                    echo "<th> Particulars </th><th> Quantity </th><th> Amount </th>";
                     echo "</tr>";
                        echo " <tr><td> Service Charge </td><td>1</td><td> ".$charge."/-</td></tr>";
                        echo " <tr><td> Oil </td><td> 1.5 L </td><td>250/-</td></tr>";
                        echo " <tr><td> Washing </td><td> - </td><td>50/-</td></tr>";
                    echo "</table>";
        
                    $amt = $charge + 250 + 50;
					$_SESSION['billAmt']= $amt;
                    echo "<h4>Total Amount To be Paid : Rs.".$amt."/- </h4>";
            echo "</div>";
            echo "</center>";
        }       
    }
    if($flag==0)
    {
        echo "<center><h2 style='color:white;'>Record Not Found !!";
        echo "<br>Please Enter Valid Creadentials.";        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Details | Balambika Motors Pvt.Ltd.</title>
    <style>
    .btn
    {
        border: 2px solid white;
        background: linear-gradient(110deg, rgba(2,0,36,1) 0%, rgba(0,16,19,1) 47%, rgba(192,192,192,1) 100%);
        color: white;
        font-size: 20px;
        font-weight: bold;
    }

.btn:hover{
  background : white;
  color : black;
  border : 2px solid black;
  cursor: pointer;
}
    </style>
</head>
<body style="background: linear-gradient(110deg, rgba(2,0,36,1) 0%, rgba(0,16,19,1) 47%, rgba(192,192,192,1) 100%);">
<center><br><br>
    <div class="wrapper">
        <form action="RazorPayPaymentInt/pay.php" method="GET">
        <input type="submit" value="Proceed To Payout" class="btn">
        </form>
    </div>
</center>
</body>
</html>
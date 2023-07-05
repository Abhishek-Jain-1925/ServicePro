<?php 
session_start();
$_SESSION['cid'] = $_POST['cid'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['mob'] = $_POST['mob'];
$_SESSION['addr'] = $_POST['addr'];
$_SESSION['vehNo'] = $_POST['vehNo'];
$_SESSION['vehType'] = $_POST['vehType'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(2)Book Your Appointment with Balambika Motors</title>
    <link rel="stylesheet" href="CSS/exBook1.css">

    <script>
      function validDate() {
        var UserDate = document.getElementById("date").value;
        var ToDate = new Date();

        setTimeout(() => {
          if (new Date(UserDate).getTime() <= ToDate.getTime()) {
              alert("The Date must be Bigger or Equal to today date");
              return false;
          }
          return true;
        }, 5000)
    }
    </script>
</head>
<body style="background-color: rgb(245, 245, 181);">
    <form action="exBook2.php" method="post">
      <div class="wrapper">
        <div class="title">
             - Book Appointment -
        </div>
            
        <div class="form">
          <div class="inputfield">
            <label>Select Time Slot :</label>
              <select name="timeSlot" required>
                <option value="10AM-2PM">10 AM -12 PM</option>
                <option value="12PM-2PM">12 PM -2 PM</option>
                <option value="3PM-4PM">3 PM -5 PM</option>
                <option value="4PM-6PM">5 PM -7 PM</option>
              </select>
          </div>   
                
          <div class="inputfield">
            <label>Select Date For Servicing :</label>
            <input type="date" name="date" onclick='validDate()' required>
          </div>
             
          <div class="inputfield">                 
            <label style="white-space:nowrap">Select Type of<br>Servicing :</label>
            <input type="radio" name="op" class="radio" value="Full" required="required">Full Servicing (Service,Oil,Washing,etc.) <br>
            <input type="radio" name="op" class="radio" value="Half" required="required">Half Servicing (Service,Oil,etc.)
          </div>
             
          <div class="inputfield">
            <label>Enter Vehicle Name :</label>
            <input type="text" name="vehName" id="vehName" placeholder="   eg. Honda City, Bajaj Pulsar" required="required">
          </div> 
                             
          <div class="inputfield">
            <input type="submit" value="Submit" class="btn">
          </div>
        </div>  
      </div>        
    </form>
  </body>

</html>
<html>

    <head>
        <title>PITRENTALS Admin Inventory </title>
        <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../css/style.css">

        
       
    </head>
<body>
    
<?php

require '../DBconnexion.php';

$bookingID = $_POST['bookingID'];
$carID = $_POST['carID'];
$clientID = $_POST['clientID'];
$DVA = $_POST['dateVehicleAquisition'];
$DVR = $_POST['dateVehicleReturn'];
$DO = $_POST['driverOption'];
$AD = $_POST['advanceDeposit'];
$amount = $_POST['amount'];
$R = $_POST['residence'];

$query = "UPDATE booking Set carID = '$carID', clientID='$clientID', dateVehicleAquisition='$DVA', dateVehicleReturn = '$DVR', driverOption='$DO' ,advanceDeposit='$AD',amount='$amount', droppingPoint='$R'  where bookingID='$bookingID' ";

$exec=mysqli_query($connect,$query);
if($exec){
    echo "<div> successfully updated !! </div>";
}else{
    echo "<div> no update occured in the database *_* </div>";
}

mysqli_close($connect);


?>
<div> <a  href='../admininterface/bookingsList.php' class='section-btn btn btn-primary btn-block'  > Go Back to Bookings Inventory  </a> </div>
</body></html>


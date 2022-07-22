<html>

    <head>
        <title>PITRENTALS </title>
        <title>YOUR RECEIPT</title>
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
        <link rel="stylesheet" href="css/style.css">

        
        

        
    </head>
<body>
<?php
require 'DBconnexion.php';
//require 'helpingFuncs_Data.php';

require 'sessionCheck.php';


$A=$_SESSION['vehicleID']; //carID
$Z=$_SESSION['user'];//client username
$C=$_POST['DVA']; //dateVehicleAquisition
$E=$_POST['DVR']; //dateVehicleReturn
$G=$_POST['driverOption']; //driverOption
$H=$_POST['advanceDeposit']; //advanceDeposit
$B=$_POST['amount']; //amount
$R=$_POST['residence']; //droppingPoint


//recuperer
$query1 = "SELECT * from user where userName='$Z'";
$client= mysqli_fetch_array(mysqli_query($connect,$query1)); 

$query2 = "SELECT * from vehicle where vehicleID='$A'";
$car= mysqli_fetch_row( mysqli_query($connect,$query2)); 


//insersion dans la table des reservations

$query = "insert into booking values (null, '$A','$client[0]','$C','$E','$G','$H','$B','$R')";

$exec = mysqli_query($connect,$query);

if($exec){
    echo "<div> booking confirmed !! </div>".'<br>';
}else{
    echo "<div> undefined error occured !! </div>".'<br>';
}


//receipt
// amount based on duration
function dateDiffInDays($date1, $date2) 
  {
      
      $diff = strtotime($date2) - strtotime($date1);
  
      return abs(round($diff / 86400));
  }
$duration = dateDiffInDays($C, $E);





//receipt elements

$customer = $client[1];
$carDetails = $car[3] .  $car[2];
$pickUp = date('Y-m-d H:i:s', strtotime($C));
$returning = date('Y-m-d H:i:s', strtotime($E));
$fullAmount = $B * $duration ;
$rest = $fullAmount - $H ;



//assign a driver


$query3="SELECT * from driver where driverResidence like '%$R%' and Davailability = 'available'";
$exec3 = mysqli_query($connect, $query3);

if (mysqli_num_rows($exec3)>0){
    $driver = mysqli_fetch_row($exec3);
    $driverDetails = "Name : $driver[1] <br> Contact : $driver[2]";
    
}else{
   
    $driverDetails=" we are sorry no driver is available at the moment in your region, we will assign one soon !!!";
}



//print the receipt
?>

<table align='center'>
<th><td colspan='2' align='center'> YOUR RECEIPT </td></th>
<tr><td> Customer :</td> <td><?php echo $customer ;?></td></tr>
<tr><td> Car Details :</td> <td><?php  echo $carDetails ;?></td></tr>
<tr><td> Pick-up Date :</td> <td><?php echo $pickUp; ?></td></tr>
<tr><td> Date of Return :</td> <td><?php echo $returning; ?></td></tr>
<tr><td> Total payment :</td> <td> <?php echo $fullAmount; ?> MAD </td></tr>
<tr><td> Advance Deposit :</td> <td> <?php echo $H ;?>MAD </td></tr>
<tr><td> Rest of the payment:</td> <td> <?php echo $rest ;?> MAD </td></tr>
<tr><td> Driver Details :</td> <td> <?php if ($G=='self drive') echo '--' ;else echo $driverDetails;?> </td></tr>

</table>




<div>
<a href='HOME.php' class='section-btn btn btn-primary btn-block' >Home</a>
<a href='mybookings.php' class='section-btn btn btn-primary btn-block'>Bookings</a>
</div>

</body>
</html>
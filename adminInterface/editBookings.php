<html>
<head>
        <title>modifiying inventory </title>
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
<?php
require '../DBconnexion.php';
$bookID= $_GET['bookID'];
$query= "SELECT * from booking where bookingID='$bookID'";
$exec = mysqli_query($connect, $query);
$intels = mysqli_fetch_assoc($exec);
print_r($intels);
?>

<body>
    <h1> edit the general booking list of PITRENTALS</h1>
    <table>
        <form  name="form" action="editBookingsAction.php" enctype="multipart/form-data" method="post" >
            <tr> <td>booking ID : </td> <td> <?php echo $intels['bookingID'];?>  <input type="hidden"  id="bookingID" name="bookingID"  value="<?php echo $intels['bookingID'];?> "></td></tr>  

            <tr> <td>car ID:  </td> <td> <?php echo $intels['carID'];?> <input type="hidden"  id="carID" name="carID"  value="<?php echo $intels['carID'];?> "></td></tr>  

            <tr><td>client ID : </td> <td> <?php echo $intels['clientID'];?> <input type="hidden" name="clientID" id="clientID" value="<?php echo $intels['clientID'];?>" ></td></tr>

            <tr><td>Date of vehicle aquisition : </td> <td> <input type="datetime-local" name="dateVehicleAquisition" id="dateVehicleAquisition"  value="<?php echo $intels['dateVehicleAquisition'];?>" ></td></tr>
            <tr><td>Date of vehicle return : </td> <td> <input type="datetime-local" name="dateVehicleReturn" id="dateVehicleReturn" value="<?php echo $intels['dateVehicleReturn'];?>"  ></td></tr>
            
            
            <tr><td>Driver Option : </td><td> <select name="driverOption" id="driverOption"  >
                
                <option id="withDriver" value="with driver" <?php if ($intels['driverOption']=='with driver') echo 'selected';?> >with driver</option>
                <option id="selfDrive " value="self drive"<?php if ($intels['driverOption']=='self drive') echo 'selected';?> >self drive</option>

            </select>
            <br>
            
            </td></tr>

            <tr><td>Advance Deposit : </td> <td> <input type="number" min="0" name="advanceDeposit" id="advanceDeposit" value="<?php echo $intels['advanceDeposit'];?> " placeholder="<?php echo $intels['advanceDeposit'];?> " required>MAD/DAY</td></tr>
            <tr><td>Amount : </td> <td> <input type="number"  min="0" name="amount" id="amount"  value="<?php echo $intels['amount'];?> " placeholder="<?php echo $intels['amount'];?> " required>MAD/DAY</td></tr>
            <tr><td>dropping point (current residence of the client) : </td><td><input type="text"  id="residence" name= "residence" value="<?php echo $intels['droppingPoint'];?> " ></td></tr>
            
            

           
            
            <tr> <td><input type="submit" value="send" class="section-btn btn btn-primary btn-block"></td> <td><input type="reset" value="cancel & refill" class="section-btn btn btn-primary btn-block"></td> </tr>

            </form>
        </table>
       
        <div> <a  href='../admininterface/bookingsList.php' class='section-btn btn btn-primary btn-block'  > Go Back to Bookings Inventory  </a> </div>   
</body>



</html>

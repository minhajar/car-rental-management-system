<html>

    <head>
        <title>PITRENTALS </title>
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
    <script>
     function validate_canceling(){
            return confirm("are you sure ?¿");
        }
     </script>
<body>
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">PITRENTALS</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li ><a href="HOME.php">Home</a></li>
                         <li ><a href="aboutUs.php">About Us</a></li>
                         <li class="active" ><a href="mybookings.php">Bookings</a></li>
                         
                         
                         
                    </ul>
               </div>

          </div>
     </section>
    <h1>YOUR BOOKINGS</h1>
<table border="0">
<tr>
    <th> booking ID </th>
    <th> car model </th>
    <th> date of vehicle aquisition </th>
    <th> date of vehicle return </th>
    <th> driver option </th>
    
    


</tr>
<?php
require 'DBconnexion.php';

require 'sessionCheck.php';
$userName = $_SESSION['user'];
$request1="SELECT * from user where userName='$userName'";
$client=mysqli_fetch_array(mysqli_query($connect,$request1));

$request2="SELECT * FROM booking where clientID='$client[0]' order by bookingID DESC LIMIT 5";
$bookings =  mysqli_query($connect,$request2);


while($booking = mysqli_fetch_row($bookings) ){
   
    echo "<tr><td>$booking[0] </td>";
    $request2="SELECT * from vehicle where vehicleID='$booking[1]'";
    $car=mysqli_fetch_array(mysqli_query($connect,$request2));

    echo "<td>$car[3] </td>";  
    echo "<td>$booking[3] </td>";  
    echo "<td>$booking[4] </td>";
    echo "<td>$booking[5] </td>";
    
    echo "<td><a href='clientCanceling.php?bookID=$booking[0]'  > cancel<a> </td> </tr>";

}


?>
</table>


</body>
</html>
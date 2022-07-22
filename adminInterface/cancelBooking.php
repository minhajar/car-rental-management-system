<html>

    <head>
        <title>PITRENTALS</title>
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
    $bookingID = $_GET['bookID'];
    $query="delete from booking where bookingID='$bookingID'";
    $exec=mysqli_query($connect,$query);
    if ($exec){
        echo "request successfully executed !!";
        
    }else{
        echo "nah no row was deleted -_- ";
    }

    mysqli_close($connect);

?>
<div> <a  href='../admininterface/bookingsList.php' class='section-btn btn btn-primary btn-block'  > Go Back to Bookings Inventory  </a> </div>
</body>

</html>
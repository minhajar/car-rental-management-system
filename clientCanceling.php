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
     <link rel="stylesheet" href="css/style.css">
       
    </head>
    
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
                         
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile<span class="caret"></span></a>
                              
                              <ul class="dropdown-menu">
                                <li><a href="authentificationForm.php">login</a></li>
                                <li><a href="signupForm.php">register</a></li>
                              </ul>
                         </li>
                         
                    </ul>
               </div>

          </div>
     </section>
    
<?php
    require 'DBconnexion.php';
    require 'sessionCheck.php';
    $bookingID = $_GET['bookID'];
    $query="delete from booking where bookingID='$bookingID'";
    $exec=mysqli_query($connect,$query);
    if ($exec){
        echo "request successfully executed !!";
       
        
    }else{
        echo "nah no row was deleted -_- ";
        
    }
    echo "<a href='mybookings.php'>Go Back to Bookings</a>";
    mysqli_close($connect);

?>
</body>
</html>
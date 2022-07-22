<!DOCTYPE html>
<html lang="en">
<head>
<?php session_start();?>
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

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
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
                         <li class="active"><a href="HOME.php">Home</a></li>
                         <li ><a href="aboutUs.html">About Us</a></li>
                         <li><a href="mybookings.php">Bookings</a></li>
                         
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile<span class="caret"></span></a>
                              
                              <ul class="dropdown-menu">
                                   <li><a href="authentificationForm.php">login</a></li>
                                   <li><a href="signupForm.php">Register</a></li>
                                   <li><a href="logout.php">Logout</a></li>
                                   
                                   
                              </ul>
                         </li>
                         <li><a href="HOME.php"> Go Back</a></li>
                         
                         
                    </ul>
               </div>

          </div>
     </section>
     
     

     <!-- HOME -->
     

     <main>
          
          <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>Offers <small>A Selection Of Our Vehicles</small></h2>
                              </div>
                        </div>

                        <?php
                        require 'DBconnexion.php';
                        $searchingItem= $_POST['search'];
                    
                        $query1= "select * from vehicle where modelName LIKE '%$searchingItem%'";
                        $result1= mysqli_query($connect, $query1);
                        
                        while($vehi= mysqli_fetch_row($result1)){
                            ?>
                                <div class='car'>
                                
                                            <div class="col-md-4 col-sm-6">
                                                <div class="team-thumb">
                                                    <div class="team-image">
                                                        <img src=<?php echo "adminInterface/display_pics/$vehi[5]";?> class="img-responsive"  alt="">
                                                    </div>
                                                    <div class="team-info">
                                                        <h3><?php echo $vehi[3] .' '. $vehi[2];?></h3>

                                                        <p class="lead"> <strong><?php echo $vehi[6];?></strong> </p>

                                                        <span> <?php echo $vehi[4] ;?></span>
                                                    </div>
                                                    <div class="team-thumb-actions">
                                                        <?php
                                                        if(isset($_SESSION['user'])){
                                                            
                                                            echo "<a id='book' href='bookForm.php?vehicleID=$vehi[0]' class='section-btn btn btn-primary btn-block'>BOOK</a>";
                                                        }
                                                        else{
                                                            $msg='You need to log into an account in order to book a car !!';
                                                            echo"<a id='book' href='authentificationForm.php?message=$msg' class='section-btn btn btn-primary btn-block'>BOOK</a>";
                                                        }?>
                                                    </div>
                                                    
                                                </div>
                                               
                                            </div>
                                </div>  
                        
                             <?php }?>   
                         
                    </div>
               </div>
          </section>
          
         
          
          
     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Headquarter</h2>
                              </div>
                              <address>
                                   <p>Marrakech <br>M Avenue</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>

                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2022 PITRENTALS</p>
                                   
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+1 333 4040 5566</p>
                                   <p><a href="mailto:contact@company.com">contact@pitrentals.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="terms.html">Terms & Conditions</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    
                    
               </div>
          </div>
     </footer>
     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>
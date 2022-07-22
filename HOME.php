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
     <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">
     

</head>
<script language='javascript'>
        function proposer(P){
                Xhr = new XMLHttpRequest();
                Xhr.onreadystatechange = function(){
                    if(Xhr.status==200 && Xhr.readyState==4)
                    document.getElementById('result').innerHTML=Xhr.responseText;
                 }
                Xhr.open("GET","getprops.php?p="+P, true);
                Xhr.send();}
            
</script>

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
                         <li ><a href="aboutUs.php">About Us</a></li>
                         <li><a href="<?php if(!isset($_SESSION['user'])) echo '#'; else echo 'mybookings.php';?>">Bookings</a></li>
                         
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile<span class="caret"></span></a>
                              
                              <ul class="dropdown-menu">
                                   <li><a href="authentificationForm.php">Login</a></li>
                                   <li><a href="signupForm.php">Register</a></li>
                                   <li><a href="logout.php">Logout</a></li>
                                   
                                   
                              </ul>
                         </li>
                         <li>
                            <form id="Sform" action="search.php" method="POST">
                           
                                <div >
                                <input type="text" name="search" onkeyup="proposer(this.value)" class="" placeholder="Search..." required >
                                <button type="submit" class="">Search</button>
                                </div>
                                
        

                            </form>
                        </li>
                         
                         
                    </ul>
               </div>

          </div>
     </section>

     <!-- HOME -->
     <section id="home">
          <div class="row">
               <div class="owl-carousel owl-theme home-slider">
                    <div class="item item-first">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-6 col-sm-12">
                                        <h1>Fast and easy way to rent a car</h1>
                                        <h3>We have everything you need. All you have to do is choose an offer, fill in the form and book.</h3>
                                       
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="item item-second">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-6 col-sm-12">
                                        <h1>Find the BEST CAR for you </h1>
                                        <h3>You will be satisfied with easy, quick service at a reasonable price.</h3>
                                        
                                   </div>
                              </div>
                         </div>
                    </div>

                    
               </div>
          </div>
     </section>

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
                        $query1= "SELECT * from vehicle where 1";
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
          <?php
          if(isset($_SESSION['user'])){
            $userName = $_SESSION['user'];
            $query2= "SELECT count(*) from admini where adminName='$userName'";
           
            $exec=mysqli_query($connect, $query2);
            $data=mysqli_fetch_array($exec);
            if ( $data[0]== 1){
                echo "<a href='adminInterface/Admin.php' class='section-btn btn btn-primary btn-block'>Admin Interface</a>";
        
            }
        }
        ?> 
         
          
          <section id="testimonial">
               <div class="container">
                    <div class="row">

                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>Testimonials <small>from all around Morrocco</small></h2>
                              </div>

                              <div class="owl-carousel owl-theme owl-client">
                                   <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                             <div class="tst-image">
                                                  <img src="images/tst-image-1-200x216.jpg" class="img-responsive" alt="">
                                             </div>
                                             <div class="tst-author">
                                                  <h4>Jackson</h4>
                                                  <span>Shopify Developer</span>
                                             </div>
                                             <p>this is one of akind service !!</p>
                                             <div class="tst-rating">
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                             </div>
                                        </div>
                                   </div>

                                   <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                             <div class="tst-image">
                                                  <img src="images/tst-image-2-200x216.jpg" class="img-responsive" alt="">
                                             </div>
                                             <div class="tst-author">
                                                  <h4>Camila</h4>
                                                  <span>Marketing Manager</span>
                                             </div>
                                             <p>this service helped me a lot lately since I have crashed my own car and can't afford to buy one at the moment -_-</p>
                                             <div class="tst-rating">
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                             </div>
                                        </div>
                                   </div>

                                   <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                             <div class="tst-image">
                                                  <img src="images/tst-image-3-200x216.jpg" class="img-responsive" alt="">
                                             </div>
                                             <div class="tst-author">
                                                  <h4>Barbie</h4>
                                                  <span>Art Director</span>
                                             </div>
                                             <p>this service comes in handy a lot, and I dont get any problems when booking my car !</p>
                                             <div class="tst-rating">
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                             </div>
                                        </div>
                                   </div>

                                   

                              </div>
                        </div>
                    </div>
               </div>
          </section> 
     </main>

           

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
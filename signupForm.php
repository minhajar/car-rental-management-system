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
                         
                         
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile<span class="caret"></span></a>
                              
                              <ul class="dropdown-menu">
                                   <li><a href="authentificationForm.php">Login</a></li>
                                   <li  ><a href="signupForm.php">Register</a></li>
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

<body>
     <form action="signupcheck.php" method="post">
     	<h2>SIGN UP</h2>

     	<?php
       
       if (isset($_GET['error'])) { 
     		echo "<p class='error'>"; echo $_GET['error']; echo "</p>";
     	} 

        /*if (isset($_GET['success'])) { 
               echo "<p class='success'>"; echo $_GET['success'];echo "</p>";
        }*/ 
       ?>

        <label>Name</label>
        <input type="text" 
                name="name" 
                placeholder="Name"><br>

        <label>UserName</label>   
        <input type="text" 
                name="userName" 
                placeholder="User Name"><br>
        


     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Confirm Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<input type="submit" value = "Sing Up"><br>
        
     </form>
</body>
</html>
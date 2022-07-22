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
     <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">
    </head>
<body>
    <h1>LOG IN </h1>
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
                                   <li ><a href="authentificationForm.php">Login</a></li>
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
    <?php
        if (isset($_GET['msg'])) { 
            echo $_GET['msg'];
            echo "<br>";
            
            echo "<a href='signupForm.php' class='btn'>  Sign Up  </a>";
            
        } 
        if (isset($_GET['message'])) { 
            echo $_GET['message'];
            echo "<br>";
            
            
        } 
        if (isset($_GET['success'])) { 
            echo "<p class='success'>"; echo $_GET['success'];echo "</p>";
     }
    ?>
    <table>
        <form action="login.php" method="post">
    
        
            <tr> <td> login : </td><td> <input type="text" name="login" ></td></tr>
            <tr> <td> password : </td><td>  <input type="password" name="password" ></td></tr>
            <tr><td> <input type="submit" value="send"> </td><td> <input type="reset" value="cancel" > </td></tr>

        </form>
    </table>
</body>


</html>


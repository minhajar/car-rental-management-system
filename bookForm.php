<html>

    <head>
        <title>BOOK YOUR CAR </title>
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
    
    <script type="text/javascript">
        
        
        function fix_date() {
            
            var x = document.getElementById("DVA");
            var y = document.getElementById("DVR");
            var X =new Date(x.value);
            var Y= new Date(y.value);
            
            
            if (X > Y) {
                 
                alert("select a valid date to return the vehicle");
                return False;
            }
        }
       
       
        function validate_booking(){
            return confirm("are you sure ?¿");
        }
        
        
    </script>    
    
        

<?php
    require 'DBconnexion.php';
    require 'sessionCheck.php';
    
    
    $vehicleID = $_GET['vehicleID'];
    $_SESSION['vehicleID']=$vehicleID;
    
    $query= "SELECT * from vehicle where vehicleID='$vehicleID'";
    $result=mysqli_query($connect,$query);
    $vehi_info= mysqli_fetch_assoc($result);
    
    //print_r($vehi_info);
?>

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
                         <li><a href="mybookings.php">Bookings</a></li>
                         
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
     <h1 align="center"> BO0K YOUR CAR </h1>
    <table align="center">
        <form  name="form" action="bookingAction.php" enctype="multipart/form-data" method="post" onsubmit='return validate_booking();' >
            <tr> <td>Car Model :  </td> <td> <?php echo $vehi_info['modelName']?> <input type="hidden"  id="carModel" name="carModel"  value="<?php echo $vehi_info['modelName']?> "></td></tr>  

            <tr> <td>RegistrationPlate :  </td> <td> <?php echo $vehi_info['registration']?> <input type="hidden"  id="registration" name="registration"  value="<?php echo $vehi_info['registration']?> "></td></tr>  

            <tr><td>Amount/Day : </td> <td> <?php echo $vehi_info['pricePerDay']?> <input type="hidden" name="amount" id="amount" value="<?php echo $vehi_info['pricePerDay']?>" > MAD/DAY</td></tr>

            <tr><td>Date of vehicle aquisition : </td> <td> <input type="datetime-local" name="DVA" id="DVA" min="<?php echo date('Y-m-d\TH:i:sP');?>" required></td></tr>
            <tr><td>Date of vehicle return : </td> <td> <input type="datetime-local" name="DVR" id="DVR" oninput= "fix_date()"  required ></td></tr>
            
            
            <tr><td>Driver Option : </td><td> <select name="driverOption" id="driverOption"  required >
                <option  id="default " value="" selected >choose</option>
                <option  id="withDriver " value="with driver">with driver</option> 
                <option id="selfDrive " value="self drive" >self drive</option> 
            </select>
            <br>
            
            </td></tr>

            
            <tr><td>Current Residence : </td><td><input id='residence' name= 'residence' type='text' placeholder="enter city of residence (actual location)" ></td></tr>
            
            <tr><td>Advance Deposit : </td> <td> <input type="number" min="0" name="advanceDeposit" id="advanceDeposit"  >MAD/DAY</td></tr>

            
            
            <tr> <td><input type="submit" value="send" ></td> <td><input type="reset" value="cancel & refill"></td> </tr>

            </form>
        </table>
       
    
</body>



</html>

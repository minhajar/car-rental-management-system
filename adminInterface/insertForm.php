<html>
<head>
        <title>inserting inventory </title>
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
    <h1 >ADD A NEW VEHICLE </h1>
    
    <body>
        <table align="center">
        <form name="form1" action="insertAction.php" enctype="multipart/form-data" method="post">
                
                
            <tr><td>RegistrationPlate </td><td><input type="text"  id="registration" name="registration"  ></td></tr>

            <tr><td> Model Number</td><td> <input type="number" name="modelNo" id="modelNo"></td></tr>

            <tr><td> Model Name</td><td> <input type="text" name="modelName" id="modelName"></td></tr>
            <tr><td>Availability</td>
                <td> <select name="availability" id="availability">
                    <option value=0 >choose</option>
                    <option value=1>available</option>
                    <option value=2 >notAvailaible</option> 
                </select></td></tr>

            <tr><td>Photo</td><td><input type="file" name="display_picture" accept="/carRentalProject/display_pics/*"   ></td></tr>
            <tr><td>Price Per day in MAD</td><td><input type="number" name="pricePerDay"   ></td></tr>

            
            <tr><td><input type="submit"  value="send" ></td>
            <td><input type="reset" value="cancel & refill"></td></tr>

            </form>
        </table>
        <div> <a  href='../adminiInterface/AdminInventory.php' class='section-btn btn btn-primary btn-block' > Go Back to Vehicle Inventory  </a> </div>
    </body>
</html>
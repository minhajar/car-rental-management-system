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
$query= "SELECT * from vehicle where vehicleID='$_GET[vehiID]'";
$exec = mysqli_query($connect, $query);
$intels = mysqli_fetch_assoc($exec);



?>
    
    <body>
        <h1>Edit Vehicle Attributes</h1>
        <table align="center">
        <form name="form2" action="editAction.php" enctype="multipart/form-data" method="post">
                
            
        <tr> <td>vehicle ID  </td> <td> <?php echo $intels['vehicleID']?> <input type="hidden"  id="ID" name="ID"  value="<?php echo $intels['vehicleID']?> "></td></tr>      
            <tr><td>Registration number </td><td><input type="text"  id="registration" name="registration" value="<?php echo $intels['registration']?> "></td></tr>

            <tr><td> Model Number</td><td> <input type="number" name="modelNo" id="modelNo" value="<?php echo $intels['modelNo']?>"></td></tr>

            <tr><td> Model Name</td><td> <input type="text" name="modelName" id="modelName" value="<?php echo $intels['modelName']?> "></td></tr>
            <tr><td>Availability</td>
                <td> <select name="availability" id="availability"  >
                    
                    
                    <option value="available"<?php if ($intels['accessibility']=='available') echo 'selected';?> >available</option>
                    <option value="notAvailable" <?php if ($intels['accessibility']=='notAvailable') echo 'selected';?> >notAvailable</option> 
                </select></td></tr>

            <tr><td>Photo</td><td><input type="file" name="display_picture" accept="/carRentalProject/display_pics/*"  value="<?php echo $intels['display_picture']?> "></td></tr>
            <tr><td>Price Per day in MAD</td><td><input type="number" name="pricePerDay" value="<?php echo $intels['pricePerDay']?>"  ></td></tr>

            
            <tr><td><input type="submit"  value="send" class="section-btn btn btn-primary btn-block"></td>
            <td><input type="reset" value="cancel & refill" class="section-btn btn btn-primary btn-block"></td></tr>

            </form>
        </table>
        <div> <a  href='../adminInterface/AdminInventory.php' class="section-btn btn btn-primary btn-block"  > Go Back to Vehicle Inventory  </a> </div>
    </body>
</html>
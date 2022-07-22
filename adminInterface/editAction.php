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
     <<link rel="stylesheet" href="../css/style.css">
       
    </head>
<body>
<?php

require '../DBconnexion.php';
require '../helpingFuncs_Data.php';

$vehicleID= $_POST['ID'];
$registration = $_POST['registration'];
$modelNo = $_POST['modelNo'];
$modelName = $_POST['modelName'];
//traitement de photo
//if ($_FILES['display_picture']['size'] == 0 && $_FILES['display_picture']['error']== 0){

    if($_FILES['display_picture']['size'] > $maxFileSize){
        echo "error : image too large";
        exit;
    }
    else
    {
        if ($_FILES['display_picture']['type'] != 'image/jpeg' && $_FILES['display_picture']['type'] != 'image/jpg'){
            echo "error : incompatible type";
            exit;
        }
        else
        {
            $display_pic = uniqid().'.jpeg';
            move_uploaded_file($_FILES['display_picture']['tmp_name'],'display_pics/'.$display_pic);
        }

    }
//}
//echo $_FILES['display_picture']['tmp_name'];
//echo $display_pic;

$availability = $_POST['availability'];
$pricePerDay = $_POST['pricePerDay'];


print_r($_POST);
$query = "UPDATE vehicle Set registration = '$registration', modelNo='$modelNo', modelName='$modelName', accessibility = '$availability', display_picture='$display_pic',pricePerDay='$pricePerDay' where vehicleID='$vehicleID' ";
echo $query;
$exec=mysqli_query($connect,$query);
if($exec){
    echo "<div> successfully updated !! </div>";
}else{
    echo "<div> no update occured in the database *_* </div>";
}

mysqli_close($connect);
?>
<div> <a  href='../adminInterface/AdminInventory.php' class='section-btn btn btn-primary btn-block'  > Go Back to Vehicle Inventory  </a> </div>
</body>
</html>
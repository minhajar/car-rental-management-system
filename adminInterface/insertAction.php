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
require '../helpingFuncs_Data.php';



//if (isset($_FILES['display_picture'])){
    if($_FILES['display_picture']['size'] > $maxFileSize){
        echo "error : image too large";
        exit;
    }

    else {
        if ($_FILES['display_picture']['type'] != 'image/jpeg' && $_FILES['display_picture']['type'] != 'image/jpg'){
            echo "error : incompatible type";
            exit;
        }
        else{
            
            $path = uniqid().'.jpeg';
            move_uploaded_file($_FILES['display_picture']['tmp_name'],'display_pics/'.$path);
            
        }

    }

//}
    

$registration = $_POST['registration'];
$modelNo = $_POST['modelNo'];
$modelName = $_POST['modelName'];

$availability = $_POST['availability'];
$pricePerDay = $_POST['pricePerDay'];


$query = "insert into vehicle values (null , '$registration', '$modelNo', '$modelName', '$availability', '$path','$pricePerDay')";

$exec=mysqli_query($connect,$query);
if ($exec){
     echo "<div> request successfully executed !! </div>";
     
}else{
    echo "<div> nah no row was added  -_-  </div>";
};

mysqli_close($connect);



?>

<div> <a  href='../adminInterface/AdminInventory.php' class='section-btn btn btn-primary btn-block'  > Go Back to Vehicle Inventory  </a> </div>


</body>
</html>
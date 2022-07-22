<!DOCTYPE html>
<html lang="en">
<head>
<?php session_start();?>
     <title>PITRENTALS</title>

    
     

</head>
<body >




<?php

require 'DBconnexion.php';



$log=$_POST['login'];
$pwd=md5($_POST['password']);

$request="select count(*) from user where userName='$log' and passwd='$pwd'";
$execution=mysqli_query($connect, $request);
$data=mysqli_fetch_array($execution);




if($data[0]==1){
    session_start();
    $_SESSION['user']=$log;
    $_SESSION['LAT']=time();
    //echo " <div> <a href='HOME.php' class='btn'>HOME PAGE</a> </div>";


    header('location:HOME.php');
}
else{
    header('location:authentificationForm.php?msg=Not yet a member !! Register here');
    
    
}
mysqli_close($connect);

?>

</body>
</html>

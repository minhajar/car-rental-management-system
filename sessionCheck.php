<?php
require 'helpingFuncs_Data.php';
session_start();

if(!isset($_SESSION['user'])) 
   header('location:authentificationForm.php');

if (time()-$_SESSION['LAT']>$time_limite)
        header('location:logout.php?message= session time overlaped , you neeed to reconnect :)');


else
    $_SESSION['LAT']=time();
    

?>
<?php

define('HOST','localhost');
define('USER','root');
define('PASS','root');
define('DB','carRentaldb');

$connect = mysqli_connect(HOST,USER,PASS,DB);
if($connect == FALSE)
    {echo "probleme de connexion"; exit();}
    
?> 
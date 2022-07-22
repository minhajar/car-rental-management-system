<?php
//functions

function validate($data){
    $data = trim($data); //remove blank characters
    $data = stripslashes($data); //remove antislashs
    $data = htmlspecialchars($data); // convert html tags and stuff into normal chars
    return $data;
 }
//data

$maxFileSize = 36000000;
$time_limite=3600;

?>
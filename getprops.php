<?php
$var = $_GET['p'];
require 'DBconnexion.php';
$query = "select * from vehicle where modelName like '%$var%'";
$result = mysqli_query($connect, $query);

while ($props = mysqli_fetch_row($result)){
    echo "$props[1]<br>";


}
//fix when 
mysqli_close($connect);

?>


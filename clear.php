<?php 
    $id = $_GET['id'];
    require 'dbconfig.php';
    $result = mysqli_query($mysqli, "UPDATE `maintable` SET `lux`=0");
header("Location: /file/grid-plot.php"); 
exit; 
 ?>
<?php


// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");

//Creating Array for JSON response
// $response = array();
 
// Check if we got the field from the user
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    require 'dbconfig.php';
    
    $temp1 = mysqli_query($mysqli,"SELECT lux FROM `luxindoor` ORDER by date DESC LIMIT 1 ");
    $data1 = mysqli_fetch_array($temp1);
    
    $temp2 = mysqli_query($mysqli,"SELECT lux FROM `luxoutdoor` ORDER by date DESC LIMIT 1 ");
    $data2 = mysqli_fetch_array($temp2);

    $in = $data1['lux'];
    $out = $data2['lux'];
    $df = 100*$in/$out;
    
    $result = mysqli_query($mysqli, "UPDATE `maintable` SET `value` = '$df' WHERE `maintable`.`id` = '$id'" );
    
  
}
header("Location: grid-plot.php"); 
exit; 
    // $result = mysql_query("UPDATE weather SET lux= '$lux' WHERE id = '$id'");
 
//     // Check for succesfull execution of query and no results found
//     if ($temp) {
//         // successfully updation of lux
//         $response["success"] = 1;
//         $response["message"] = "Weather Data successfully updated.";
 
//         // Show JSON response
//         echo json_encode($response);
//     } else {
 
//     }
// } else {
//     // If required parameter is missing
//     $response["success"] = 0;
//     $response["message"] = "Parameter(s) are missing. Please check the request";
 
//     // Show JSON response
//     echo json_encode($response);
// }

?>
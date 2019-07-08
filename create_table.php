<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$databaseHost = 'localhost';
$databaseName = 'id10054946_databasearmand';
$databaseUsername = 'root';
$databasePassword = '';


//Creating Array for JSON response
$response = array();
 
// Check if we got the field from the user
// if (isset($_GET['temp']) && isset($_GET['hum'])) {

if (isset($_GET['xlen']) && isset($_GET['ylen'])) {
 
 
    $xlen = $_GET['xlen'];
    $ylen = $_GET['ylen'];
    // $hum = $_GET['hum'];
 
    // Include data base connect class
    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
    $clear = mysqli_query($mysqli, "DELETE FROM maintable");
    
    // Fire SQL query to delete table in maintable
    
    $y = 1;
    // $id = 1;
    while ($y <= $ylen) {
        $x = 1;
        while ($x <= $xlen) {
            $result = mysqli_query($mysqli,"INSERT INTO maintable(lux, nox, noy) VALUES(0,$x,$y)");
            $x++;
        }
       $y++;

    }
    // Fire SQL query to insert data in maintable
    
 
    // Check for succesfull execution of query
    if ($result) {
        // successfully inserted 
        $response["success"] = 1;
        $response["message"] = "Weather successfully created.";
 
        // Show JSON response
        echo json_encode($response);
    } else {
        // Failed to insert data in database
        $response["success"] = 0;
        $response["message"] = "Something has been wrong";
 
        // Show JSON response
        echo json_encode($response);
    }
} else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // Show JSON response
    echo json_encode($response);
}
header("Location: grid-plot.php"); 
  
exit; 
?>

<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Creating Array for JSON response
$response = array();
 
// Check if we got the field from the user
// if (isset($_GET['temp']) && isset($_GET['hum'])) {

if (isset($_GET['lux_1'])) {
 
 
    $lux = $_GET['lux_1'];
    // $hum = $_GET['hum'];
 
    // Include data base connect class($filepath."/db_connect.php");
    require 'dbconfig.php';
 	
    // Connecting to database 
 
    
    // Fire SQL query to insert data in weather
    $result = mysqli_query($mysqli,"INSERT INTO lux_in(lux_in) VALUES('$lux')");
    
 
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
}
if (isset($_GET['lux_2'])) {
 
 
    $lux = $_GET['lux_2'];
    // $hum = $_GET['hum'];
 
    // Include data base connect class($filepath."/db_connect.php");
    require 'dbconfig.php';
 	
    // Connecting to database 
 
    
    // Fire SQL query to insert data in weather
    $result = mysqli_query($mysqli,"INSERT INTO lux_out(lux_out) VALUES('$lux')");
    
 
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
?>
<?php
require_once "../connection/ApiController.php";

$portCont = new portalController();

$userInformation = $portCont->allPreApprovedEnrolledList();

// Encode the data as JSON
$jsonData = json_encode($userInformation);

// Set the appropriate content type header
header('Content-Type: application/json');

echo $jsonData;
// Output the JSON data
?>

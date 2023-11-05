<?php 

require_once "../connection/ApiController.php";

$portCont = new portalController();

$mapOverall = $portCont->getMapOverall();

header('Content-Type: application/json');
echo json_encode($mapOverall);

?>
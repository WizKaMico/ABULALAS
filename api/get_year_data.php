<?php 

require_once "../connection/ApiController.php";

$portCont = new portalController();

$yearInformation = $portCont->getYear();

header('Content-Type: application/json');
echo json_encode($yearInformation);

?>
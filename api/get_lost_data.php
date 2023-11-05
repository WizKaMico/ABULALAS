<?php 

require_once "../connection/ApiController.php";

$portCont = new portalController();

$userInformation = $portCont->getFound();

header('Content-Type: application/json');
echo json_encode($userInformation);

?>
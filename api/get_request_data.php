<?php 

require_once "../connection/ApiController.php";

$portCont = new portalController();

$userInformation = $portCont->getRequest();

header('Content-Type: application/json');
echo json_encode($userInformation);

?>
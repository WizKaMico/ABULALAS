<?php 

require_once "../connection/ApiController.php";

$portCont = new portalController();

$userInformation = $portCont->getAnnouncement();

header('Content-Type: application/json');
echo json_encode($userInformation);

?>
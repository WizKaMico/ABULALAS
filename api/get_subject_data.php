<?php 

require_once "../connection/ApiController.php";

$portCont = new portalController();

$subjectInformation = $portCont->getSubject();

header('Content-Type: application/json');
echo json_encode($subjectInformation);

?>
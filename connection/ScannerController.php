<?php 
require_once "connection/ApiController.php";
$portCont = new portalController();

if (! empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "validate": 
            if(isset($_POST['uid'])){
            date_default_timezone_set('Asia/Manila');

                $uid = $_POST['uid'];
               
                if(!empty($uid))
                {
                    $checkifinor = $portCont->schoolAttendanceValidation($uid); 

                    if(!empty($checkifinor))
                    {
                        $portCont->schoolAttendanceTimeOut($uid); 
                   
                    }
                    else
                    {
                        $portCont->schoolAttendanceTimeIn($uid); 
                     
                    }

                    $personal = $portCont->personalInformation($uid); 

                }
            }
        break;
    }
}




?>
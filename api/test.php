<?php

require_once "../connection/ApiController.php";
$portCont = new portalController();
// ==================================================================================
// registration key 
// $key = rand(666666,999999);
// $uid = 'SP-' + $key; 
// $email = "revcoreitsolution@gmail"; 
// $password = md5('admin');
// $designation = 3; 
// $code = rand(6666,9999);
// $status = 'INVALID';

// $portCont->registerUser($uid, $email, $password, $designation, $code, $status);
// registration key
// ==================================================================================
// registration information 
// $uid = 870023; //1
// $uid = 684686; //2
//$uid = 934889; //3 

// $fname = 'Enid'; 
// $mname = 'Angelo';
// $lname = 'Santiago';
// $gender = 'Male'; 
// $birthdate = '1995-10-02'; 
// $address = 'Bulacan, Bulacan'; 
// $contact = '0916653189';

// $portCont->userInformation($uid, $fname, $mname, $lname, $gender, $birthdate, $address, $contact);
// registration information
// ==================================================================================
// update registered information
//$uid = 870023; //1
//$uid = 684686; //2
//$uid = 934889; //3 

// $fname = 'Enid Dine'; 
// $mname = 'Angelo Olegna';
// $lname = 'Santiago Ogaitnas';
// $gender = 'Male'; 
// $birthdate = '1995-10-02'; 
// $address = 'Bulacan, Bulacan'; 
// $contact = '0916653189';

// $portCont->userInformationUpdate($fname, $mname, $lname, $gender, $birthdate, $address, $contact, $uid);
// ==================================================================================
// $uid = 870023; //1
// //$uid = 684686; //2
// //$uid = 934889; //3  
// $email = 'revcoreitsolution@gmail'; 
// $password = md5('admin');

// $userCredentials = $portCont->userLogin($email, $password, $uid);

// if(!empty($userCredentials)){

//     if($userCredentials[0]["designation"] == 1)
//     {
//       echo 'ADMIN';
//       echo $userCredentials[0]["user_id"];
//     }
//     else if($userCredentials[0]["designation"] == 2)
//     {
//       echo 'TEACHER';
//     }
//     else
//     {
//       echo 'STUDENT';
//     }

// }else{
//     echo 'NOTHING';
// }
// ==================================================================================
// $subject = 'GMRC'; 
// $grade = 1; 
// $subjcode = 'GM001'; 
// $time = '4:00 PM - 5:00 PM'; 
// $room = 'RM007';

// $portCont->subjectMatterAdd($grade, $subject, $subjcode, $time, $room);

// ==================================================================================

// $uid = 934889;

// $checkifinor = $portCont->schoolAttendanceValidation($uid); 

// if(!empty($checkifinor))
// {
//     echo 'Already In';
//     $portCont->schoolAttendanceTimeOut($uid); 
// }
// else
// {
//     echo 'Not In';
//     $portCont->schoolAttendanceTimeIn($uid); 

// }
// ==================================================================================

// $uid = 934889;
// $room = 'RM001';

// $checkifinor = $portCont->schoolWhereAboutValidation($uid, $room); 

// if(!empty($checkifinor))
// {
//     echo 'Already In';
//     $portCont->schoolWhereAboutTimeOut($uid, $room); 
// }
// else
// {
//     echo 'Not In';
//     $portCont->schoolWhereAboutTimeIn($uid, $room); 

// }
// ==================================================================================

// $uid = 934889; 
// $request = 'FORM 137';

// $requestCreation = $portCont->requestCreation($uid, $request); 
// ==================================================================================

// $portCont = new portalController();

// $userInformation = $portCont->getRequest();

// header('Content-Type: application/json');
// echo json_encode($userInformation);

// ==================================================================================

// $title = 'THIS IS A TEST ANNOUNCEMENT'; 
// $body = 'THIS IS A TEST TEMPLATE OF THE ANNOUNEMENT BODY';

// $announcementCreation = $portCont-> announcementCreation($title, $body)

// ==================================================================================
// $item = 'IPHONE 10 64 GB FULLYPAID';
// $foundby = 'EDIN SANTIAGO';
// $foundin = 'RM001';

// $lostCreation = $portCont-> lostCreation($item, $foundby, $foundin);

?>
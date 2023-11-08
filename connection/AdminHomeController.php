<?php 
include('connection/LoginSession.php');
require_once "connection/ApiController.php";
$portCont = new portalController();


$userSession = $portCont->getUserDetails($session_id);

if(!empty($_GET['uid'])){
    $uid = $_GET['uid'];
    $userSpecificDetails = $portCont->getSpecificDetails($uid);
    $grade = $userSpecificDetails[0]["level"];
    $subjectGrid = $portCont->subjectAssignedStudent($grade);
    $schoolAttendance = $portCont->schoolOverallAttendance($uid);
    $studentWhereabouts = $portCont->schoolOverallWhereAbout($uid);
   
    // include('api/get_user_specific_data.php');
} 

if(!empty($_GET['list']))
{
    $list = $_GET['list'];
    $master = $portCont->schoolMasterList($list); 
}

if(!empty($_GET['view']))
{
    if($_GET['view'] == 'myclasses')
    {
        $uid = $userSession[0]["uid"]; 
        $grade = $userSpecificDetails[0]["level"];
        $userSpecificDetails = $portCont->getSpecificDetails($uid);
        $subjectGrid = $portCont->subjectAssignedStudent($grade);
        $schoolAttendance = $portCont->schoolOverallAttendance($uid);
        $studentWhereabouts = $portCont->schoolOverallWhereAbout($uid);
    }
}


if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        
        case "security": 
        if(isset($_POST['security'])){
             $uid = $userSession[0]['uid']; 
             $email = $userSession[0]['email']; 
             $code = $_POST['code'];
             if(!empty($uid) && !empty($email) && !empty($code))
             {
                $validation = $portCont->userValidatesEmail($uid, $email, $code);
                if(!empty($validation))
                {
                    $portCont->userhasBeenValidated($uid, $email, $code); 
                    header('Location: home.php');
                }
                else
                {
                    header('Location: security.php');
                }
             }
        }
        break;   

        case "updaterequest":
            if(isset($_POST['update'])){
                $rid = $_POST['rid']; 
                $status = $_POST['status']; 
                if(!empty($rid) && !empty($status))
                {
                    $checkRequest = $portCont->validateRequest($rid); 
                    if(!empty($checkRequest))
                    {
                        $portCont->updateRequest($rid, $status); 
                        header('Location: home.php?view=request');
                    }
                }
            }
        break; 

        case "addrequest": 
            if(isset($_POST['add']))
            {
                $uid = $_POST['uid']; 
                $request = $_POST['request_type'];

                if(!empty($uid) && !empty($request))
                {
                    $portCont->requestCreation($uid, $request);
                    header('Location: home.php?view=request');
                }
            }

        break;

        case "addannouncement":
            if(isset($_POST['add']))
            {
                $title = $_POST['title'];
                $body = $_POST['body'];
                $start = $_POST['start'];
                $end = $_POST['end'];
                $photoName = $_FILES['photo']['name'];
                $photoTmpName = $_FILES['photo']['tmp_name'];


                if (!empty($title) && !empty($body) && !empty($start) && !empty($end) && !empty($photoName)) {
                    // Create a directory if it doesn't exist
                    $uploadDir = 'uploads'; // Set your desired upload directory
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
        
                    // Move the uploaded file to the directory
                    $photoPath = $uploadDir . '/' . $photoName;
                    move_uploaded_file($photoTmpName, $photoPath);
        
                    // Now you can use the $photoPath to store the image path in your database or further processing
                    // Perform any other necessary database operations
                    $portCont->announcementCreation($title, $body, $start, $end, $photoPath);
        
                    header('Location: home.php?view=announcement');
                }
            }
            break;

        case "addlost": 
            if(isset($_POST['add']))
            {
                $item = $_POST['item'];
                $foundby = $_POST['foundby'];
                $foundin = $_POST['foundin'];
                $status = $_POST['status'];
                $another = $_POST['another'];
                $photoName = $_FILES['photo']['name'];
                $photoTmpName = $_FILES['photo']['tmp_name'];

                if (!empty($item) && !empty($foundby) && !empty($foundin) && !empty($photoName) && !empty($status) && !empty($another)) {

                    $uploadDir = 'uploads'; // Set your desired upload directory
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
        
                    // Move the uploaded file to the directory
                    $photoPath = $uploadDir . '/' . $photoName;
                    move_uploaded_file($photoTmpName, $photoPath);
        
                    // Now you can use the $photoPath to store the image path in your database or further processing
                    // Perform any other necessary database operations
                    $portCont->lostCreation($item, $foundby, $foundin, $status, $another, $photoPath);
        
                    header('Location: home.php?view=lost');


                }
            }
            break;


            case "editlost": 
                if(isset($_POST['update']))
                {
                    $fid = $_POST['fid'];
                    $status = $_POST['status'];
                   
    
                    if (!empty($fid) && !empty($status)) {
     
                        $portCont->lostCreatedUpdate($fid, $status);
            
                        header('Location: home.php?view=lost');

                    }
                }
            break;

           case "updatelostInformation":
            if(isset($_POST['update']))
                {
                    $fid = $_POST['fid'];
                    $item = $_POST['item'];
                    $foundby = $_POST['foundby'];
                    $foundin = $_POST['foundin'];
    
                    if (!empty($fid) && !empty($item) && !empty($foundby) && !empty($foundin)) {
     
                        $portCont->lostCreatedUpdateInformation($fid, $item, $foundby, $foundin);
            
                        header('Location: home.php?view=lost');

                    }
                }

            

            case "addenrollment": 
                if(isset($_POST['add']))
                {
                    // $email = $_POST['email'];
                    // $fname = $_POST['fname'];
                    // $mname = $_POST['mname'];
                    // $lname = $_POST['lname'];
                    // $dob = $_POST['dob'];
                    // $address = $_POST['address'];
                    // $barangay = $_POST['barangay'];
                    // $city = $_POST['city'];
                    // $zip = $_POST['zip'];
                    // $enrollment_type = $_POST['enrollment_type'];
                    // $gwa = $_POST['gwa'];
                    // $level = $_POST['level'];

                    
                        $email = $_POST['email'];
                        $fname = $_POST['fname'];
                        $mname = $_POST['mname'];
                        $lname = $_POST['lname'];
                        $gender  = $_POST['gender'];
                        $dob = $_POST['dob'];
                        $address = $_POST['address'];
                        $region_text = $_POST['region_text'];
                        $province_text = $_POST['province_text'];
                        $city_text = $_POST['city_text'];
                        $barangay_text = $_POST['barangay_text'];


                    if (!empty($email) && !empty($fname) && !empty($mname) && !empty($lname) && !empty($gender) && !empty($dob) && !empty($address) && !empty($region_text) && !empty($province_text) && !empty($city_text) && !empty($barangay_text)) 
                    {

                        $portCont->createEnrolles($email,$fname,$mname,$lname,$gender,$dob,$address,$region_text,$province_text,$city_text,$barangay_text);   
                        header('Location: home.php?view=enrollment&message=SUCCESS');

                    }else {
                        header('Location: home.php?view=enrollment&message=ERROR');
                    }


                }
                break;

            case "updateEnrollment":
                if(isset($_POST['update']))
                {
                    $eid = $_POST['eid']; 
                    $status = $_POST['status']; 

                    if (!empty($eid) && !empty($status)) 
                    {
                        $checkingEnrollee = $portCont->checkEnrollee($eid);
                        if(!empty($checkingEnrollee)){
                        // $rand
                        $uid = rand(666666,999999);
                        $email = $checkingEnrollee[0]["email"]; 
                        $generate = $uid;
                        $password = md5($generate); 
                        $designation = 3;
                        $code = rand(6666,9999); 
                        $ave = $checkingEnrollee[0]["gen_ave"];
                        $level = $checkingEnrollee[0]["level"];
                        
                        $portCont->insertLoginEnrolle($uid, $email, $password, $designation, $code);
                        
                        $checkingOfSection = $portCont->checkSection($ave, $level); 

                            if(!empty($checkingOfSection)){
                            
                            $fname = $checkingEnrollee[0]["fname"]; 
                            $mname = $checkingEnrollee[0]["mname"]; 
                            $lname = $checkingEnrollee[0]["lname"]; 
                            $birthdate = $checkingEnrollee[0]["dob"]; 
                            $address = $checkingEnrollee[0]["address"] + ',' + $checkingEnrollee[0]["barangay"]  + ',' + $checkingEnrollee[0]["city"]  + ',' + $checkingEnrollee[0]["province"] + ',' + $checkingEnrollee[0]["region"]; 
                            $level = $checkingEnrollee[0]["level"]; 
                            $section = $checkingOfSection[0]["section"];
                            $portCont->addStudentHistory($uid, $level, $ave);
                            $portCont->updateStudentEnrollmentProfile($uid, $eid);
                            $portCont->insertUserInformation($uid, $fname, $mname, $lname, $birthdate, $address, $level, $section);
                            $portCont->updateEnrollee($status,$eid);
                            header('Location: home.php?view=enrollment');
                            }
                        }
                    }

                }
                break;

            case "generatemap":
                if(isset($_POST['generate']))
                {
                    $mid = $_POST['pieceIdInput']; 
                    $checkMap = $portCont->genMap($mid);
                    if(!empty($checkMap))
                    {
                        header('Location: home.php?view=map&mid='.$checkMap[0]["mid"]);
                       
                    }else
                    {
                        header('Location: home.php?view=map');
                    }
                  

                }
                break;

            case "addSubject":
                if(isset($_POST['add']))
                {
                    $grade = $_POST['grade'];
                    $subject = strtoupper($_POST['subject']);
                    // Get the first two letters of the subject
                    $subjectAbbreviation = substr($subject, 0, 2);
                    // Create the subject code
                    $subjectCode = $subjectAbbreviation . '00' . $grade;
                    $time = $_POST['time'];

                    if(!empty($grade) && !empty($subject) && !empty($subjectCode) && !empty($time))
                    {
                        $portCont->addSubject($grade, $subject, $subjectCode, $time);
                        header('Location: home.php?view=subject');
                    }
                    
                }
                break; 

            case "regenerate":
                if(isset($_POST['generate'])){
                    $uid = $userSession[0]['uid']; 
                    $email = $userSession[0]['email'];
                    $code = rand(6666,9999);
                    $portCont->userMailValidation($email, $uid, $code);
                    require "mail/verification.php";
                    header('Location: security.php');
                }
                break;

            case "evaluate":
                if(isset($_POST['evaluate'])){
                    $eid = $_POST['eid']; 
                    $level = $_POST['level'];
                    $portCont->updateEnrolleeLevel($level,$eid);
                    header('Location:home.php?view=evaluate&eid='.$eid);
                }
                break;

            case "genEval":
                if(isset($_POST['subject'])){
                    $subjects = $_POST['subject'];
                    $eid = $_POST['eid'];
                    $level = $_POST['level'];
                    $gen_ave = $_POST['gen_ave'];
                    $q1_values = $_POST['q1'];
                    $q2_values = $_POST['q2'];
                    $q3_values = $_POST['q3'];
                    $q4_values = $_POST['q4'];
                    $portCont->updateEnrolleeGwA($gen_ave,$eid);
                    for ($i = 0; $i < count($subjects); $i++) {

                        $subject = $subjects[$i];
                        $q1 = intval($q1_values[$i]);
                        $q2 = intval($q2_values[$i]);
                        $q3 = intval($q3_values[$i]);
                        $q4 = intval($q4_values[$i]);

                        $portCont->insertGradeHistory($eid,$level,$subject,$q1,$q2,$q3,$q4);
                        header('Location:home.php?view=evaluate&eid='.$eid);
                    }
                  
                }
                break;

            case "fullyRegisterAccountImage":

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['captured_image'])) {
                        $eid = $_POST['eid'];
                        $imageData = $_POST["captured_image"];
            
                        // Save the image to the upload folder
                        $target_dir = "uploads/";
                        
                        if (!file_exists($target_dir)) {
                            mkdir($target_dir, 0777, true);
                        }
                        $timestamp = time();
                        $new_filename = $timestamp . '_' . $code . '.jpg'; // You can adjust the file name as needed
                        $target_file = $target_dir . $new_filename;
            
                        if (file_put_contents($target_file, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData)))) {
                            // Successfully saved the image to the upload folder
                            // Now, save the file path to the database
                            $result = $portCont->fullyUseIdentification($eid, $target_file);
            
                            if ($result) {
                                header('Location: home.php?view=credentials&eid='.$eid);
                            } else {
                                 // Error uploading image
                                header('Location: home.php?view=credentials&eid='.$eid);
                            }
                        } else {
                             // Error uploading image
                              header('Location: home.php?view=credentials&eid='.$eid);
                        }
                    } else {
                        // File already exists
                        header('Location: home.php?view=credentials&eid='.$eid);
                    }
                } else {
                    // Invalid request method or no image file received
                    header('Location: home.php?view=credentials&eid='.$eid);
                }
                
                break;


                case "uploadDocument":
                    if (isset($_POST["submit"])) {
                        $eid = $_POST['eid'];
                        $targetDir = "documentUpload/";
                
                        // Check if the target directory exists, and create it if not
                        if (!is_dir($targetDir)) {
                            mkdir($targetDir, 0755, true); // 0755 is a common permission value
                        }
                
                        $targetFile = $targetDir.basename($_FILES["fileToUpload"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                
                        // Rest of your file upload validation and handling code...
                        
                        // If the file upload is successful, proceed with database insertion and redirection
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                            // Insert file information into the database (update this part to fit your needs)
                            $fileName = basename($_FILES["fileToUpload"]["name"]);
                            $portCont->fullyUploadDocumentSpecific($eid, $fileName, $targetFile);
                
                            // Redirect to another page
                            header('Location: home.php?view=credentials&eid=' . $eid);
                            exit; // Terminate the script to ensure the redirection takes place
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                    break;


                    case "addsection":
                        if(isset($_POST['addsection'])){
                            $min = $_POST['min'];
                            $max = $_POST['max']; 
                            $level = $_POST['level']; 
                            $section = $_POST['section']; 
                            if(!empty($min) && !empty($max) && !empty($level)  && !empty($section)){
                                $portCont->addSection($min, $max, $level, $section);
                                header('Location: home.php?view=enrollment');
                            }
                        }
                        break;


                        case "addteacher":
                            if(isset($_POST['add'])){
                                date_default_timezone_set('Asia/Manila');
                                $uid = rand(666666,999999);
                                $email = $_POST['email'];
                                $fname = $_POST['fname'];
                                $mname = $_POST['mname'];
                                $lname = $_POST['lname'];
                                $gender  = $_POST['gender'];
                                $dob = $_POST['dob'];
                                $addr = $_POST['address'];
                                $region_text = $_POST['region_text'];
                                $province_text = $_POST['province_text'];
                                $city_text = $_POST['city_text'];
                                $barangay_text = $_POST['barangay_text'];
                                
                                $address =  $addr . ', ' . $region_text . ', ' . $province_text . ', ' . $city_text . ', ' . $barangay_text;
        
                                if (!empty($email) && !empty($fname) && !empty($mname) && !empty($lname) && !empty($gender) && !empty($dob) && !empty($address)) 
                                {
                                    $designation = 2;
                                    $code = rand(6666,9999);
                                    $status = 'VALID';
                                    $date_created = date('Y-m-d');
                                    $password = 'ADMIN';
                                    $rpass = md5($password);
                                    $portCont->addCredentialsTeacher($uid, $email, $rpass, $designation, $code, $status, $date_created);
                                    $portCont->addInformationTeacher($uid, $fname, $mname, $lname, $gender, $dob, $address);
                                    header('Location: home.php?view=teacher');
                                }
                            }
                            break;


                            case "teacherSection":
                                if(isset($_POST['assign'])){
                                    $uid = $_POST['uid'];
                                    $sid = $_POST['sid'];

                                    if(!empty($uid) && !empty($sid)){
                                        $knowingLevel = $portCont->checkSectionLevel($sid);
                                        if(!empty($knowingLevel)){
                                            $level = $knowingLevel[0]['level']; 
                                            $section = $knowingLevel[0]['section']; 
                                            $portCont->assignTeacherSection($uid, $level, $section);
                                            header('Location: home.php?view=enrollment');
                                        }
                                    }
                                }
                                break;

                            case "addRoom":
                                if(isset($_POST['assign'])){
                                    $mid = $_POST['mid'];
                                    $room = $_POST['room'];
                                    $building = $_POST['building']; 

                                    if(!empty($mid) && !empty($room) && !empty($building)){
                                        $portCont->addRoomBuilding($mid, $room, $building);
                                        header('Location: home.php?view=map');
                                    }
                                }
                                break;


                            case "addyear":
                                if(isset($_POST['add'])){
                                    $yr1 = $_POST['yr1'];
                                    $yr2 = $_POST['yr2'];
                                    $gencode = rand(666666,999999);

                                    if(!empty($yr1) && !empty($yr2) && !empty($gencode)){
                                        $portCont->addYear($yr1, $yr2, $gencode);
                                        header('Location: home.php?view=year');
                                    }
                                }
                                break;

                            case "addsectionyear":
                                if(isset($_POST['add'])){
                                    $sycode = $_POST['sycode']; 
                                    $student_accepted = $_POST['student_accepted'];
                                    $min = $_POST['min'];
                                    $max = $_POST['max'];
                                    $level = $_POST['level'];
                                    $section = $_POST['section']; 

                                    if(!empty($sycode) && !empty($student_accepted) && !empty($min) && !empty($max) && !empty($level) && !empty($section)){
                                        $portCont->addYearSection($sycode, $student_accepted, $min, $max, $level, $section);
                                        header('Location: home.php?view=school_year_section&code='.$sycode.'&message=success');
                                    }else{
                                        header('Location: home.php?view=school_year_section&code='.$sycode.'&message=error');
                                    }
                                }
                
                

      }
    }

if(!empty($_GET['mid']))
{
    $mid = $_GET['mid'];
    $mapSpecificCall = $portCont->genMap($mid);
}

$oua = $portCont->totalRegisteredAdmin();
$out = $portCont->totalRegisteredTeacher();
$ous = $portCont->totalRegisteredStudent();

$studChart = $portCont->genderStatStudent();
$teachChart = $portCont->genderStatTeacher();

$requestStudentList = $portCont->StudentList();
$announcementInfor = $portCont->getAnnouncement(); 
$lostItem = $portCont->getFound();


$tl = $portCont->totalLost();
$ta = $portCont->totalAnnouncement();
$tr = $portCont->totalRequest();


?>
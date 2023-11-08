<?php
require_once "DBController.php";

class portalController extends DBController
{
    function registerUser($uid, $email, $password, $designation, $code, $status)
    {
        $query = "INSERT INTO user_login (uid,email,password,designation,code,status,date_created) VALUES (?,?,?,?,?,?,?)"; 

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $email
            ),
            array(
                "param_type" => "s",
                "param_value" => $password
            ),
            array(
                "param_type" => "i",
                "param_value" => $designation
            ),
            array(
                "param_type" => "i",
                "param_value" => $code
            ),
            array(
                "param_type" => "s",
                "param_value" => $status
            ),
            array(
                "param_type" => "s",
                "param_value" => date("Y-m-d")
            )  
        );
        $this->insertDB($query, $params);
    }

    function userLogin($password, $uid, $role)
    {
        $query = "SELECT * FROM user_login UL LEFT JOIN designation D ON UL.designation = D.id WHERE UL.password = ? AND UL.uid = ? AND D.role = ?";

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => $password
            ),array(
                "param_type" => "s",
                "param_value" => $uid
            ),array(
                "param_type" => "s",
                "param_value" => $role
            )
        );
        
        $userCredentials = $this->getDBResult($query, $params);
        return $userCredentials;
    }

    function userInformation($uid, $fname, $mname, $lname, $gender, $birthdate, $address, $contact, $level)
    {
        $query = "INSERT INTO user_information (uid, fname, mname, lname, gender, birthdate, address, contact, level) VALUES (?,?,?,?,?,?,?,?,?)";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $fname
            ),
            array(
                "param_type" => "s",
                "param_value" => $mname
            ),
            array(
                "param_type" => "s",
                "param_value" => $lname
            ),
            array(
                "param_type" => "s",
                "param_value" => $gender
            ),
            array(
                "param_type" => "s",
                "param_value" => $birthdate
            ),
            array(
                "param_type" => "s",
                "param_value" => $address
            ),
            array(
                "param_type" => "s",
                "param_value" => $contact
            ),
            array(
                "param_type" => "i",
                "param_value" => $level
            )
        );
        $this->insertDB($query, $params);
    }


    function userInformationUpdate($fname, $mname, $lname, $gender, $birthdate, $address, $contact, $level, $uid)
    {
        $query = "UPDATE user_information SET fname = ?, mname = ?, lname = ?, gender = ?, birthdate = ?,  address = ?, contact = ?, level = ? WHERE uid = ?";
        $params = array(  
            array(
                "param_type" => "s",
                "param_value" => $fname
            ),
            array(
                "param_type" => "s",
                "param_value" => $mname
            ),
            array(
                "param_type" => "s",
                "param_value" => $lname
            ),
            array(
                "param_type" => "s",
                "param_value" => $gender
            ),
            array(
                "param_type" => "s",
                "param_value" => $birthdate
            ),
            array(
                "param_type" => "s",
                "param_value" => $address
            ),
            array(
                "param_type" => "s",
                "param_value" => $contact
            ),
            array(
                "param_type" => "i",
                "param_value" => $level
            ),
            array(
                "param_type" => "s",
                "param_value" => $uid
            )
        );
        $this->updateDB($query, $params);
    }

    function getUserDetails($session_id){
         $query = "SELECT * FROM user_login UL LEFT JOIN designation D ON UL.designation = D.id WHERE UL.user_id = ?";

         $params = array(
            
            array(
                "param_type" => "i",
                "param_value" => $session_id
            )
        );
        
        $userCredentials = $this->getDBResult($query, $params);
        return $userCredentials;

    }

    function totalRegisteredAdmin()
    {
       
      $query = "SELECT COUNT(*) as total FROM user_login WHERE designation = 1";
      $registeredAdmin = $this->getDBResult($query);
      return $registeredAdmin;
       
    }

    function totalRegisteredTeacher()
    {
     
      $query = "SELECT COUNT(*) as total FROM user_login WHERE designation = 2";
      $registeredTeacher = $this->getDBResult($query);
      return $registeredTeacher;
    }

    function totalRegisteredStudent()
    {

       $query = "SELECT COUNT(*) as total FROM user_login WHERE designation = 3";
       $registeredStudent = $this->getDBResult($query);
       return $registeredStudent;

    }

    function RegisteredUser()
    {
         $query = "SELECT * FROM user_login UL LEFT JOIN designation D ON
          UL.designation = D.id  LEFT JOIN user_information UI ON UL.uid = UI.uid WHERE UL.designation = 3";        
         $overallUser = $this->getDBResult($query);
         return $overallUser;
        
    }

    function RegisteredUserTeacher()
    {
         $query = "SELECT * FROM user_login UL LEFT JOIN designation D ON
          UL.designation = D.id  LEFT JOIN user_information UI ON UL.uid = UI.uid WHERE UL.designation = 2";        
         $overallUser = $this->getDBResult($query);
         return $overallUser;
        
    }


    function getSpecificDetails($uid){
        $query = "SELECT * FROM user_login UL LEFT JOIN designation D ON
        UL.designation = D.id  LEFT JOIN user_information UI ON UL.uid = UI.uid WHERE UL.uid = ?";

        $params = array(
           
           array(
               "param_type" => "s",
               "param_value" => $uid
           )
       );
       
       $userSpecs = $this->getDBResult($query, $params);
       return $userSpecs;

   }

   function  addCredentialsTeacher($uid, $email, $rpass, $designation, $code, $status, $date_created)
   {
    $query = "INSERT INTO user_login (uid, email, password, designation, code, status, date_created) VALUES (?,?,?,?,?,?,?)";
    $params = array(
        array(
            "param_type" => "i",
            "param_value" => $uid
        ),  
        array(
            "param_type" => "s",
            "param_value" => $email
        ),
        array(
            "param_type" => "s",
            "param_value" => $rpass
        ),
        array(
            "param_type" => "s",
            "param_value" => $designation
        ),
        array(
            "param_type" => "i",
            "param_value" => $code
        ),
        array(
            "param_type" => "s",
            "param_value" => $status
        ),
        array(
            "param_type" => "s",
            "param_value" => $date_created
        )
    );
    $this->insertDB($query, $params);
   }


   function addInformationTeacher($uid, $fname, $mname, $lname, $gender, $dob, $address)
   {
    $query = "INSERT INTO user_information (uid, fname, mname, lname, gender, birthdate, address) VALUES (?,?,?,?,?,?,?)";
    $params = array(
        array(
            "param_type" => "i",
            "param_value" => $uid
        ),  
        array(
            "param_type" => "s",
            "param_value" => $fname
        ),
        array(
            "param_type" => "s",
            "param_value" => $mname
        ),
        array(
            "param_type" => "s",
            "param_value" => $lname
        ),
        array(
            "param_type" => "s",
            "param_value" => $gender
        ),
        array(
            "param_type" => "s",
            "param_value" => $dob
        ),
        array(
            "param_type" => "s",
            "param_value" => $address
        )
    );
    $this->insertDB($query, $params);
   }

   function subjectMatterAdd($grade, $subject, $subjcode, $time, $room)
    {
        $query = "INSERT INTO subject_matter (grade, subject, subjcode, time, room) VALUES (?,?,?,?,?)";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $grade
            ),  
            array(
                "param_type" => "s",
                "param_value" => $subject
            ),
            array(
                "param_type" => "s",
                "param_value" => $subjcode
            ),
            array(
                "param_type" => "s",
                "param_value" => $time
            ),
            array(
                "param_type" => "s",
                "param_value" => $room
            )
        );
        $this->updateDB($query, $params);
    }

    function subjectAssignedStudent($grade)
    {
        $query = "SELECT * FROM subject_matter WHERE grade = ?"; 
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $grade
            )
        );

       $subjectAssignedStudent = $this->getDBResult($query, $params);
       return $subjectAssignedStudent;

    }

    function schoolAttendanceTimeIn($uid)
    {

        date_default_timezone_set('Asia/Manila');

         $query = "INSERT INTO user_attendance (time_in, uid, date) VALUES (?,?,?)"; 
         
         $params = array(
            array(
                "param_type" => "s",
                "param_value" => date("Y-m-d h:i:s")
            ),
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => date("Y-m-d")
            )
        );

        $this->insertDB($query, $params);

    }


    function schoolAttendanceTimeOut($uid)
    {

        date_default_timezone_set('Asia/Manila');

        $query = "UPDATE user_attendance SET time_out = ? WHERE uid = ?"; 

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => date("Y-m-d h:i:s")
            ),
            array(
                "param_type" => "s",
                "param_value" => $uid
            )
        );

        $this->updateDB($query, $params);
    }

    function schoolAttendanceValidation($uid)
    {
        date_default_timezone_set('Asia/Manila');

        $query = "SELECT * FROM user_attendance WHERE uid = ? AND date = ?"; 

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => date("Y-m-d")
            )
        );

       $schoolVal = $this->getDBResult($query, $params);
       return $schoolVal;

    }

    function schoolOverallAttendance($uid)
    {
        $query = "SELECT * FROM user_attendance WHERE uid = ?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            )
        );

       $schoolAttendance = $this->getDBResult($query, $params);
       return $schoolAttendance;

    }

    function schoolWhereAboutTimeIn($uid, $room)
    {

        date_default_timezone_set('Asia/Manila');

         $query = "INSERT INTO school_whereabout (uid, time_in, room, date) VALUES (?,?,?,?)"; 
         
         $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => date("Y-m-d h:i:s")
            ),
            array(
                "param_type" => "s",
                "param_value" => $room
            ),
            array(
                "param_type" => "s",
                "param_value" => date("Y-m-d")
            )
        );

        $this->insertDB($query, $params);

    }

    function schoolWhereAboutTimeOut($uid, $room)
    {

        date_default_timezone_set('Asia/Manila');

        $query = "UPDATE school_whereabout SET time_out = ? WHERE uid = ? AND room = ?"; 

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => date("Y-m-d h:i:s")
            ),
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $room
            )
        );

        $this->updateDB($query, $params);
    }

    function schoolWhereAboutValidation($uid, $room)
    {
        date_default_timezone_set('Asia/Manila');

        $query = "SELECT * FROM school_whereabout WHERE uid = ? AND date = ? AND room = ?"; 

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => date("Y-m-d")
            ),
            array(
                "param_type" => "s",
                "param_value" => $room
            )
        );

       $schoolWhere = $this->getDBResult($query, $params);
       return $schoolWhere;

    }

    function schoolOverallWhereAbout($uid)
    {
        $query = "SELECT * FROM school_whereabout WHERE uid = ?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            )
        );

       $schoolWhere = $this->getDBResult($query, $params);
       return $schoolWhere;

    }

    function requestCreation($uid, $request)
    {
        date_default_timezone_set('Asia/Manila');

        $query = "INSERT INTO user_request (uid, request_type, date_requested, status) VALUES (?,?,?,?)";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $request
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d')
            ),
            array(
                "param_type" => "s",
                "param_value" => 'OPEN'
            )
        );

        $this->insertDB($query, $params);
    }

    function allTeacherList()
    {
        $query = "SELECT * FROM user_login UL LEFT JOIN user_information UI ON UL.uid = UI.uid WHERE UI.level = 0 AND UI.section = ''"; 
        $overallTeacher = $this->getDBResult($query);
        return $overallTeacher;
    }

    function sectionLegend()
    {
        $query = "SELECT * FROM section_legen SL"; 
        $overallSectionLegend = $this->getDBResult($query);
        return $overallSectionLegend;
    }

    function getRequest()
    {
        $query = "SELECT * FROM user_request UR LEFT JOIN user_information UI ON UR.uid = UI.uid"; 
        $overallRequest = $this->getDBResult($query);
        return $overallRequest;
    }

    function getSection()
    {
        $query = "SELECT * FROM section_legen"; 
        $overallSection = $this->getDBResult($query);
        return $overallSection;
    }

    function getSubject()
    {
        $query = "SELECT * FROM subject_matter"; 
        $overallSubject = $this->getDBResult($query);
        return $overallSubject;
    }

    function StudentList()
    {
        $query = "SELECT * FROM user_login UL LEFT JOIN user_information UI ON UL.uid = UI.uid WHERE UL.designation = 3"; 
        $overallStudentListForRequest = $this->getDBResult($query);
        return $overallStudentListForRequest;
    }

    function checkSectionLevel($sid)
    {
        $query = "SELECT * FROM section_legen WHERE sid = ?";

        $params = array(      
            array(
                "param_type" => "i",
                "param_value" => $sid
            )
        );

        $validateRequest = $this->getDBResult($query, $params);
        return $validateRequest;
    }

  


    function validateRequest($rid)
    {
        $query = "SELECT * FROM user_request WHERE rid = ?";

        $params = array(      
            array(
                "param_type" => "i",
                "param_value" => $rid
            )
        );

        $validateRequest = $this->getDBResult($query, $params);
        return $validateRequest;

    }

    function checkEnrollee($eid)
    {
        $query = "SELECT * FROM enrollment WHERE eid = ?";

        $params = array(      
            array(
                "param_type" => "i",
                "param_value" => $eid
            )
        );

        $enrolleValidated = $this->getDBResult($query, $params);
        return $enrolleValidated;
    }

    function subjectPerLevelList($level)
    {
        $query = "SELECT * FROM subject_matter WHERE grade = ?";

        $params = array(      
            array(
                "param_type" => "i",
                "param_value" => $level
            )
        );

        $enrolleValidated = $this->getDBResult($query, $params);
        return $enrolleValidated;
    }
    
    function insertGradeHistory($eid,$level,$subject,$q1,$q2,$q3,$q4)
    {
        $query = "INSERT INTO user_grading_history (eid, level, subject, q1, q2, q3, q4) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        // $query = "INSERT INTO announcement (title, body, date_created) VALUES (?,?,?)";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $eid
            ),
            array(
                "param_type" => "i",
                "param_value" => $level
            ),
            array(
                "param_type" => "s",
                "param_value" => $subject
            ),
            array(
                "param_type" => "i",
                "param_value" => $q1
            ),
            array(
                "param_type" => "i",
                "param_value" => $q2
            ),
            array(
                "param_type" => "i",
                "param_value" => $q3
            ),
            array(
                "param_type" => "i",
                "param_value" => $q4
            )
        );

        $this->insertDB($query, $params);
    }

    function updateRequest($rid, $status)
    {
        $query = "UPDATE user_request SET status = ? WHERE rid = ?"; 

        
        $params = array(      
            array(
                "param_type" => "s",
                "param_value" => $status
            ),
            array(
                "param_type" => "i",
                "param_value" => $rid
            )
        );
        
        $this->updateDB($query, $params);


    }


    function assignTeacherSection($uid, $level, $section) 
    {
        $query = "UPDATE user_information SET level = ?, section = ? WHERE uid = ?"; 

        
        $params = array(      
            array(
                "param_type" => "i",
                "param_value" => $level
            ),
            array(
                "param_type" => "s",
                "param_value" => $section
            ),
            array(
                "param_type" => "i",
                "param_value" => $uid
            )
        );
        
        $this->updateDB($query, $params);
    }

    function updateEnrolleeGwA($gen_ave,$eid)
    {
        $query = "UPDATE enrollment SET gen_ave = ? WHERE eid = ?"; 

        
        $params = array(      
            array(
                "param_type" => "i",
                "param_value" => $gen_ave
            ),
            array(
                "param_type" => "i",
                "param_value" => $eid
            )
        );
        
        $this->updateDB($query, $params);
    }

    function addRoomBuilding($mid, $room, $building)
    {
        $query = "INSERT INTO map_direction (mid, room, building) VALUES (?, ?, ?)";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $mid
            ),
            array(
                "param_type" => "s",
                "param_value" => $room
            ),
            array(
                "param_type" => "s",
                "param_value" => $building
            )
        );

        $this->insertDB($query, $params);
    }

    function announcementCreation($title, $body, $start, $end, $photoPath)
    {
        date_default_timezone_set('Asia/Manila');
        $query = "INSERT INTO announcement (title, body, start, end, image_path, date_created) 
        VALUES (?, ?, ?, ?, ?, ?)";
        // $query = "INSERT INTO announcement (title, body, date_created) VALUES (?,?,?)";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $title
            ),
            array(
                "param_type" => "s",
                "param_value" => $body
            ),
            array(
                "param_type" => "s",
                "param_value" => $start
            ),
            array(
                "param_type" => "s",
                "param_value" => $end
            ),
            array(
                "param_type" => "s",
                "param_value" => $photoPath
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d')
            )
        );

        $this->insertDB($query, $params);
    }


    function addSubject($grade, $subject, $subjectCode, $time)
    {
        $query = "INSERT INTO subject_matter (grade, subject, subjcode, time) 
        VALUES (?, ?, ?, ?)";
        // $query = "INSERT INTO announcement (title, body, date_created) VALUES (?,?,?)";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $grade
            ),
            array(
                "param_type" => "s",
                "param_value" => $subject
            ),
            array(
                "param_type" => "s",
                "param_value" => $subjectCode
            ),
            array(
                "param_type" => "s",
                "param_value" => $time
            )
        );

        $this->insertDB($query, $params);
    }

    function lostCreation($item, $foundby, $foundin, $status, $another, $photoPath)
    {
        date_default_timezone_set('Asia/Manila');

        $query = "INSERT INTO lostandfound (item, foundby, foundin, image_path, status, another, date) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $item
            ),
            array(
                "param_type" => "s",
                "param_value" => $foundby
            ),
            array(
                "param_type" => "s",
                "param_value" => $foundin
            ),
            array(
                "param_type" => "s",
                "param_value" => $photoPath
            ),
            array(
                "param_type" => "s",
                "param_value" => $status
            ),
            array(
                "param_type" => "s",
                "param_value" => $another
            ),     
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d')
            )
        );

        $this->insertDB($query, $params);

    }

    function getAnnouncement()
    {
        $query = "SELECT * FROM announcement ORDER BY 1 DESC"; 
        $overallAnnouncement = $this->getDBResult($query);
        return $overallAnnouncement;
    }


    // function lostCreation($item, $foundby, $foundin)
    // {
    //     date_default_timezone_set('Asia/Manila');

    //     $query = "INSERT INTO lostandfound (item, foundby, foundin, status, date) VALUES (?,?,?,?,?)";

    //     $params = array(
    //         array(
    //             "param_type" => "s",
    //             "param_value" => $item
    //         ),
    //         array(
    //             "param_type" => "s",
    //             "param_value" => $foundby
    //         ),
    //         array(
    //             "param_type" => "s",
    //             "param_value" => $foundin
    //         ),
    //         array(
    //             "param_type" => "s",
    //             "param_value" => 'OPEN'
    //         ),
    //         array(
    //             "param_type" => "s",
    //             "param_value" => date('Y-m-d')
    //         )
    //     );

    //     $this->insertDB($query, $params);
    // }


    function getFound()
    {
        $query = "SELECT * FROM lostandfound ORDER BY 1 DESC"; 
        $overallLost = $this->getDBResult($query);
        return $overallLost;
    }


    function totalLost()
    {
       
      $query = "SELECT COUNT(*) as total FROM lostandfound";
      $totalLost = $this->getDBResult($query);
      return $totalLost;
       
    }


    function totalAnnouncement()
    {
       
      $query = "SELECT COUNT(*) as total FROM announcement";
      $totalAnnouncement = $this->getDBResult($query);
      return $totalAnnouncement;
       
    }


    function totalRequest()
    {
       
      $query = "SELECT COUNT(*) as total FROM user_request";
      $totalRequest = $this->getDBResult($query);
      return $totalRequest;
       
    }
    

    function userMailValidation($email, $uid, $code)
    {
        date_default_timezone_set('Asia/Manila');
        $query = "INSERT INTO user_security (uid, email, code, status, date_created) VALUES (?,?,?,?,?)";
   
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $email
            ),
            array(
                "param_type" => "i",
                "param_value" => $code
            ),
            array(
                "param_type" => "s",
                "param_value" => 'UNUSED'
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d')
            )
        );

        $this->insertDB($query, $params);
    
    }


    
    function userValidatesEmail($uid, $email, $code)
    {
        $query = "SELECT * FROM user_security UL WHERE UL.uid = ? AND UL.email = ? AND UL.code = ?";

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $email
            ),array(
                "param_type" => "i",
                "param_value" => $code
            )
        );
        
        $userCredentials = $this->getDBResult($query, $params);
        return $userCredentials;
    }

    function userhasBeenValidated($uid, $email, $code)
    {
        $query = "UPDATE user_security UL SET status = ? WHERE UL.uid = ? AND UL.email = ? AND UL.code = ?";

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => 'USED'
            ),
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),array(
                "param_type" => "s",
                "param_value" => $email
            ),array(
                "param_type" => "i",
                "param_value" => $code
            )
        );
        
        $this->updateDB($query, $params);
    }


    function schoolMasterList($list)
    {
        $query = "SELECT * FROM user_login UL LEFT JOIN user_information UI ON UL.uid = UI.uid LEFT JOIN designation D ON UL.designation = D.id WHERE D.role = ?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $list
            )
        );


        $schoolList = $this->getDBResult($query, $params);
        return $schoolList;
    }

    function genderStatStudent()
    {
       
      $query = "SELECT COUNT(*) as total, UI.gender FROM user_login UL LEFT JOIN user_information UI ON UL.uid = UI.uid LEFT JOIN designation D ON UL.designation = D.id WHERE D.role = 'STUDENT' GROUP BY UI.gender";
      $totalStudentGenderPop = $this->getDBResult($query);
      return $totalStudentGenderPop;
       
    }

    function genderStatTeacher()
    {
       
      $query = "SELECT COUNT(*) as total, UI.gender FROM user_login UL LEFT JOIN user_information UI ON UL.uid = UI.uid LEFT JOIN designation D ON UL.designation = D.id WHERE D.role = 'TEACHER' GROUP BY UI.gender";
      $totalTeacherGenderPop = $this->getDBResult($query);
      return $totalTeacherGenderPop;
       
    }


    // function createEnrolles($email, $fname,$mname,$lname,$dob,$address,$barangay,$city,$zip,$enrollment_type,$gwa,$level) 
    function createEnrolles($email,$fname,$mname,$lname,$gender,$dob,$address,$region_text,$province_text,$city_text,$barangay_text)
    {

        date_default_timezone_set('Asia/Manila');

        $query = "INSERT INTO enrollment (email,fname,mname,lname,gender,dob,address,region,province,city,barangay,enrollment_type,gen_ave,level,status,date_created) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 

        $params = array(
                   
            array(
                "param_type" => "s",
                "param_value" => $email
            ),
            array(
                "param_type" => "s",
                "param_value" => $fname
            ),
            array(
                "param_type" => "s",
                "param_value" => $mname
            ),
            array(
                "param_type" => "s",
                "param_value" => $lname
            ),
            array(
                "param_type" => "s",
                "param_value" => $gender
            ),
            array(
                "param_type" => "s",
                "param_value" => $dob
            ),
            array(
                "param_type" => "s",
                "param_value" => $address
            ),
            array(
                "param_type" => "s",
                "param_value" => $region_text
            ),
            array(
                "param_type" => "s",
                "param_value" => $province_text
            ),
            array(
                "param_type" => "s",
                "param_value" => $city_text
            ),
            array(
                "param_type" => "s",
                "param_value" => $barangay_text
            ),
            array(
                "param_type" => "s",
                "param_value" => 'NULL'
            ),
            array(
                "param_type" => "i",
                "param_value" => 0
            ),
            array(
                "param_type" => "s",
                "param_value" => 0
            ),
            array(
                "param_type" => "s",
                "param_value" => 'NEW'
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d')
            )
        );
        $this->insertDB($query, $params);
    }

    function insertLoginEnrolle($uid, $email, $password, $designation, $code)
    {
        $query = "INSERT INTO user_login (uid,email,password,designation,code,status,date_created)
        VALUES (?,?,?,?,?,?,?)"; 

        $params = array(
                   
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $email
            ),
            array(
                "param_type" => "s",
                "param_value" => $password
            ),array(
                "param_type" => "s",
                "param_value" => $designation
            ),array(
                "param_type" => "s",
                "param_value" => $code
            ),
            array(
                "param_type" => "s",
                "param_value" => 'INVALID'
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d')
            )
        );
        $this->insertDB($query, $params);
    }

    function insertUserInformation($uid, $fname, $mname, $lname, $birthdate, $address, $level, $section)
    {
        $query = "INSERT INTO user_information (uid,fname,mname,lname,birthdate,address,level,section)
        VALUES (?,?,?,?,?,?,?,?)"; 

        $params = array(
                   
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $fname
            ),
            array(
                "param_type" => "s",
                "param_value" => $mname
            ),array(
                "param_type" => "s",
                "param_value" => $lname
            ),array(
                "param_type" => "s",
                "param_value" => $birthdate
            ),
            array(
                "param_type" => "s",
                "param_value" => $address
            ),
            array(
                "param_type" => "s",
                "param_value" => $level
            ),
            array(
                "param_type" => "s",
                "param_value" => $section
            )
        );
        $this->insertDB($query, $params);
    }

    function allEnrolledList()
    {
       
      $query = "SELECT * FROM enrollment WHERE status = 'NEW'";
      $allEnroll = $this->getDBResult($query);
      return $allEnroll;
       
    }

    function addSection($min, $max, $level, $section)
    {

        $query = "INSERT INTO section_legen (min,max,level,section)
        VALUES (?,?,?,?)"; 

        $params = array(
                   
            array(
                "param_type" => "i",
                "param_value" => $min
            ),
            array(
                "param_type" => "i",
                "param_value" => $max
            ),
            array(
                "param_type" => "i",
                "param_value" => $level
            ),array(
                "param_type" => "s",
                "param_value" => $section
            )
        );
        $this->insertDB($query, $params);

    }


    function updateStudentEnrollmentProfile($uid, $eid)
    {
        $query = "UPDATE enrollment SET uid = ? WHERE eid = ?";

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "i",
                "param_value" => $eid
            )
        );
        
        $this->updateDB($query, $params);
    }


    function fullyUseIdentification($eid, $target_file)
    {

        $query = "INSERT INTO user_image (eid,image) VALUES (?,?)"; 

        $params = array(
                   
            array(
                "param_type" => "i",
                "param_value" => $eid
            ),
            array(
                "param_type" => "s",
                "param_value" => $target_file
            )
        );
        $this->insertDB($query, $params);

    }


    function identifactionFull($eid)
    {
        $query = "SELECT * FROM user_image WHERE eid = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $eid
            )
        );


        $imageCheck = $this->getDBResult($query, $params);
        return $imageCheck;
    }

     function fullyUploadDocumentSpecific($eid, $file_name, $targetFile)
     {
        $query = "INSERT INTO user_uploaded_files (eid,file_name,file_path) VALUES (?,?,?)"; 

        $params = array(
                   
            array(
                "param_type" => "i",
                "param_value" => $eid
            ),array(
                "param_type" => "s",
                "param_value" => $file_name
            ),
            array(
                "param_type" => "s",
                "param_value" => $target_file
            )
        );
        $this->insertDB($query, $params);
     }


    function allPreApprovedEnrolledList()
    {
       
      $query = "SELECT * FROM enrollment WHERE status = 'APPROVED'";
      $allEnroll = $this->getDBResult($query);
      return $allEnroll;
       
    }

    function preRequisite($eid)
    {
        $query = "SELECT * FROM user_uploaded_files WHERE eid = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $eid
            )
        );


        $documentCheck = $this->getDBResult($query, $params);
        return $documentCheck;
    }

    function updateEnrollee($status,$eid)
    {
        $query = "UPDATE enrollment SET status = ? WHERE eid = ?";

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => $status
            ),
            array(
                "param_type" => "i",
                "param_value" => $eid
            )
        );
        
        $this->updateDB($query, $params);
    }

    function updateEnrolleeLevel($level,$eid)
    {
        $query = "UPDATE enrollment SET level = ? WHERE eid = ?";

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => $level
            ),
            array(
                "param_type" => "i",
                "param_value" => $eid
            )
        );
        
        $this->updateDB($query, $params);
    }

    function checkSection($ave, $level)
    {
        $query = "SELECT * FROM section_legen WHERE level = ? AND ? >= min AND ? <= max";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $level
            ),
            array(
                "param_type" => "i",
                "param_value" => $ave
            ),
            array(
                "param_type" => "i",
                "param_value" => $ave
            )
        );


        $sectionCheck = $this->getDBResult($query, $params);
        return $sectionCheck;
    }


    function personalInformation($uid)
    {
        date_default_timezone_set('Asia/Manila');
        $query = "SELECT * FROM user_information UI LEFT JOIN user_attendance UA ON UI.uid = UA.uid WHERE UI.uid = ? AND UA.date = ?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d')
            )
        );


        $schoolList = $this->getDBResult($query, $params);
        return $schoolList;
    }

    function genMap($mid)
    {
   
        $query = "SELECT * FROM map_direction WHERE mid = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $mid
            )
        );


        $schoolRoom = $this->getDBResult($query, $params);
        return $schoolRoom;
    }

    function getMapOverall()
    {
        $query = "SELECT * FROM map_direction";
        $allMap = $this->getDBResult($query);
        return $allMap;
    }

    function saveTokenToDatabase($user_id, $token)
    {
        date_default_timezone_set('Asia/Manila');

        $query = "INSERT INTO remember_me_tokens (user_id,token,expiration_date)
        VALUES (?,?,?)"; 

        $params = array(
                   
            array(
                "param_type" => "i",
                "param_value" => $user_id
            ),
            array(
                "param_type" => "s",
                "param_value" => $token
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d H:i:s', strtotime('+30 days'))
            )
        );
        $this->insertDB($query, $params);
    }
    
    function checkExistence($uid, $email)
    {
        $query = "SELECT * FROM user_login WHERE uid = ? AND email = ?"; 

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $email
            )
        );


        $forgotValid = $this->getDBResult($query, $params);
        return $forgotValid;
    }


    function insertForgotten($uids, $generate_code, $status)
    {
        date_default_timezone_set('Asia/Manila');

        $query = "INSERT INTO forgot_account (uid,code,status,date_generated)
        VALUES (?,?,?,?)"; 

        $params = array(       
            array(
                "param_type" => "s",
                "param_value" => $uids
            ),
            array(
                "param_type" => "i",
                "param_value" => $generate_code
            ),
            array(
                "param_type" => "s",
                "param_value" => $status
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d')
            )
        );
        $this->insertDB($query, $params);
    }

    function checkForgotten($uid)
    {
        $query = "SELECT ul.email, fa.code, ul.uid FROM forgot_account fa LEFT JOIN user_login ul ON fa.uid = ul.uid WHERE fa.uid = ?"; 

        $params = array(
             
            array(
                "param_type" => "s",
                "param_value" => $uid
            )
        );

        
        $checkAccountForgot = $this->getDBResult($query, $params);
        return $checkAccountForgot;

    }


    function updatePassword($password, $uid, $email)
    {
        $query = "UPDATE user_login SET password = ? WHERE uid = ? AND email = ?"; 

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => $password
            ),
            array(
                "param_type" => "s",
                "param_value" => $uid
            ),
            array(
                "param_type" => "s",
                "param_value" => $email
            )
        );
        
        $this->updateDB($query, $params);
    }


    function getUserIdFromToken($token)
    {
        $query = "SELECT * FROM remember_me_tokens WHERE token = ?"; 

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $token
            )
        );


        $tokenVal = $this->getDBResult($query, $params);
        return $tokenVal;
    }

    function lostCreatedUpdate($fid, $status)
    {
        $query = "UPDATE lostandfound SET status = ? WHERE fid = ?"; 

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => $status
            ),
            array(
                "param_type" => "s",
                "param_value" => $fid
            )
        );
        
        $this->updateDB($query, $params);  
    }


    function lostCreatedUpdateInformation($fid, $item, $foundby, $foundin)
    {
        $query = "UPDATE lostandfound SET item = ?, foundby = ?,  foundin = ?  WHERE fid = ?"; 

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => $item
            ),array(
                "param_type" => "s",
                "param_value" => $foundby
            ),array(
                "param_type" => "s",
                "param_value" => $foundin
            ),
            array(
                "param_type" => "i",
                "param_value" => $fid
            )
        );
        
        $this->updateDB($query, $params);
    }

    function addStudentHistory($uid, $level, $ave)
    {
        date_default_timezone_set('Asia/Manila');
        $query = "INSERT INTO user_student_history (uid, level, ave, date_update) VALUES (?,?,?,?)"; 
        $params = array(    
            array(
                "param_type" => "i",
                "param_value" => $uid
            ),array(
                "param_type" => "i",
                "param_value" => $level
            ),array(
                "param_type" => "i",
                "param_value" => $ave
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d')
            )
        );
        
        $this->updateDB($query, $params);
    }


    function addYear($yr1, $yr2, $gencode)
    {
        date_default_timezone_set('Asia/Manila');
        $query = "INSERT INTO school_year (yr1, yr2, gencode, date_created) VALUES (?,?,?,?)"; 
        $params = array(    
            array(
                "param_type" => "s",
                "param_value" => $yr1
            ),array(
                "param_type" => "s",
                "param_value" => $yr2
            ),array(
                "param_type" => "i",
                "param_value" => $gencode
            ),
            array(
                "param_type" => "s",
                "param_value" => date('Y-m-d')
            )
        );
        
        $this->insertDB($query, $params);
    }

    function getYear()
    {
        $query = "SELECT * FROM school_year";
        $allYear= $this->getDBResult($query);
        return $allYear;
    }


    function addYearSection($sycode, $student_accepted, $min, $max, $level, $section)
    {
        $query = "INSERT INTO section_legen (sycode, student_accepted, min, max, level, section) VALUES (?,?,?,?,?,?)"; 
        $params = array(    
            array(
                "param_type" => "i",
                "param_value" => $sycode
            ),array(
                "param_type" => "i",
                "param_value" => $student_accepted
            ),array(
                "param_type" => "i",
                "param_value" => $min
            ),array(
                "param_type" => "i",
                "param_value" => $max
            ),array(
                "param_type" => "i",
                "param_value" => $level
            ),
            array(
                "param_type" => "s",
                "param_value" => $section
            )
        );
        
        $this->insertDB($query, $params);
    }

    function sectionForSchoolYear($sycode)
    {
        $query = "SELECT * FROM section_legen WHERE sycode = ?"; 

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $sycode
            )
        );


        $sectionLeg = $this->getDBResult($query, $params);
        return $sectionLeg;
    }
    
    function sectionForSchoolYearMasterList($sid)
    {
        $query = "SELECT * FROM user_information UI LEFT JOIN section_legen SL ON UI.section  = SL.section AND UI.level = SL.level WHERE SL.sid = ?"; 

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $sid
            )
        );


        $sectionMaster = $this->getDBResult($query, $params);
        return $sectionMaster;
    }

}
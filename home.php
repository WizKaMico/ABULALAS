
<?php include('connection/AdminHomeController.php'); ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Abulalas Elementary School | Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-grid.css">
  <link rel="stylesheet" href="https://unpkg.com/ag-grid-community/dist/styles/ag-theme-alpine.css">
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css'>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/main.css">


</head>
<body>
<!-- partial:index.partial.html -->
<div class="app">
  <header>
    <div class="logo">
    <!-- <div class="nav-trigger hidden-M"> -->
      <img src="logo/logo.png"  style="max-width: 70%; height: auto;" />
    <!-- </div> -->
    </div>
    
    
    <div class="right-links visible-M">
    <a href="logout.php" style="text-decoration:none; color:white;"><i class="fas fa-sign-out-alt" style="font-size:30px;"></i></a>
    </div>
  </header>
  <div class="body">
    <nav class="side-nav">
      <ul>
      <?php if($userSession[0]["designation"] == 1) { ?>
        <li class="label">Main</li>
        <li class="active"><i class="fas fa-columns"></i><a href="home.php?view=home" style="text-decoration:none; color:white;">Dashboard</a></li>
        <li><i class="fas fa-edit"></i><a href="home.php?view=request" style="text-decoration:none; color:white;">Student Request</a></li>
        <li><i class="fas fa-user-graduate"></i><a href="home.php?view=enrollment" style="text-decoration:none; color:white;">Enrollment</a></li>
        <li><i class="fa fa-desktop"></i><a href="home.php?view=monitoring" style="text-decoration:none; color:white;">Accounts</a></li>
        <li><i class="fa fa-desktop"></i><a href="home.php?view=teacher" style="text-decoration:none; color:white;">Teacher Accounts</a></li>
        <li><i class="fa fa-book"></i><a href="home.php?view=subject" style="text-decoration:none; color:white;">Subject</a></li>
        <li><i class="fa fa-bullhorn"></i><a href="home.php?view=announcement" style="text-decoration:none; color:white;">Announcement</a></li>
        <li><i class="fa fa-question-circle"></i><a href="home.php?view=lost" style="text-decoration:none; color:white;">Lost & Found</a></li>
        <?php } else if($userSession[0]["designation"] == 2) { ?>
        <li class="label">Main</li>
        <li class="active"><i class="fas fa-columns"></i><a href="home.php?view=home" style="text-decoration:none; color:white;">Dashboard</a></li>
        <li><i class="fas fa-user"></i><a href="home.php?view=myclass&list=student" style="text-decoration:none; color:white;">My Student</a></li>
        <li><i class="fa fa-question-circle"></i><a href="home.php?view=lost" style="text-decoration:none; color:white;">Lost & Found</a></li>
        <?php } else { ?>
        <li class="label">Main</li>
        <li class="active"><i class="fas fa-columns"></i><a href="home.php?view=home" style="text-decoration:none; color:white;">Dashboard</a></li>
        <li><i class="fas fa-edit"></i><a href="home.php?view=request" style="text-decoration:none; color:white;">Student Request</a></li>
        <li><i class="fas fa-user"></i><a href="home.php?view=myclasses&uid=<?php echo $userSession[0]["uid"]; ?>" style="text-decoration:none; color:white;">My Class</a></li>  
        <li><i class="fa fa-question-circle"></i><a href="home.php?view=lost" style="text-decoration:none; color:white;">Lost & Found</a></li>
        <?php } ?>
      </ul>
    </nav>
    <?php if($userSession[0]["designation"] == 1) { ?>
    <div class="content">
        <?php if(!empty($_GET['view'])) { ?>
        <?php if($_GET['view'] == 'home') { ?>
        <?php include('pages/home.php'); ?>
        <?php } else if($_GET['view'] == 'details') { ?>
        <?php include('pages/details.php'); ?>    
        <?php } else if($_GET['view'] == 'request') { ?>
        <?php include('pages/request.php'); ?>  
        <?php } else if($_GET['view'] == 'lost') { ?>
        <?php include('pages/lost.php'); ?>   
        <?php } else if($_GET['view'] == 'monitoring') { ?>
        <?php include('pages/monitoring.php'); ?>     
        <?php } else if($_GET['view'] == 'subject') { ?>
         <?php include('pages/subject.php'); ?>     
        <?php } else if($_GET['view'] == 'announcement') { ?>
        <?php include('pages/announcement.php'); ?>  
        <?php } else if($_GET['view'] == 'masterlist') { ?>
        <?php include('pages/masterlist.php'); ?>  
        <?php } else if($_GET['view'] == 'enrollment') { ?>
        <?php include('pages/enrollment.php'); ?>  
        <?php } else if($_GET['view'] == 'chart') { ?>
        <?php include('pages/chart.php'); ?> 
        <?php } else if($_GET['view'] == 'map') { ?>
        <?php include('pages/map.php'); ?> 
        <?php } else if($_GET['view'] == 'evaluate') { ?>
        <?php include('pages/evaluate.php'); ?>   
        <?php } else if($_GET['view'] == 'credentials') { ?>
        <?php include('pages/credentials.php'); ?> 
        <?php } else if($_GET['view'] == 'teacher') { ?>
        <?php include('pages/teacher.php'); ?> 
        <?php } else {  ?>
        <?php include('pages/home.php'); ?>
        <?php } ?>     
        <?php }else{ ?>
        <?php include('pages/home.php'); ?>
        <?php } ?>
    </div>
    <?php } else if($userSession[0]["designation"] == 2) { ?>
    <div class="content">
      <?php if(!empty($_GET['view'])) { ?>
      <?php if($_GET['view'] == 'home') { ?>
      <?php include('pages/teacher-home.php'); ?>
      <?php } else if($_GET['view'] == 'myclass') { ?>
      <?php include('pages/teacher-class.php'); ?>
      <?php } else if($_GET['view'] == 'details') { ?>
      <?php include('pages/teacher-details.php'); ?>
      <?php } else if($_GET['view'] == 'lost') { ?>
      <?php include('pages/lost.php'); ?>
      <?php }else{ ?>

      <?php } ?>
      <?php }else{ ?>
      <?php include('pages/teacher-home.php'); ?>
      <?php } ?> 
    </div>
    <?php } else { ?>
      <div class="content">
      <?php if(!empty($_GET['view'])) { ?>
      <?php if($_GET['view'] == 'home') { ?>
      <?php include('pages/student-home.php'); ?>
      <?php } else if($_GET['view'] == 'myclasses') { ?>
      <?php include('pages/student-class.php'); ?>
      <?php } else if($_GET['view'] == 'details') { ?>
      <?php include('pages/student-details.php'); ?>
      <?php } else if($_GET['view'] == 'lost') { ?>
      <?php include('pages/lost.php'); ?>
      <?php } else if($_GET['view'] == 'request') { ?>
        <?php include('pages/request.php'); ?>  
      <?php }else{ ?>

      <?php } ?>
      <?php }else{ ?>
      <?php include('pages/student-home.php'); ?>
      <?php } ?> 
    </div>
    <?php } ?>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/ag-grid-enterprise@30.0.6/dist/ag-grid-enterprise.min.js"></script>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script src="js/home-aggrid.js"></script>
  <script  src="js/main.js"></script>
  <script src="js/tabs.js"></script>
  <script src="js/image_verif.js"></script>
  <script src="js/ph-address-selector.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js'></script>


<?php if($userSession[0]["designation"] == 1) { ?>
  <?php if(!empty($_GET['view'])) { ?>
  <?php if($_GET['view'] == 'details'){ ?>    
  <script src="js/specific_qr.js"></script>
  
  <script>
  var gridStat = <?php echo json_encode($subjectGrid); ?>;
  </script>
  <script src="js/detail-subject-aggrid.js"></script>
  <script>
  var gridAttend = <?php echo json_encode($schoolAttendance); ?>;
  </script>
  <script src="js/detail-attendance-aggrid.js"></script>
  <script>
  var gridWhere = <?php echo json_encode($studentWhereabouts); ?>;
  </script>
  <script src="js/detail-whereabouts-aggrid.js"></script>
  <script src="js/calendar-event.js"></script>
  <?php } else if($_GET['view'] == 'teacher'){ ?>  
    <script src="js/home-teacher-aggrid.js"></script> 
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const createTeacherBtn = document.getElementById('createTeacherBtn');
      const modal = document.getElementById('CreateNewTeacherModal'); // Use the correct modal ID

      // Add a click event listener to the button
      createTeacherBtn.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>
  <?php include('modal/teacher-add.php'); ?>
  <?php } else if($_GET['view'] == 'request'){ ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const createRequestBtn = document.getElementById('createRequestBtn');
      const modal = document.getElementById('CreateNewRequest'); // Use the correct modal ID

      // Add a click event listener to the button
      createRequestBtn.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>
  <?php include('modal/request-add.php'); ?>
  <?php include('modal/request-edit.php'); ?>
  <script src="js/request-request-aggrid.js"></script>
  <?php } else if($_GET['view'] == 'announcement'){?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const createAnnouncementBtn = document.getElementById('createAnnouncementBtn');
      const modal = document.getElementById('CreateNewAnnouncement'); // Use the correct modal ID

      // Add a click event listener to the button
      createAnnouncementBtn.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>
   <?php include('modal/announcement-add.php'); ?>
   <script src="js/announcement-slider.js"></script>
  <script src="js/announce-announce-aggrid.js"></script>
  <script src="js/announce-calendar.js"></script>
  <?php } else if($_GET['view'] == 'subject'){?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const createSubjectBtn = document.getElementById('createSubjectBtn');
      const modal = document.getElementById('CreateNewSubject'); // Use the correct modal ID

      // Add a click event listener to the button
      createSubjectBtn.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>

  <script src="js/subject-aggrid.js"></script>
  <?php include('modal/subject-add.php'); ?>


  <?php } else if($_GET['view'] == 'lost'){?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const createLostBtn = document.getElementById('createLostBtn');
      const modal = document.getElementById('CreateNewLost'); // Use the correct modal ID

      // Add a click event listener to the button
      createLostBtn.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>   
   <script src="js/announcement-slider.js"></script>
  <?php include('modal/lost-add.php'); ?>
  <?php include('modal/lost-edit.php'); ?>
  <?php include('modal/lost-update.php'); ?>
  <script src="js/lost-lost-aggrid.js"></script>
  <?php } else if($_GET['view'] == 'masterlist'){?>
  <script>
  var masterlist = <?php echo json_encode($master); ?>;
  console.log(masterlist + 'newest')
  </script>
  <script src="js/masterlist-aggrid.js"></script> 
  <?php } else if($_GET['view'] == 'chart'){?>
 
  <script>
  var studentChart = <?php echo json_encode($studChart); ?>;
  console.log(studentChart)
  var teacherChart = <?php echo json_encode($teachChart); ?>;
  console.log(teacherChart)
  </script>
  <script src="js/chart-StatChart.js"></script>  
  <?php } else if($_GET['view'] == 'enrollment'){?>
    <script>
    // JavaScript
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the buttons and modals
      const createEnrollBtn = document.getElementById('createEnrollBtn');
      const createEvalEnrollBtn = document.getElementById('createEvalEnrollBtn');
      const createSectionBtn = document.getElementById('createSectionBtn');
      const createRoomBtn = document.getElementById('createRoomBtn');


      
      const createEnrollmentModal = document.getElementById('CreateEnrollment');
      const createEvalEnrollmentModal = document.getElementById('CreateEvalEnrollment');
      const createSectionModal = document.getElementById('createSectionModal');
    const createRoomModal = document.getElementById('CreateRoomModal');

      // Add click event listeners to open the modals
      createEnrollBtn.addEventListener('click', () => {
        createEnrollmentModal.style.display = 'block';
      });

      createEvalEnrollBtn.addEventListener('click', () => {
        createEvalEnrollmentModal.style.display = 'block';
      });

      createSectionBtn.addEventListener('click', () => {
        createSectionModal.style.display = 'block';
    });

    createRoomBtn.addEventListener('click', () => {
        createRoomModal.style.display = 'block';
    });

      // Add click event listeners to close the modals when clicking outside
      window.addEventListener('click', function(event) {
        if (event.target === createEnrollmentModal) {
          createEnrollmentModal.style.display = 'none';
        }
        if (event.target === createEvalEnrollmentModal) {
          createEvalEnrollmentModal.style.display = 'none';
        }
      });

      window.addEventListener('click', function(event) {
        if (event.target === createSectionModal) {
            createSectionModal.style.display = 'none';
        }
        if (event.target === createRoomModal) {
            createRoomModal.style.display = 'none';
        }
    });

    });


  </script>  
    <?php include('modal/enrollment-edit.php'); ?>
   <?php include('modal/enrollment-add.php'); ?>
   <script src="js/enrollment-apporovedlist.js"></script> 
   <script src="js/enrollment-enrollmentlist.js"></script> 
   <script src="js/enrollment-sectionlist.js"></script> 

 
  <?php } else if($_GET['view'] == 'map') { ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const createRoomBtn = document.getElementById('createRoomBtn');
      const modal = document.getElementById('CreateNewRoomModal'); // Use the correct modal ID

      // Add a click event listener to the button
      createRoomBtn.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>  
  <?php include('modal/map-add.php'); ?>
  <script src="js/map.js"></script> 
  <script src="js/map-detailedmap-aggrid.js"></script>
  <?php if(!empty($_GET['mid'])) { ?>
  <script>
  var specMap = <?php echo json_encode($mapSpecificCall); ?>;
  console.log(specMap)
  </script>
  <script src="js/map-specmap-aggrid.js"></script>
  <?php } ?>
  <?php } ?> 
  <?php } ?>
  <?php } else if($userSession[0]["designation"] == 2) { ?>
  <?php if(!empty($_GET['view'])) { ?>
  <?php if($_GET['view'] == 'home'){?>
  <script src="js/announcement-slider.js"></script>
  <script src="js/announce-calendar.js"></script>
  <?php } else if ($_GET['view'] == 'myclass'){?>
  <script>
  var masterlist = <?php echo json_encode($master); ?>;
  console.log(masterlist + 'newest')
  </script>
  <script src="js/masterlist-aggrid.js"></script> 
  <?php } else if ($_GET['view'] == 'lost'){?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const createLostBtn = document.getElementById('createLostBtn');
      const modal = document.getElementById('CreateNewLost'); // Use the correct modal ID

      // Add a click event listener to the button
      createLostBtn.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>   
   <script src="js/announcement-slider.js"></script>
  <?php include('modal/lost-add.php'); ?>
  <script src="js/lost-lost-aggrid.js"></script>

  <?php } else if ($_GET['view'] == 'details'){?>
  <script src="js/specific_qr.js"></script>
  <script>
  var gridStat = <?php echo json_encode($subjectGrid); ?>;
  </script>
  <script src="js/detail-subject-aggrid.js"></script>
  <script>
  var gridAttend = <?php echo json_encode($schoolAttendance); ?>;
  </script>
  <script src="js/detail-attendance-aggrid.js"></script>
  <script>
  var gridWhere = <?php echo json_encode($studentWhereabouts); ?>;
  </script>
  <script src="js/detail-whereabouts-aggrid.js"></script>
  <script src="js/calendar-event.js"></script>
  <?php } else { ?>
  <script src="js/announcement-slider.js"></script>
  <script src="js/announce-calendar.js"></script>
  <?php } ?>
  <?php } else { ?>
  <script src="js/announcement-slider.js"></script>
  <script src="js/announce-calendar.js"></script>
  <?php } ?>
  <?php } else { ?>
  
  <?php if(!empty($_GET['view'])) { ?>
    <?php if($_GET['view'] == 'home'){?>
  <script src="js/announcement-slider.js"></script>
  <script src="js/announce-calendar.js"></script>
  <?php } else if ($_GET['view'] == 'myclasses'){?>
  <script src="js/specific_qr.js"></script>
  <script>
  var gridStat = <?php echo json_encode($subjectGrid); ?>;
  </script>
  <script src="js/detail-subject-aggrid.js"></script>
  <script>
  var gridAttend = <?php echo json_encode($schoolAttendance); ?>;
  </script>
  <script src="js/detail-attendance-aggrid.js"></script>
  <script>
  var gridWhere = <?php echo json_encode($studentWhereabouts); ?>;
  </script>
  <script src="js/detail-whereabouts-aggrid.js"></script>
  <script src="js/calendar-event.js"></script>
  <?php } else if($_GET['view'] == 'request'){ ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const createRequestBtn = document.getElementById('createRequestBtn');
      const modal = document.getElementById('CreateNewRequestSpecific'); // Use the correct modal ID

      // Add a click event listener to the button
      createRequestBtn.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>
  <?php include('modal/request-add.php'); ?>
  <script src="js/student-request-request-aggrid.js"></script>

  <?php } else if ($_GET['view'] == 'lost'){?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get references to the button and modal
      const createLostBtn = document.getElementById('createLostBtn');
      const modal = document.getElementById('CreateNewLost'); // Use the correct modal ID

      // Add a click event listener to the button
      createLostBtn.addEventListener('click', () => {
        // Display the modal
        modal.style.display = 'block';
      });

      // Add a click event listener to close the modal when clicking outside of it
      window.addEventListener('click', function(event) {
        if (event.target === modal) {
          modal.style.display = 'none';
        }
      });
    });

  </script>   
   <script src="js/announcement-slider.js"></script>
  <?php include('modal/lost-add.php'); ?>
  <script src="js/lost-lost-aggrid.js"></script>


  <?php } else { ?>
  <script src="js/announcement-slider.js"></script>
  <script src="js/announce-calendar.js"></script>
  <?php } ?>
  <?php } else { ?>
  <script src="js/announcement-slider.js"></script>
  <script src="js/announce-calendar.js"></script>
  <?php if(!empty($_GET['view']) == 'myclasses'){ ?>

  <script src="js/detail-whereabouts-aggrid.js"></script>
  <script src="js/calendar-event.js"></script>

  <?php } ?>
  <?php } ?>
  <?php } ?>

</body>
</html>

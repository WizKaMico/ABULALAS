<?php include('connection/LoginController.php'); ?>

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
  <link rel="stylesheet" href="css/main.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Update the placeholder based on the selected role
            $("select[name='role']").change(function() {
                var selectedRole = $(this).val();
                if (selectedRole === "ADMIN") {
                    $("input[name='uid']").attr("placeholder", "UID (Admin)");
                } else if (selectedRole === "TEACHER") {
                    $("input[name='uid']").attr("placeholder", "UID (Teacher)");
                } else if (selectedRole === "STUDENT") {
                    $("input[name='uid']").attr("placeholder", "LRN (Student)");
                }
            });
        });
    </script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="app">
  <header>
    <div class="logo">
      <img src="logo/logo.png"  style="max-width: 75%; margin-top:-5px; height: auto;" />
    </div>
  
    <div class="right-links visible-M">

    </div>
  </header>
  <div class="body">
    <div class="content">
        <?php if(!empty($_GET['view'])) { ?>
        <?php if($_GET['view'] == 'login') { ?>
        <?php include('pages/login.php'); ?>
        <?php } else if($_GET['view'] == 'forgot') { ?>
        <?php include('pages/forgot.php'); ?>
        <?php } else if($_GET['view'] == 'renew') { ?>
        <?php include('pages/renew.php'); ?>
        <?php } else {  ?>
        <?php include('pages/login.php'); ?>
        <?php } ?>     
        <?php }else{ ?>
        <?php include('pages/login.php'); ?>
        <?php } ?>
    </div>
  </div>
</div>
<!-- partial -->
  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/ag-grid-enterprise@30.0.6/dist/ag-grid-enterprise.min.js"></script>
  <script src="js/home-aggrid.js"></script>
  <script  src="js/main.js"></script>


</body>
</html>

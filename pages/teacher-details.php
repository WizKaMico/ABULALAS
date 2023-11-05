<div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <div class="content-with-shadow">
                <h4 style="text-align:center">QR DETAILS</h4>
                <hr />
                <center><div id="qrCodeContainer"></div></center>
                </div>
            </div>

            <div class="col-md-6">
                <div class="content-with-shadow">
                <h4 style="text-align:center">PERSONAL DETAILS</h4>
                  <hr />
                  <p style="text-align: left; font-size:13px;"><b>FULLNAME</b> : <?php echo strtoupper($userSpecificDetails[0]["lname"]); echo ', '; echo strtoupper($userSpecificDetails[0]["fname"]); echo ' '; echo strtoupper($userSpecificDetails[0]["mname"]); ?></p>
                  <p style="text-align: left; font-size:13px;"><b>EMAIL</b> : <?php echo strtoupper($userSpecificDetails[0]["email"]); ?></p>
                  <p style="text-align: left; font-size:13px;"><b>BIRTHDAY</b> : <?php echo strtoupper($userSpecificDetails[0]["birthdate"]); ?></p>
                  <p style="text-align: left; font-size:13px;"><b>GENDER</b> : <?php echo strtoupper($userSpecificDetails[0]["gender"]); ?></p>
                  <p style="text-align: left; font-size:13px;"><b>ADDRESS</b> : <?php echo strtoupper($userSpecificDetails[0]["address"]); ?></p>
                  <p style="text-align: left; font-size:13px;"><b>ROLE</b> : <?php echo strtoupper($userSpecificDetails[0]["role"]); ?></p>

                </div>
            </div>
        </div>

        <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
               <div class="content-with-shadow">

               <?php if($userSpecificDetails[0]["designation"] == '3'){ ?>
              <?php include('pages/tabs/student-tab.php'); ?>
              <?php } else if($userSpecificDetails[0]["designation"] == '2'){ ?>
              <?php include('pages/tabs/teacher-tab.php'); ?>
              <?php } else { ?>
              <?php } ?>  

               </div>
            </div>
        </div>





        <style>

                        /* Style the tab */
            .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            }

            /* Style the buttons inside the tab */
            .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
            background-color: #ddd;
            }

            /* Create an active/current tablink class */
            .tab button.active {
            background-color: #ccc;
            }

            /* Style the tab content */
            .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
            }

            table {
              border-collapse: collapse;
              width: 100%;
            }
            th, td {
              border: 1px solid #dddddd;
              text-align: center;
              padding: 8px;
            }
            th {
              background-color: #f2f2f2;
            }
            .highlight-today {
              background-color: blue;
              color: white;
            }
            .no-school {
              background-color: red;
              color: white;
            }

        </style>
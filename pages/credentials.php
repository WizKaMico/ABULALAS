<div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["email"]); ?></h1>
          </div>
       </div>
    </div>
       
    <div class="row" style="margin-top:20px;">
        <div class="col-md-6">
          <div class="content-with-shadow">
              <h1 style="text-align:center;">STUDENT IMAGE</h1>
                <hr />
                <?php  
                $eid = $_GET['eid'];
                $checkImageExistence = $portCont->identifactionFull($eid);
                if(empty($checkImageExistence)){
                ?>
                   <div id="camera-container">
                        <img id="captured-image" style="display: none; width:100%;">
                        <hr />
                        <video id="camera-preview" style="width:100%;" autoplay></video>
                        <button id="start-camera" class="btn btn-primary btn-block btn-lg">STEP 1 : Allow Camera</button>
                        <hr />
                        <button id="capture-image" class="btn btn-primary btn-block btn-lg">STEP 2 : Capture Image</button>
                        <hr />
                        <button id="retry-capture" class="btn btn-primary btn-block btn-lg">STEP 3 : Retry Capture</button>
                    </div>
                    <form id="image-form" method="POST" action="home.php?action=fullyRegisterAccountImage" enctype="multipart/form-data">
                        <input type="hidden" name="captured_image" id="captured-image-input">
                        <input type="file" accept="image/*" capture="camera" id="image-upload" name="image" style="display:none;">
                        <input type="text" name="eid" value="<?php echo $_GET['eid']; ?>" style="display:none;">
                        <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                        <hr />
                        <div class="input-wrapper">
                            <button type="submit" id="submit-image" class="btn btn-primary btn-block btn-lg">COMPLETE</button>
                        </div>
                    </form>
                <?php } else { ?>
                  <center>
                    <img src="<?php echo $checkImageExistence[0]['image']; ?>" style="width:100%; height:auto;">
                  </center>
                <?php } ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="content-with-shadow">
              <h1 style="text-align:center;">STUDENT CREDENTIALS</h1>
              <hr />     
              <form action="home.php?action=uploadDocument&view=credentials" method="POST" enctype="multipart/form-data">
               <input type="text" name="eid" value="<?php echo $_GET['eid']; ?>" style="display:none;">
                <input type="file" name="fileToUpload" class="form-control" style="padding: 5px;" id="fileToUpload" placeholder="Select File:" required=""/>
                <input type="submit" value="Upload File" class="btn btn-primary btn-block btn-lg" name="submit">
             </form>     
             <hr />
             <div style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FILENAME</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $eid = $_GET['eid'];
                    $allCoReq = $portCont->preRequisite($eid); 
                    if (!empty($allCoReq)) {
                        foreach ($allCoReq as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $allCoReq[$key]['id']; ?></td>
                            <td><?php echo $allCoReq[$key]['file_name']; ?></td>
                        </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>



    <style>

           /* Make the table responsive */
           table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        /* Style the table header cells */
        th {
            background-color: #f2f2f2;
        }

        /* Add responsive design for small screens */
        @media screen and (max-width: 600px) {
            table, tr, th, td {
                display: block;
            }

            th {
                text-align: left;
            }

            tr {
                margin-bottom: 10px;
            }

            th, td {
                border: none;
            }
        }

    </style>

   
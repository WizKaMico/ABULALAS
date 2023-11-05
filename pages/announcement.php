<div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["email"]); ?></h1>
          </div>
       </div>
    </div>

      <div class="row" style="margin-top:20px;">
         <div class="col-md-12">
          <div class="content-with-shadow">
                <img src="image/images.jfif" style="width:100%;">
           </div>
          </div>
        </div>

        <div class="row" style="margin-top:20px;">
         <div class="col-md-6">
          <div class="content-with-shadow">
          
          <iframe src="./pages/slider_auth/announcement/index.php" style="width:100%; height:600px;border:none;" scrolling="no"></iframe>

           </div>
          </div>

         <div class="col-md-6">
          <div class="content-with-shadow">
          <div id="calendar"></div>
          </div>
        </div>

        </div>


        <div class="row" style="margin-top:20px;">
         <div class="col-md-12">
          <div class="content-with-shadow">
          <button id="createAnnouncementBtn">CREATE NEW ANNOUNCEMENT</button>
               <!-- Table -->
               <input type="text" class="form-control" id="search-input" placeholder="Search..."> 
                <hr />
               <div id="gridAnnouncement" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>

           </div>
          </div>
        </div>

        


        <style>/* Slideshow container */
            
          
            #createAnnouncementBtn {
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }

            #createAnnouncementBtn:hover {
            background-color: #0056b3;
            }


          
            #calendar {
                width: 50%;
                margin: 0 auto;
            }
        </style>

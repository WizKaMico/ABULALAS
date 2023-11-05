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
          <button id="createLostBtn">CREATE NEW LOST ITEM</button>
               <!-- Table -->
               <input type="text" class="form-control" id="search-input" placeholder="Search..."> 
                <hr />
             <div id="gridLost" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
          <div class="col-md-6">
          <div class="content-with-shadow">
              <iframe src="./pages/slider_auth/lost/index.php" style="width:100%; height:500px;border:none;"></iframe>
           </div>
          </div>
        </div>

   


        <style>



      #createLostBtn {
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      #createLostBtn:hover {
        background-color: #0056b3;
      }

     </style>
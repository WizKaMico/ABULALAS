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
          <button id="createSchYearBtn">CREATE SCHOOL YEAR (SY)</button>
               <!-- Table -->
               <input type="text" class="form-control" id="search-input" placeholder="Search..."> 
                <hr />
               <div id="gridYear" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>

           </div>
          </div>
        </div>

        


        <style>/* Slideshow container */
            
          
            #createSchYearBtn {
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }

            #createSchYearBtn:hover {
            background-color: #0056b3;
            }

        </style>

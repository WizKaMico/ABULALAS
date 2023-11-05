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
          <button id="createRequestBtn">CREATE NEW REQUEST</button>
                     <!-- Table -->
              <input type="text" class="form-control" id="search-input" placeholder="Search..."> 
                <hr />
             <div id="gridRequest" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
           </div>
          </div>
        </div>



        <style>

          

        #createRequestBtn {
          margin-bottom: 20px;
          padding: 10px 20px;
          background-color: #007bff;
          color: white;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        #createRequestBtn:hover {
          background-color: #0056b3;
        }


        </style>
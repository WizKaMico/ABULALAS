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
          <button id="createEnrollBtn">CREATE NEW ENROLLEE</button>
          <button id="createEvalEnrollBtn">EVALUATE ENROLLEE</button>
          <button id="createSectionBtn">ADD SECTION</button>
          <button id="createRoomBtn">ASSIGN TEACHER</button>


                     <!-- Table -->
                     <?php include('pages/tabs/enrollment-tab.php'); ?> 
          
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
          

#createEnrollBtn {
  margin-bottom: 20px;
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#createEnrollBtn:hover {
  background-color: #0056b3;
}

#createEvalEnrollBtn {
  margin-bottom: 20px;
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#createEvalEnrollBtn:hover {
  background-color: #0056b3;
}

#createSectionBtn {
  margin-bottom: 20px;
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#createSectionBtn:hover {
  background-color: #0056b3;
}


#createRoomBtn {
  margin-bottom: 20px;
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#createRoomBtn:hover {
  background-color: #0056b3;
}


</style>
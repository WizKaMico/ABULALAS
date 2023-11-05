<div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["email"]); ?></h1>
          </div>
       </div>
    </div>

    <div class="row" style="margin-top:20px;">
       <div class="col-md-4">
         <div class="content-with-shadow">
               <h1>GOOGLE MAP</h1>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.4475032652695!2d120.76205277511104!3d14.856234685660946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396510412e50b5d%3A0x75ed0b16e8d99e02!2sAbulalas%20Elementary%20School!5e0!3m2!1sfil!2sph!4v1693048633230!5m2!1sfil!2sph" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
       </div>
       <div class="col-md-4">
         <div class="content-with-shadow">
               <h1>MAP SPECIFIC</h1>
               <div id="gridMapSpec" class="ag-theme-alpine" style="width: 100%; height: 300px;"></div>
          </div>
       </div>
       <div class="col-md-4">
         <div class="content-with-shadow">
             <h1>SCHOOL MAP</h1>
             <div id="puzzle-container"></div>
          </div>
       </div>
    </div>

    <div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
               <h1>MAP ROOMS AND BUILDINGS</h1>
               <hr />
               <button id="createRoomBtn">CREATE NEW ROOM</button>
               <div id="gridMap" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
          </div>
       </div>
    </div>


    <!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div id="modalContent" class="custom-modal-content">
      <hr />
      <form action="home.php?view=map&action=generatemap" method="POST">
      <input type="hidden" name="pieceIdInput" id="pieceIdInput" readonly>
      <button type="submit" name="generate">GENERATE</button> 
      </form>
  

    </div>
  </div>
</div>

    <style>
/* Modal styles */

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

/* Styles for the modal */
button[type="submit"] {
    width: 100%;
  margin-top: 10px;
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}

.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

/* Styles for the modal content */
.modal-content {
  background-color: #fff;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-55%, -55%);
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  width: 80%;
  max-width: 400px;
}

/* Close button for the modal */
.close {
  color: #aaa;
  float: right;
  font-size: 20px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}


/* Puzzle container */
#puzzle-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(3, 1fr);
  gap: 2px;
  border: 1px solid #000;
  width: 100%; /* Set container dimensions */
  height: 300px;
}

/* Puzzle piece */
.puzzle-piece {
  border: 1px solid #000;
  width: 100%; /* Adjust the dimensions */
  height: 100%; /* Adjust the dimensions */
  background-size: 600px 600px; /* Adjust this based on your container dimensions */
  cursor: pointer;
}

</style>
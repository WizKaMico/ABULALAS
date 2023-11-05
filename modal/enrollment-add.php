


<!-- The Modal -->
<div id="CreateEnrollment" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <form id="statusForm" method="POST" action="home.php?view=enrollment&action=addenrollment">
    
    <label for="statusSelect">Email:</label>
    <input type="text" id="statusSelect" name="email" />

    <label for="statusSelect">Firstname:</label>
    <input type="text" id="statusSelect" name="fname" />
     
    <label for="statusSelect">Middlename:</label>
    <input type="text" id="statusSelect" name="mname" />

    <label for="statusSelect">Lastname:</label>
    <input type="text" id="statusSelect" name="lname" />
     
    <label for="statusSelect">Date of Birth:</label>
    <input type="date" id="statusSelect" name="dob" />

    <label for="statusSelect">Gender:</label>
    <select name="gender" class="statusSelect">
      <option value="MALE">MALE</option>
      <option value="FEMALE">FEMALE</option>
    </select>

    <label for="statusSelect">Address:</label>
    <input type="text" id="statusSelect" name="address" />

    <label for="statusSelect">Region:</label>
    <select name="region" class="statusSelect" id="region"></select>
    <input type="hidden" class="form-control" name="region_text" id="region-text" required>

    <label for="statusSelect">Province:</label>
    <select name="province" class="statusSelect" id="province"></select>
    <input type="hidden" class="form-control" name="province_text" id="province-text" required>

    <label for="statusSelect">City:</label>
    <select name="city"  class="statusSelect" id="city"></select>
    <input type="hidden"  class="form-control" name="city_text" id="city-text" required>

    <label for="statusSelect">Barangay:</label>
    <select name="barangay"  class="statusSelect" id="barangay"></select>
    <input type="hidden"  class="form-control" name="barangay_text" id="barangay-text" required>

      <button type="submit" name="add">REGISTER</button>
    
    </form>
  </div>
</div>



<!-- The Modal -->
<div id="CreateEvalEnrollment" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <form id="statusForm" method="POST" action="home.php?view=evaluate&action=evaluate">
    <label for="statusSelect">Choose New Enrollee To Evaluate:</label>
      <select name="eid" id="statusSelect">
         <?php    
          $allEnrolledList = $portCont->allEnrolledList(); 
          if(!empty($allEnrolledList)){
          foreach ($allEnrolledList as $key => $value) {
          ?> 
         <option value="<?php echo $allEnrolledList[$key]['eid']; ?>"><?php echo $allEnrolledList[$key]['lname']; ?>,<?php echo $allEnrolledList[$key]['fname']; ?><?php echo $allEnrolledList[$key]['mname']; ?></option>
         <?php } } ?>
      </select>
       <hr />
      <label for="statusSelect">Grade Level:</label>
      <select id="statusSelect" name="level">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
      </select>


      <button type="submit" name="evaluate">EVALUATE</button>
    
    </form>
  </div>
</div>


<div id="createSectionModal" class="modal">
  <div class="modal-content">
    <form id="statusForm" method="POST" action="home.php?view=enrollment&action=addsection">
    
    <label for="statusSelect">MIN:</label>
    <input type="number" id="statusSelect" name="min" />

    <label for="statusSelect">MAX:</label>
    <input type="number" id="statusSelect" name="max" />
     
    <label for="statusSelect">LEVEL:</label>
      <select id="statusSelect" name="level">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
      </select>
      
      <label for="statusSelect">SECTION:</label>
      <input type="text" id="statusSelect" name="section" />
      
      <button type="submit" name="addsection">ADD SECTION</button>
    </form>
  </div>
</div>

<div id="CreateRoomModal" class="modal">
  <div class="modal-content">
   <form id="statusForm" method="POST" action="home.php?view=enrollment&action=teacherSection">
    <label for="statusSelect">Choose New Teacher To Assign:</label>
      <select name="uid" id="statusSelect">
         <?php    
          $allTeacherList = $portCont->allTeacherList(); 
          if(!empty($allTeacherList)){
          foreach ($allTeacherList as $key => $value) {
          ?> 
         <option value="<?php echo $allTeacherList[$key]['uid']; ?>"><?php echo $allTeacherList[$key]['lname']; ?>,<?php echo $allTeacherList[$key]['fname']; ?><?php echo $allTeacherList[$key]['mname']; ?></option>
         <?php } } ?>
      </select>
       <hr />
      <label for="statusSelect">Grade Level & Section:</label>
      <select id="statusSelect" name="sid">
      <?php    
          $allSectionLegend = $portCont->sectionLegend(); 
          if(!empty($allSectionLegend)){
          foreach ($allSectionLegend as $key => $value) {
      ?> 
        <option value="<?php echo $allSectionLegend[$key]['sid']; ?>">GRADE : <?php echo $allSectionLegend[$key]['level']; ?> | SECTION : <?php echo $allSectionLegend[$key]['section']; ?></option>
      <?php } } ?> 
      </select>


      <button type="submit" name="assign">ASSIGN</button>
    
    </form>
  </div>
</div>

<style>
/* Styles for the form and dropdown */
#statusForm {
  margin-top: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

select {
  width: 100%;
  padding: 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}


input[type="text"],input[type="date"],input[type="file"],input[type="number"] {
  width: 100%;
  padding: 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

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


/* Styles for the modal */
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
  top: 55%;
  transform: translate(-55%, -55%);
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  width: 90%;
  max-width: 600px;
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


</style>


















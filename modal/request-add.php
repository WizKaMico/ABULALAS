
<!-- The Modal -->
<div id="CreateNewRequest" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
  <h2>Add Request</h2>
    <form id="statusForm" method="POST" action="home.php?view=request&action=addrequest">
    
    <label for="statusSelect">Student :</label>
      <select id="statusSelect" name="uid">
        <?php if(!empty($requestStudentList)){ ?>
        <?php foreach ($requestStudentList as $list) {  ?>
        <option value="<?php echo $list['uid']; ?>"><?php echo $list['lname']; ?>, <?php echo $list['fname']; ?> <?php echo $list['mname']; ?> (<?php echo $list['uid']; ?>)</option>
        <?php } } ?>
      </select>
      <hr />
      <label for="statusSelect">Request Type:</label>
      <select id="statusSelect" name="request_type">
        <option value="REPORT OF GRADE">REPORT OF GRADE</option>
        <option value="ENROLLMENT">ENROLLMENT</option>
        <option value="GOOD MORAL">GOOD MORAL</option>
        <option value="FORM 137">FORM 137</option>
      </select>
      <button type="submit" name="add">CREATE REQUEST</button>
    
    </form>
  </div>
</div>



<div id="CreateNewRequestSpecific" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
  <h2>Add Request</h2>
    <form id="statusForm" method="POST" action="home.php?view=request&action=addrequest">
    
    
      <input type="hidden" name="uid" value="<?php echo strtoupper($userSession[0]["uid"]); ?>" readonly=""/>
      <label for="statusSelect">Request Type:</label>
      <select id="statusSelect" name="request_type">
        <option value="REPORT OF GRADE">REPORT OF GRADE</option>
        <option value="ENROLLMENT">ENROLLMENT</option>
        <option value="GOOD MORAL">GOOD MORAL</option>
        <option value="FORM 137">FORM 137</option>
      </select>
      <button type="submit" name="add">CREATE REQUEST</button>
    
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
</style>


















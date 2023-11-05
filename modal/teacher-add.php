<!-- The Modal -->
<div id="CreateNewTeacherModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
  <form id="statusForm" method="POST" action="home.php?view=teacher&action=addteacher">
    
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

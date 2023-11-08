


<!-- The Modal -->
<div id="CreateNewYear" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
  <h2>Add School Year</h2>
    <form id="statusForm" method="POST"  enctype="multipart/form-data" action="home.php?view=year&action=addyear">
    <label for="statusSelect">FROM:</label>
    <input type="date" id="startYear" name="yr1" />
    <label for="statusSelect">END:</label>
    <input type="date" id="endYear" name="yr2" readonly=""/>

    <button type="submit" name="add">CREATE SCHOOL YEAR</button>
    
    </form>
  </div>
</div>

<script>
  const startYearInput = document.getElementById("startYear");
  const endYearInput = document.getElementById("endYear");

  // Add an event listener to the startYear input to detect changes
  startYearInput.addEventListener("change", function() {
    const selectedYear = new Date(this.value).getFullYear();
    
    // Increment the year by 1 and set it in the endYear input
    endYearInput.value = (selectedYear + 1) + "-01-01";
  });
</script>

<style>
/* Styles for the form and dropdown */
select {
  width: 100%;
  padding: 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}



#statusForm {
  margin-top: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"],input[type="date"],input[type="file"] {
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


















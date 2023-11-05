<div id="CreateNewRoomModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
  <form id="statusForm" method="POST" action="home.php?view=map&action=addRoom">
    <label for="statusSelect">Mid</label>
      <select name="mid" id="statusSelect">
         <option value="1">BUILDING 1</option>
         <option value="2">BUILDING 2</option>
         <option value="3">BUILDING 3</option>
         <option value="4">BUILDING 4</option>
         <option value="5">BUILDING 5</option>
         <option value="6">BUILDING 6</option>
         <option value="7">BUILDING 7</option>
         <option value="8">BUILDING 8</option>
         <option value="9">BUILDING 9</option>
      </select>
       <hr />
      <label for="statusSelect">ROOM</label>
      <input type="text" id="statusSelect" name="room" />

      <label for="statusSelect">BUILDING</label>
      <input type="text" id="statusSelect" name="building" />

      <button type="submit" name="assign">ADD</button>
    
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

<div class="row" style="margin-top:20px; display: flex; justify-content: center; align-items: center;">
    <div class="col-md-12">
        <div class="content-with-shadow" style="background-color:#eece32;">
        <center>
                <form method="POST" action="scanner.php?action=validate">
                <input type="text" name="uid" placeholder="UID" class="rounded-input">
                </form>
        </center>
       </div>
   </div>
   <?php if(!empty($personal)) { ?>
   <div class="col-md-12" style="margin-top:50px;">
                <div class="content-with-shadow">
                <h4 style="text-align:center">WELCOME TO ABULALAS ELEMENTARY SCHOOL</h4>
                  <hr />
                  <p style="text-align: left; font-size:13px;"><b>FULLNAME</b> : <?php echo strtoupper($personal[0]["lname"]); echo ', '; echo strtoupper($personal[0]["fname"]); echo ' '; echo strtoupper($personal[0]["mname"]); ?></p>
                  <p style="text-align: left; font-size:13px;"><b>GRADE</b> : <?php echo strtoupper($personal[0]["level"]); ?></p>
                  <p style="text-align: left; font-size:13px;"><b>TIME-IN</b> : <?php echo strtoupper($personal[0]["time_in"]); ?></p>
                  <p style="text-align: left; font-size:13px;"><b>TIME-OUT</b> : <?php echo strtoupper($personal[0]["time_out"]); ?></p>
                </div>
    </div>
   <?php } ?>
</div>

<style>
.rounded-input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 20px; /* Increased border radius for more rounded edges */
    border: 1px solid #ccc;
    justify-content: center;
     align-items: center;
     display: flex;
}
</style>
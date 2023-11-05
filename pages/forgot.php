
<div class="row" style="margin-top:20px; display: flex; justify-content: center; align-items: center;">
        <div class="col-md-3">
            <div class="content-with-shadow" style="background-color:#eece32;">
             <center>
                <img src="logo/main.png" style="width:50%; display: flex; justify-content: center; align-items: center;" />
                <br />
                <br />
                <form method="POST" action="index.php?view=forgot&action=forgot">
                <input type="text" name="uid" placeholder="UID" class="rounded-input">
                <input type="text" name="email" placeholder="Email" class="rounded-input">
                <button class="rounded-button" name="validate">Validate</button>
                <form>
             </center>
            </div>
        </div>
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

.rounded-button {
    padding: 10px 20px;
    background-color: black;
    width: 100%;
    border: none;
    color: white;
    border-radius: 20px; /* Increased border radius for more rounded edges */
    cursor: pointer;
    justify-content: center;
     align-items: center;
     display: flex;
}

</style>

<div class="row" style="margin-top:20px; display: flex; justify-content: center; align-items: center;">
        <div class="col-md-3">
            <div class="content-with-shadow" style="background-color:#eece32;">
             <center>
                <img src="logo/main.png" style="width:50%; display: flex; justify-content: center; align-items: center;" />
                <h1>HI! <?php echo strtoupper($userSession[0]["email"]); ?></h1>
                <form method="POST" action="home.php?action=security">
                    <input type="number" name="code" placeholder="4-digit Code" class="rounded-input">
                    <button class="rounded-button" name="security">Validate</button>
                </form>
                <hr />
                <form method="POST" action="security.php?action=regenerate"> 
                  <button class="rounded-button" name="generate">New Code</button>      
                </form>
             </center>
            </div>
        </div>
    </div>

<style>

    /* Base styling for the <h1> element */
    h1 {
            font-size: 20px;
            margin-bottom: 20px;
            margin-top: 10px;
            text-align: center; /* Center the text on all screen sizes */
        }

        /* Media query for screens smaller than 768px */
        @media (max-width: 768px) {
            h1 {
                font-size: 18px; /* Adjust font size for smaller screens */
            }
        }

        /* Media query for screens smaller than 480px */
        @media (max-width: 480px) {
            h1 {
                font-size: 16px; /* Adjust font size for even smaller screens */
            }
        }
  
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
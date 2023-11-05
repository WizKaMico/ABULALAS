    <div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["email"]); ?></h1>
          </div>
       </div>
    </div>
       
       <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <div class="content-with-shadow">
                   <div class="icon-container">
                        <i class="fas fa-users" style="font-size:100px;"></i>
                        <div class="number"><?php echo $oua[0]['total']; ?></div>
                    </div>
                    <a href="home.php?view=masterlist&list=student" style="text-decoration:none;"><h1 style="text-align:center;">Total no. of Students</h1></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-with-shadow">
                   <div class="icon-container">
                      <i class="fas fa-chalkboard-teacher" style="font-size:100px;"></i>
                      <div class="number"> <?php echo $out[0]['total']; ?></div>
                    </div>
                    <a href="home.php?view=masterlist&list=teacher" style="text-decoration:none;"><h1 style="text-align:center;">Total no. of Teacher</h1></a>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
            <div class="content-with-shadow">
                   <div class="icon-container">
                      <i class="fas fa-chart-pie" style="font-size:100px;"></i>
                    </div>
                    <a href="home.php?view=chart" style="text-decoration:none;"><h1 style="text-align:center;">Charts & Statistics</h1></a>
                </div>
            </div>
            <div class="col-md-6">
               <div class="content-with-shadow">
                   <div class="icon-container">
                      <i class="fas fa-school" style="font-size:100px;"></i>
                    </div>
                    <a href="home.php?view=map" style="text-decoration:none;"><h1 style="text-align:center;">School Direction</h1></a>
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
    

        </style>
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
            <h5>STUDENT STATISTICS</h5>
          <canvas id="pieChartStudent" style="width:50%; height:100px;"></canvas>
           </div>
          </div>
          <div class="col-md-6">
          <div class="content-with-shadow">
          <h5>TEACHER STATISTICS</h5>
              <canvas id="pieChartTeacher" style="width:50%; height:100px;"></canvas>
           </div>
          </div>
    </div>
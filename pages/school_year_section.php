<div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["email"]); ?></h1>
          </div>
       </div>
    </div>



        <div class="row" style="margin-top:20px;">
         <div class="col-md-8">
          <div class="content-with-shadow">
          <button id="createSchSectionYearBtn">CREATE SECTION FOR YEAR (SY) </button>
               <!-- Table -->
               <hr />
               <table id="myTable" class="table table-bordered">
					<thead>
                        <th>SID</th>
						<th>SYCODE</th>
						<th>STUDENT ACCEPTED</th>
						<th>MIN</th>
						<th>MAX</th>
                        <th>LEVEL</th>
						<th>SECTION NAME</th>
					</thead>
					<tbody>
						<?php
							 $sycode = $_GET['code'];
                             $sectionforSchool = $portCont->sectionForSchoolYear($sycode); 
                             if (!empty($sectionforSchool)) {
                                 foreach ($sectionforSchool as $key => $value) {
            
								echo 
								"<tr>
                                    <td><a href='home.php?view=classmasterlist&section=".$sectionforSchool[$key]['sid']."'>".$sectionforSchool[$key]['sid']."</td>
									<td>".$sectionforSchool[$key]['sycode']."</td>
									<td>".$sectionforSchool[$key]['student_accepted']."</td>
									<td>".$sectionforSchool[$key]['min']."</td>
									<td>".$sectionforSchool[$key]['max']."</td>
									<td>".$sectionforSchool[$key]['level']."</td>
									<td>".$sectionforSchool[$key]['section']."</td>
								</tr>";
							} }
						
						?>
					</tbody>
				</table>
           </div>
          </div>
        </div>

        


        <style>/* Slideshow container */
            
          
            #createSchSectionYearBtn {
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }

            #createSchSectionYearBtn:hover {
            background-color: #0056b3;
            }

        </style>

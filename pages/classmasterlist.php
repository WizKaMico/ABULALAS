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
               <!-- Table -->
               <hr />
               <table id="myTable" class="table table-bordered">
					<thead>
                        <th>UID</th>
						<th>FNAME</th>
						<th>MNAME</th>
						<th>LNAME</th>
						<th>GENDER</th>
                        <th>BIRTHDATE</th>
						<th>ADDRESS</th>
					</thead>
					<tbody>
						<?php
							 $sid = $_GET['section'];
                             $sectionforSchoolYearMasterList = $portCont->sectionForSchoolYearMasterList($sid); 
                             if (!empty($sectionforSchoolYearMasterList)) {
                                 foreach ($sectionforSchoolYearMasterList as $key => $value) {
            
								echo 
								"<tr>
                                    <td>".$sectionforSchoolYearMasterList[$key]['uid']."</td>
									<td>".$sectionforSchoolYearMasterList[$key]['fname']."</td>
									<td>".$sectionforSchoolYearMasterList[$key]['mname']."</td>
									<td>".$sectionforSchoolYearMasterList[$key]['lname']."</td>
									<td>".$sectionforSchoolYearMasterList[$key]['gender']."</td>
									<td>".$sectionforSchoolYearMasterList[$key]['birthdate']."</td>
									<td>".$sectionforSchoolYearMasterList[$key]['address']."</td>
								</tr>";
							} }
						
						?>
					</tbody>
				</table>
           </div>
          </div>
        </div>

        


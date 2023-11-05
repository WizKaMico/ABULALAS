<div class="row" style="margin-top:20px;">
       <div class="col-md-12">
         <div class="content-with-shadow">
              <h1>HI! <?php echo strtoupper($userSession[0]["email"]); ?></h1>
          </div>
       </div>
    </div>
       
    <div class="row" style="margin-top:20px;">
         <div class="col-md-12">
          <div class="content-with-shadow">
              <h1 style="text-align:center;">EVALUATION</h1>
               <div class="table-container">
         
               <form method="POST" action="home.php?view=evaluate&action=genEval">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>q1</th>
                            <th>q2</th>
                            <th>q3</th>
                            <th>q4</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $eid = $_GET['eid'];
                    $getEnrolleBeEvaluated = $portCont->checkEnrollee($eid); 
                    $level = $getEnrolleBeEvaluated[0]['level'];
                    $allSubjectSuitable = $portCont->subjectPerLevelList($level); 
                    if (!empty($allSubjectSuitable)) {
                        foreach ($allSubjectSuitable as $key => $value) {
                        ?> 
                            <tr>
                                <td>
                                    <?php echo $allSubjectSuitable[$key]['subject']; ?> | <?php echo $allSubjectSuitable[$key]['subjcode']; ?>
                                    <input type="hidden" name="subject[]" value="<?php echo $allSubjectSuitable[$key]['subjcode']; ?>">
                                    <input type="hidden" name="eid" value="<?php echo $eid; ?>">
                                    <input type="hidden" name="level" value="<?php echo $level; ?>">
                                </td>
                                <td><input type="number" name="q1[]" style="width:50%;" required/></td>
                                <td><input type="number" name="q2[]" style="width:50%;" required/></td>
                                <td><input type="number" name="q3[]" style="width:50%;" required/></td>
                                <td><input type="number" name="q4[]" style="width:50%;" required/></td>
                            </tr>
                        <?php } 
                    } 
                    ?>
                    <!-- Add more rows as needed -->
                    </tbody>
                </table>
                <hr />
                GEN AVE : <input type="text" name="gen_ave" style="border:none;" id="average" readonly>
                <input type="submit" style="float:right;" id="evaluate" value="Submit">
            </form>

              </div>
           </div>
          </div>
        </div>


        <style>
    .table-container {
        overflow-x: auto; /* Add horizontal scroll when content overflows */
        width: 100%; /* Ensure the container takes up the full width of the viewport */
    }

    table {
        border-collapse: collapse;
        min-width: 100%; /* Ensure the table takes up the full width of the container */
    }

    table, th, td {
        border: 1px solid black;
    }

    th {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
    }

    th, td {
        padding: 10px;
        text-align: center;
    }

    #evaluate {
  margin-bottom: 20px;
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#evaluate:hover {
  background-color: #0056b3;
}
</style>

<script>
    // Function to calculate the average of an array of numbers
    function calculateAverage(numbers) {
        if (numbers.length === 0) return 0;
        const sum = numbers.reduce((acc, number) => acc + parseFloat(number), 0);
        return sum / numbers.length;
    }

    // Function to update the average input field
    function updateAverage() {
        const q1Values = document.getElementsByName("q1[]");
        const q2Values = document.getElementsByName("q2[]");
        const q3Values = document.getElementsByName("q3[]");
        const q4Values = document.getElementsByName("q4[]");

        // Extract the values from the input fields
        const q1Array = Array.from(q1Values).map((input) => input.value);
        const q2Array = Array.from(q2Values).map((input) => input.value);
        const q3Array = Array.from(q3Values).map((input) => input.value);
        const q4Array = Array.from(q4Values).map((input) => input.value);

        // Calculate the averages for each set of values
        const averageQ1 = calculateAverage(q1Array);
        const averageQ2 = calculateAverage(q2Array);
        const averageQ3 = calculateAverage(q3Array);
        const averageQ4 = calculateAverage(q4Array);

        // Calculate the overall average
        const allAverages = [averageQ1, averageQ2, averageQ3, averageQ4];
        const overallAverage = calculateAverage(allAverages);

        // Update the average input field
        const averageInput = document.getElementById("average");
        averageInput.value = overallAverage.toFixed(2); // Display the average with 2 decimal places
    }

    // Add event listeners to update the average whenever the input fields change
    const inputFields = document.querySelectorAll('input[name^="q"]');
    inputFields.forEach((input) => input.addEventListener("input", updateAverage));
</script>
      
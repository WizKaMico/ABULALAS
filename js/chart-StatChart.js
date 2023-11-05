var ctxStudent = document.getElementById("pieChartStudent").getContext('2d');
var ctxTeacher = document.getElementById("pieChartTeacher").getContext('2d');

// Extract data from JSON for student chart
var studentData = studentChart[0];
var teacherData = teacherChart[0];


// Access the data properties correctly
var studentTotal = studentData.total;
console.log(studentTotal);

var studentGender = studentData.gender;
console.log(studentGender);

var teacherTotal = teacherData.total;
console.log(teacherTotal);

var teacherGender = teacherData.gender;
console.log(teacherGender);
// Create student pie chart
var studentPieChart = new Chart(ctxStudent, {
    type: 'pie',
    data: {
        labels: [studentGender],
        datasets: [{
            backgroundColor: [
                "#5969ff",
                "#ff407b",
                "#25d5f2",
                "#ffc750",
                "#2ec551",
                "#7040fa",
                "#ff004e"
            ],
            data: [studentTotal],
        }]
    },
    options: {
        legend: {
            display: true,
            position: 'bottom',
            labels: {
                fontColor: '#71748d',
                fontFamily: 'Circular Std Book',
                fontSize: 14,
            }
        },
    }
});

// Create teacher pie chart
var teacherPieChart = new Chart(ctxTeacher, {
    type: 'pie',
    data: {
        labels: [teacherGender],
        datasets: [{
            backgroundColor: [
                "#5969ff",
                "#ff407b",
                "#25d5f2",
                "#ffc750",
                "#2ec551",
                "#7040fa",
                "#ff004e"
            ],
            data: [teacherTotal],
        }]
    },
    options: {
        legend: {
            display: true,
            position: 'bottom',
            labels: {
                fontColor: '#71748d',
                fontFamily: 'Circular Std Book',
                fontSize: 14,
            }
        },
    }
});

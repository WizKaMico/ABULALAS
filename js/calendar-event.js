
function generateCalendar(year, month) {
    var daysInMonth = new Date(year, month + 1, 0).getDate();
    var firstDay = new Date(year, month, 1).getDay();
    
    var calendarHTML = '<table><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>';
  
    for (var i = 0; i < firstDay; i++) {
      calendarHTML += '<td></td>';
    }
  
    var currentDay = 1;
    var today = new Date().getDate();
    for (var day = 1; day <= daysInMonth; day++) {
      if (currentDay === today) {
        calendarHTML += '<td class="highlight-today">' + currentDay + '</td>';
      } else if ((firstDay + day - 1) % 7 === 0 || (firstDay + day - 1) % 7 === 6) {
        calendarHTML += '<td class="no-school">' + currentDay + ' <br> NO SCHOOL </td>'; // Red cell for Sun and Sat
      } else {
        var subjectsForDay = gridStat.filter(function(item) {
          return item.sm >= 2; // Monday to Friday
        });
        var subjectText = getSubjectsTextForDay(currentDay, subjectsForDay);
        calendarHTML += '<td>' + currentDay + '<br>' + subjectText + '</td>';
      }
      if ((day + firstDay) % 7 === 0) {
        calendarHTML += '</tr><tr>';
      }
      currentDay++;
    }
  
    for (var i = (firstDay + daysInMonth) % 7; i < 7; i++) {
      calendarHTML += '<td></td>';
    }
  
    calendarHTML += '</tr></table>';
    return calendarHTML;
  }
  
  function getSubjectsTextForDay(day, subjects) {
    var subjectText = '';
    subjects.forEach(function(subject) {
      subjectText += subject.subject + '<br>';
    });
    return subjectText;
  }
  
  var now = new Date();
  var year = now.getFullYear();
  var month = now.getMonth();
  
  var calendarDiv = document.getElementById('calendar');
  calendarDiv.innerHTML = generateCalendar(year, month);
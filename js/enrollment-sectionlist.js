// Initialize AG-Grid
var gridOptions12 = {
    columnDefs: [
      {
        headerName: 'SECTION LEGEND INFORMATION',
        children: [
          { headerName: 'SECTION', field: 'section' },
          { headerName: 'GRADE', field: 'level' },
          { headerName: 'ACCEPTANCE AVG MIN', field: 'min' },
          { headerName: 'ACCEPTANCE AVG MAX', field: 'max' },
        ],
      }
      // Add more header groups or columns as needed
    ],
    defaultColDef: {
      resizable: true,
      suppressSizeToFit: true,
      width: 200,
      enableRowGroup: true,
      enablePivot: true,
      enableValue: true,
    },
    rowData: [], // Initial empty data
    // Other AG-Grid configuration options
  };
  

  

// Fetch data from the server and populate the grid
function fetchAndPopulateDataSection() {
    fetch('api/get_section_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions12.api.setRowData(data);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
  

  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivSection = document.querySelector('#gridSectionChecker');
    new agGrid.Grid(gridDivSection, gridOptions12);
  
    // Fetch and populate data
    fetchAndPopulateDataSection();
  });
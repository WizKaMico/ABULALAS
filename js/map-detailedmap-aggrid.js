// Initialize AG-Grid
var gridOptions10 = {
    columnDefs: [
      {
        headerName: 'SCHOOL MAP INFORMATION',
        children: [
          { headerName: 'MID SECTION', field: 'mid' },
          { headerName: 'ROOM', field: 'room' },
          { headerName: 'BUILDING', field: 'building' }
        ],
      }
      // Add more header groups or columns as needed
    ],
    defaultColDef: {
      resizable: true,
      suppressSizeToFit: true,
      width: 400,
      enableRowGroup: true,
      enablePivot: true,
      enableValue: true,
    },
    rowData: [], // Initial empty data
    // Other AG-Grid configuration options
  };
  


// Fetch data from the server and populate the grid
function fetchAndPopulateData() {
    fetch('api/get_map_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions10.api.setRowData(data);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
  

  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivMap = document.querySelector('#gridMap');
    new agGrid.Grid(gridDivMap, gridOptions10);
  
    // Fetch and populate data
    fetchAndPopulateData();
  });
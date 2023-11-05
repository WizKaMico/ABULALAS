// Initialize AG-Grid
var gridOptions69 = {
    columnDefs: [
      {
        headerName: 'SUBJECT INFORMATION',
        children: [
          { headerName: 'GRADE', field: 'grade' },
          { headerName: 'SUBJECT', field: 'subject' },
          { headerName: 'CODE', field: 'subjcode' },
          { headerName: 'TIME', field: 'time' },
          { headerName: 'ROOM', field: 'room' },
        ],
      },
    ],
    defaultColDef: {
      resizable: true,
      suppressSizeToFit: true,
      width: 200,
      enableRowGroup: true,
      enablePivot: true,
      enableValue: true,
      sortable: true,
    },
    rowData: [], // Initial empty data
    // Other AG-Grid configuration options
  
    // Group by the "grade" column by default
    autoGroupColumnDef: {
      headerName: 'GRADE',
      field: 'grade',
      cellRenderer: 'agGroupCellRenderer',
      cellRendererParams: {
        innerRenderer: function(params) {
          return params.value;
        },
      },
    },
  };
  
  // Fetch data from the server and populate the grid
  function fetchAndPopulateDataSubject() {
    fetch('api/get_subject_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions69.api.setRowData(data);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
  
  // Reference to the search input field
  var searchInput = document.querySelector('#search-input');
  
  // Function to filter the grid data based on the search input
  function filterData(searchText) {
    gridOptions69.api.setQuickFilter(searchText);
  }
  
  // Add an event listener to the search input
  searchInput.addEventListener('input', function(event) {
    var searchText = event.target.value;
    filterData(searchText);
  });
  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivSubject = document.querySelector('#gridSubject');
    new agGrid.Grid(gridDivSubject, gridOptions69);
  
    // Fetch and populate data
    fetchAndPopulateDataSubject();
  });
  
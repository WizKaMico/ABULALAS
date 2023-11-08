// Initialize AG-Grid
var gridOptionsYear = {
    columnDefs: [
      {
        headerName: 'SCHOOL YEAR INFORMATION',
        children: [
          {
                headerName: 'CODE',
                field: 'gencode',
                cellRenderer: function(params) {
                  const link = document.createElement('a');
                  link.setAttribute('href', 'home.php?view=school_year_section&code=' + params.value);
                  link.innerText = params.value;
                  link.addEventListener('click', function(event) {
                    event.stopPropagation();
                  });
                  return link;
                },
          } ,
          { headerName: 'YEAR START', field: 'yr1' },
          { headerName: 'YEAR END', field: 'yr2' },
                 
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
    rowData: []
  };
  
  // Fetch data from the server and populate the grid
  function fetchAndPopulateDataYear() {
    fetch('api/get_year_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptionsYear.api.setRowData(data);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
  
  // Reference to the search input field
  var searchInput = document.querySelector('#search-input');
  
  // Function to filter the grid data based on the search input
  function filterData(searchText) {
    gridOptionsYear.api.setQuickFilter(searchText);
  }
  
  // Add an event listener to the search input
  searchInput.addEventListener('input', function(event) {
    var searchText = event.target.value;
    filterData(searchText);
  });
  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivYear = document.querySelector('#gridYear');
    new agGrid.Grid(gridDivYear, gridOptionsYear);
  
    // Fetch and populate data
    fetchAndPopulateDataYear();
  });
  
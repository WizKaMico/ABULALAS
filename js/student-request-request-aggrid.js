// Initialize AG-Grid
var gridOptionsRequest = {
    columnDefs: [
      {
        headerName: 'REQUEST INFORMATION',
        children: [
          { headerName: 'REQUEST TYPE', field: 'request_type' },
          { headerName: 'DATE REQUESTED', field: 'date_requested' },
          { headerName: 'STATUS', field: 'status' },
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
  


  function uidLinkRenderer(params) {
    var uid = params.value;
    var link = document.createElement('a');
    link.href = '#'; // Use "#" as the href to prevent default link behavior
    link.textContent = uid;
  
    // Add a click event listener to open the modal
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      openModal(uid); // Open the modal with the specified UID
    });
  
    return link;
  }
  
  // Custom cell renderer for the "Edit" link

  function openModal(uid) {
    // Display the modal
    var modal = document.getElementById('requestModal');
    modal.style.display = 'block';
  
    // Populate the modal content using the UID
    const uidInput = modal.querySelector('#uidInput');
    uidInput.value = uid;
  }
  
  // Close the modal when clicking outside the modal content
  window.addEventListener('click', function(event) {
    var modal = document.getElementById('requestModal');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
  

// Fetch data from the server and populate the grid
function fetchAndPopulateDataRequest() {
    fetch('api/get_request_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptionsRequest.api.setRowData(data);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }


  
  // Reference to the search input field
  var searchInput = document.querySelector('#search-input');
  
  // Function to filter the grid data based on the search input
  function filterData(searchText) {
    gridOptionsRequest.api.setQuickFilter(searchText);
  }
  
  // Add an event listener to the search input
  searchInput.addEventListener('input', function(event) {
    var searchText = event.target.value;
    filterData(searchText);
  });
  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivRequest = document.querySelector('#gridRequest');
    new agGrid.Grid(gridDivRequest, gridOptionsRequest);
  
    // Fetch and populate data
    fetchAndPopulateDataRequest();
  });
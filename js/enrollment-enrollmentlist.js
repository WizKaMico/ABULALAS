// Initialize AG-Grid
var gridOptions9 = {
    columnDefs: [
        
      {
        headerName: 'ACTION',
        field: 'eid',
        cellRenderer: eidLinkRenderer 
      },
      {
        headerName: 'STATUS',
        field: 'status'
      },
      {
        headerName: 'ENROLLEE PERSONAL INFORMATION',
        children: [
          { headerName: 'EMAIL', field: 'email' },
          { headerName: 'FIRSTNAME', field: 'fname' },
          { headerName: 'MIDDLENAME', field: 'mname' },
          { headerName: 'LASTNAME', field: 'lname' },
          { headerName: 'DOB', field: 'dob' },
          { headerName: 'GWA', field: 'gen_ave' },
          { headerName: 'GRADE', field: 'level' }
        ],
      },
      {
        headerName: 'HOME INFORMATION',
        children: [
          { headerName: 'ADDRESS', field: 'address' },
          { headerName: 'BARANGAY', field: 'barangay' },
          { headerName: 'CITY', field: 'city' },
          { headerName: 'REGION', field: 'region' },
        ],
      },
      {
        headerName: 'TYPE',
        field: 'enrollment_type'
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
  


  function eidLinkRenderer(params) {
    var eid = params.value;
    var link = document.createElement('a');
    link.href = '#'; // Use "#" as the href to prevent default link behavior
    
    // Set the link's text based on the 'eid' value
    link.textContent = 'Approved/Disapproved';
    
    // Add a click event listener to open the modal
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      openModal(eid); // Open the modal with the specified UID
    });
  
    return link;
  }
  
  
  // Custom cell renderer for the "Edit" link

  function openModal(eid) {
    // Display the modal
    console.log(eid)
    var modal = document.getElementById('enrollmentModalUpdate');
    modal.style.display = 'block';
  
    // Populate the modal content using the UID
    const eidInput = modal.querySelector('#eidInput');
    eidInput.value = eid;
  }
  
  // Close the modal when clicking outside the modal content
  window.addEventListener('click', function(event) {
    var modal = document.getElementById('enrollmentModalUpdate');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
  

// Fetch data from the server and populate the grid
function fetchAndPopulateData() {
    fetch('api/get_enrollment_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions9.api.setRowData(data);
        console.log(data)
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }


  
  // Reference to the search input field
  var searchInput = document.querySelector('#search-input');
  
  // Function to filter the grid data based on the search input
  function filterData(searchText) {
    gridOptions9.api.setQuickFilter(searchText);
  }
  
  // Add an event listener to the search input
  searchInput.addEventListener('input', function(event) {
    var searchText = event.target.value;
    filterData(searchText);
  });
  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivEnrollment = document.querySelector('#gridEnrollment');
    new agGrid.Grid(gridDivEnrollment, gridOptions9);
  
    // Fetch and populate data
    fetchAndPopulateData();
  });
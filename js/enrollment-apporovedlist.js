// Initialize AG-Grid
var gridOptionsNew = {
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
  
    // Set the link's text and add a click event listener to redirect to another page
    link.textContent = 'Complete Credentials';
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      redirectToCredentialsPage(eid); // Redirect to the credentials page with the specified UID
    });
  
    return link;
  }
  
  function redirectToCredentialsPage(eid) {
    // Construct the URL for the credentials page with the 'eid' parameter
    var credentialsPageUrl = 'home.php?view=credentials&eid=' + eid;
    
    // Redirect to the credentials page
    window.location.href = credentialsPageUrl;
  }
  
  

// Fetch data from the server and populate the grid
function fetchAndPopulateDataPreApproved() {
    fetch('api/get_enrollment_data_pre_approved.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptionsNew.api.setRowData(data);
        console.log(data)
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }

  
  // Add an event listener to the search input
  searchInput.addEventListener('input', function(event) {
    var searchText = event.target.value;
    filterData(searchText);
  });
  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridEnrollmentApprovedSet = document.querySelector('#gridEnrollmentApproved');
    new agGrid.Grid(gridEnrollmentApprovedSet, gridOptionsNew);
  
    // Fetch and populate data
    fetchAndPopulateDataPreApproved();
  });
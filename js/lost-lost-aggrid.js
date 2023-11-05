// Initialize AG-Grid
var gridOptions6 = {
    columnDefs: [
      {
        headerName: 'LOST ITEM INFORMATION',
        children: [
          { headerName: 'FID', field: 'fid', cellRenderer: fidLinkRenderer  },
          { headerName: 'IMAGE', field: 'image_path', cellRenderer: imageCellRenderer },
          { headerName: 'ITEM', field: 'item' },
          { headerName: 'FOUND BY', field: 'foundby' },
          { headerName: 'FOUND IN', field: 'foundin' },
          { headerName: 'STATUS', field: 'status' },
          { headerName: 'COMMENT', field: 'another' },
          { headerName: 'DATE', field: 'date' },
          { headerName: 'EDIT', field: 'fid' ,cellRenderer: fidLinkUpdateRenderer },
        ],
      }
      // Add more header groups or columns as needed
    ],
    defaultColDef: {
      resizable: true,
      suppressSizeToFit: true,
      width: 130,
      enableRowGroup: true,
      enablePivot: true,
      enableValue: true,
      sortable:true
    },
    rowData: [], // Initial empty data
    // Other AG-Grid configuration options
  };




  function fidLinkUpdateRenderer(params) {
    console.log(params.data)
    var fid = params.value;
    var link = document.createElement('a');
    link.href = '#'; // Use "#" as the href to prevent default link behavior
    link.textContent = 'EDIT';
    
    // Add a click event listener to open the modal and pass the data
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      openModal1(params.data);
    });
    
    return link;
  }
  
  function openModal1(data) {
    // Display the modal
    var modal = document.getElementById('UpdateLostContent');
    modal.style.display = 'block';
    
    // Populate the modal content using the data object
    const fidInput = modal.querySelector('#fidInput');
    fidInput.value = data.fid;
    const itemInput = modal.querySelector('#itemInput');
    itemInput.value = data.item;
    const foundInput = modal.querySelector('#foundInput');
    foundInput.value = data.foundby;
    const foundInInput = modal.querySelector('#foundInInput');
    foundInInput.value = data.foundin;
    // Add other data fields as needed
  }
  

  window.addEventListener('click', function(event) {
    var modal = document.getElementById('UpdateLostContent');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });

  function fidLinkRenderer(params) {
    var fid = params.value;
    var link = document.createElement('a');
    link.href = '#'; // Use "#" as the href to prevent default link behavior
    link.textContent = fid;
  
    // Add a click event listener to open the modal
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      openModal(fid); // Open the modal with the specified UID
    });
  
    return link;
  }

  
  // Custom cell renderer for the "Edit" link

  function openModal(fid) {
    // Display the modal
    var modal = document.getElementById('lostModal');
    modal.style.display = 'block';
  
    // Populate the modal content using the UID
    const fidInput = modal.querySelector('#fidInput');
    fidInput.value = fid;
  }
  
  // Close the modal when clicking outside the modal content
  window.addEventListener('click', function(event) {
    var modal = document.getElementById('lostModal');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });
  

  function imageCellRenderer(params) {
    const image = document.createElement('img');
    image.src = params.value; // Assuming params.value contains the image URL
    image.style.width = '100px'; // Set the image width as needed
    image.style.height = 'auto'; // Maintain aspect ratio
  
    return image;
  }
  
  

// Fetch data from the server and populate the grid
function fetchAndPopulateData() {
    fetch('api/get_lost_data.php') // Replace with your server-side endpoint
      .then(response => response.json())
      .then(data => {
        gridOptions6.api.setRowData(data);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
  
  // Reference to the search input field
  var searchInput = document.querySelector('#search-input');
  
  // Function to filter the grid data based on the search input
  function filterData(searchText) {
    gridOptions6.api.setQuickFilter(searchText);
  }
  
  // Add an event listener to the search input
  searchInput.addEventListener('input', function(event) {
    var searchText = event.target.value;
    filterData(searchText);
  });
  
  // Call the function to fetch and populate data when the page loads
  document.addEventListener('DOMContentLoaded', function() {
    var gridDivLost = document.querySelector('#gridLost');
    new agGrid.Grid(gridDivLost, gridOptions6);
  
    // Fetch and populate data
    fetchAndPopulateData();
  });
// Initialize AG-Grid



var gridOptions2 = {
    columnDefs: [

        {
            headerName: 'SCHOOL ATTENDANCE',
            children: [
                { headerName: 'Date', field: 'date' },
                { headerName: 'Time In', field: 'time_in' },
                { headerName: 'Time Out', field: 'time_out' }
            ]
        }
        
        // Add more header groups or columns as needed
    ],
    defaultColDef: {
        resizable: true,
        suppressSizeToFit: true,
        width: 200,
        enableRowGroup: true,
        enablePivot: true,
        enableValue: true
    },
    rowData: gridAttend, // Initial empty data
    // Other AG-Grid configuration options
};




// Fetch data from the server and populate the grid


// Call the function to fetch and populate data when the page loads
document.addEventListener('DOMContentLoaded', function() {
    var gridDivAttendance = document.querySelector('#gridAttendance');
    new agGrid.Grid(gridDivAttendance, gridOptions2);

});
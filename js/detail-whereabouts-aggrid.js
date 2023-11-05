// Initialize AG-Grid



var gridOptions3 = {
    columnDefs: [

        {
            headerName: 'SCHOOL WHERE ABOUTS',
            children: [
                { headerName: 'Date', field: 'date' },
                { headerName: 'Time In', field: 'time_in' },
                { headerName: 'Time Out', field: 'time_out' },
                { headerName: 'Room', field: 'room' }
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
    rowData: gridWhere, // Initial empty data
    // Other AG-Grid configuration options
};




// Fetch data from the server and populate the grid


// Call the function to fetch and populate data when the page loads
document.addEventListener('DOMContentLoaded', function() {
    var gridDivgridWhereAbout = document.querySelector('#gridWhereAbout');
    new agGrid.Grid(gridDivgridWhereAbout, gridOptions3);

});
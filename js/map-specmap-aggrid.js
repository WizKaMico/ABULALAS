var gridOptions11 = {
    columnDefs: [

        {
            headerName: 'SCHOOL BUILDING SPECIFIC',
            children: [
                { headerName: 'MID', field: 'mid' },
                { headerName: 'ROOM', field: 'room' },
                { headerName: 'BUILDING', field: 'building' }
            ]
        }
        
        // Add more header groups or columns as needed
    ],
    defaultColDef: {
        resizable: true,
        suppressSizeToFit: true,
        width: 150,
        enableRowGroup: true,
        enablePivot: true,
        enableValue: true
    },
    rowData: specMap, // Initial empty data
    // Other AG-Grid configuration options
};




// Fetch data from the server and populate the grid


// Call the function to fetch and populate data when the page loads
document.addEventListener('DOMContentLoaded', function() {
    var gridDivMapSpec = document.querySelector('#gridMapSpec');
    new agGrid.Grid(gridDivMapSpec, gridOptions11);

});
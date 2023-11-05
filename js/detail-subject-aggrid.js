// Initialize AG-Grid



var gridOptions1 = {
    columnDefs: [

        {
            headerName: 'SUBJECT ASSIGNED',
            children: [
                { headerName: 'GRADE', field: 'grade' },
                { headerName: 'SUBJECT', field: 'subject' },
                { headerName: 'CODE', field: 'subjcode' },
                { headerName: 'TIME', field: 'time' },
                { headerName: 'ROOM', field: 'room' }
            ]
        }
        
        // Add more header groups or columns as needed
    ],
    defaultColDef: {
        resizable: true,
        suppressSizeToFit: true,
        width: 500,
        enableRowGroup: true,
        enablePivot: true,
        enableValue: true
    },
    rowData: gridStat, // Initial empty data
    // Other AG-Grid configuration options
};




// Fetch data from the server and populate the grid


// Call the function to fetch and populate data when the page loads
document.addEventListener('DOMContentLoaded', function() {
    var gridDivSubject = document.querySelector('#gridSubject');
    new agGrid.Grid(gridDivSubject, gridOptions1);

});
// Initialize AG-Grid



var gridOptions7 = {
    columnDefs: [

        {
            headerName: 'LOGIN CREDENTIALS',
            children: [
                { headerName: 'QR Code', field: 'uid', cellRenderer: qrCodeRenderer },
                { headerName: 'UID', field: 'uid', cellRenderer: uidLinkRenderer },
                { headerName: 'EMAIL', field: 'email' },
                { headerName: 'ROLE', field: 'role' },
                { headerName: 'DATE REGISTERED', field: 'date_created' }
            ]
        },
        {
            headerName: 'SCHOOL INFORMATION',
            children: [
                { headerName: 'GRADE', field: 'level' },
                { headerName: 'SECTION', field: 'section' }
            ]
        },
        {
            headerName: 'ACCOUNT INFORMATION',
            children: [
                { headerName: 'FirstName', field: 'fname' },
                { headerName: 'MiddleName', field: 'mname' },
                { headerName: 'LastName', field: 'lname' },
                { headerName: 'Gender', field: 'gender' },
                { headerName: 'BirthDate', field: 'birthdate' },
                { headerName: 'Address', field: 'address' },
                { headerName: 'Contact', field: 'contact' }
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
    rowData: masterlist, // Initial empty data
    // Other AG-Grid configuration options
};


function qrCodeRenderer(params) {
    var uid = params.value;
    var qrCodeUrl = 'https://chart.googleapis.com/chart?chs=128x128&cht=qr&chl=' + encodeURIComponent(uid);

    var qrCodeImage = document.createElement('img');
    qrCodeImage.src = qrCodeUrl;
    qrCodeImage.alt = 'QR Code';
    qrCodeImage.width = 50; // Set width
    qrCodeImage.height = 50; // Set height

    return qrCodeImage;
}


function uidLinkRenderer(params) {
    var uid = params.value;
    var link = document.createElement('a');
    link.href = 'home.php?view=details&uid=' + uid;
    link.textContent = uid;
    
    // Add a click event listener to perform the redirect
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        window.location.href = link.href; // Perform the redirect
    });

    return link;
}

// Fetch data from the server and populate the grid


// Call the function to fetch and populate data when the page loads
document.addEventListener('DOMContentLoaded', function() {
    var gridDivmasterList = document.querySelector('#gridMasterList');
    new agGrid.Grid(gridDivmasterList, gridOptions7);

});
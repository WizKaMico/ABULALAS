 // Function to get parameter value from URL
 function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

// Get the UID parameter value from the URL
var uidFromUrl = getParameterByName('UID');

console.log(uidFromUrl)

// Generate QR code and display it in the container
generateQRCode(uidFromUrl);

// Generate a QR code and display it in the container
function generateQRCode(uid) {
    var qrCodeUrl = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=' + encodeURIComponent(uid);

    var qrCodeImage = document.createElement('img');
    qrCodeImage.src = qrCodeUrl;
    qrCodeImage.alt = 'QR Code';
    qrCodeImage.width = 185;
    qrCodeImage.height = 185;

    var qrCodeContainer = document.getElementById('qrCodeContainer');
    qrCodeContainer.appendChild(qrCodeImage);
}
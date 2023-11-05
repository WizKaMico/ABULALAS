document.addEventListener('DOMContentLoaded', function () {
    const cameraPreview = document.getElementById('camera-preview');
    const startCameraButton = document.getElementById('start-camera');
    const captureImageButton = document.getElementById('capture-image');
    const retryCaptureButton = document.getElementById('retry-capture');
    const imageForm = document.getElementById('image-form');
    const submitImageButton = document.getElementById('submit-image');
    const capturedImage = document.getElementById('captured-image'); // Added for displaying captured image

    let stream;
    let capturedImageData;

    startCameraButton.addEventListener('click', async () => {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            cameraPreview.srcObject = stream;
            startCameraButton.style.display = 'none';
            captureImageButton.style.display = 'block';
        } catch (error) {
            console.error('Error accessing webcam:', error);
        }
    });

    captureImageButton.addEventListener('click', () => {
        if (stream) {
            // Capture a frame from the webcam video stream.
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.width = cameraPreview.videoWidth;
            canvas.height = cameraPreview.videoHeight;
            context.drawImage(cameraPreview, 0, 0, canvas.width, canvas.height);

            // Convert the captured frame to a data URL.
            capturedImageData = canvas.toDataURL('image/jpeg');

            // Display the captured image.
            capturedImage.src = capturedImageData;
            capturedImage.style.display = 'block';

            // Show the retry button and hide the capture button.
            retryCaptureButton.style.display = 'block';
            captureImageButton.style.display = 'none';

            // Hide the video preview.
            cameraPreview.style.display = 'none';

            // Show the file input and submit button.
            imageForm.style.display = 'block';
        }
    });

    retryCaptureButton.addEventListener('click', () => {
        // Hide the captured image and retry button.
        capturedImage.style.display = 'none';
        retryCaptureButton.style.display = 'none';

        // Show the video preview and capture button.
        cameraPreview.style.display = 'block';
        captureImageButton.style.display = 'block';

        // Hide the file input and submit button.
        imageForm.style.display = 'none';
    });

    imageForm.addEventListener('submit', (event) => {
        event.preventDefault();

        // Append the captured image data to the hidden input field.
        document.getElementById('captured-image-input').value = capturedImageData;

        // Submit the form.
        imageForm.submit();
    });
});
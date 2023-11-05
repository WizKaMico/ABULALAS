const container = document.getElementById("puzzle-container");
const canvas = document.createElement("canvas");
const ctx = canvas.getContext("2d");
const modal = document.getElementById("myModal");
const phpPieceId = document.getElementById("phpPieceId"); // Reference to the hidden PHP element
const modalClose = document.getElementsByClassName("close")[0];

// Total number of pieces
const totalPieces = 9; // 3 rows * 3 columns

// Load the image
const image = new Image();
image.src = "map/map/mmap.png"; // Replace with your image URL

image.onload = function() {
  canvas.width = image.width;
  canvas.height = image.height;
  ctx.drawImage(image, 0, 0);
  sliceImage();
};
// ... (previous code)

function sliceImage() {
    const pieceWidth = canvas.width / 3;
    const pieceHeight = canvas.height / 3;
  
    for (let row = 0; row < 3; row++) {
      for (let col = 0; col < 3; col++) {
        const pieceCanvas = document.createElement("canvas");
        pieceCanvas.width = pieceWidth;
        pieceCanvas.height = pieceHeight;
        const pieceCtx = pieceCanvas.getContext("2d");
        pieceCtx.drawImage(
          canvas,
          col * pieceWidth,
          row * pieceHeight,
          pieceWidth,
          pieceHeight,
          0,
          0,
          pieceWidth,
          pieceHeight
        );
  
        const pieceImage = new Image();
        pieceImage.src = pieceCanvas.toDataURL();
        pieceImage.classList.add("puzzle-piece");
  
        pieceImage.addEventListener("click", () => {
          const pieceId = row * 3 + col + 1; // Calculate unique ID based on position
       
          pieceIdInput.value = pieceId;
          // Remove the puzzle container from the DOM
          // Show the modal
          modal.style.display = "block";
        });
  
        container.appendChild(pieceImage);
      }
    }
  }
  
  // ... (remaining code)
  

modalClose.addEventListener("click", () => {
  modal.style.display = "none";
});

// Close modal when clicking outside of modal content
window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});

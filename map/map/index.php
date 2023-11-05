<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div id="puzzle-container"></div>

  <!-- Modal -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <div id="modalContent" class="custom-modal-content">
        <h2>Add Announcement</h2>
        <hr />
        <div id="announcementNumber"></div> <!-- This will show the number -->
      </div>
    </div>
  </div>

  <script>

const container = document.getElementById("puzzle-container");
const canvas = document.createElement("canvas");
const ctx = canvas.getContext("2d");
const modal = document.getElementById("myModal");
const modalContent = document.getElementById("modalContent");
const announcementNumber = document.getElementById("announcementNumber"); // Reference to the number div
const modalClose = document.getElementsByClassName("close")[0];

// Total number of pieces
const totalPieces = 9; // 3 rows * 3 columns

// Load the image
const image = new Image();
image.src = "gmap.png"; // Replace with your image URL

image.onload = function() {
  canvas.width = image.width;
  canvas.height = image.height;
  ctx.drawImage(image, 0, 0);
  sliceImage();
};

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

      const pieceId = row * 3 + col + 1; // Calculate unique ID based on position
      pieceImage.id = `piece-${pieceId}`; // Assign unique ID

      pieceImage.addEventListener("click", () => {
        announcementNumber.textContent = pieceId; // Display the piece's ID in the modal
        modal.style.display = "block";
      });

      container.appendChild(pieceImage);
    }
  }
}

modalClose.addEventListener("click", () => {
  modal.style.display = "none";
});


  </script>
</body>
</html>

<style>



/* Styles for the modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

/* Styles for the modal content */
.modal-content {
  background-color: #fff;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-55%, -55%);
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  width: 80%;
  max-width: 400px;
}

/* Close button for the modal */
.close {
  color: #aaa;
  float: right;
  font-size: 20px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Puzzle container */
#puzzle-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(3, 1fr);
  gap: 2px;
  border: 1px solid #000;
  width: 600px; /* Set container dimensions */
  height: 600px;
}

/* Puzzle piece */
.puzzle-piece {
  border: 1px solid #000;
  width: 100%; /* Adjust the dimensions */
  height: 100%; /* Adjust the dimensions */
  background-size: 600px 600px; /* Adjust this based on your container dimensions */
  cursor: pointer;
}

</style>
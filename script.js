// Function to generate seats dynamically
function generateSeats() {
    const seatsContainer = document.getElementById("seatsContainer");

    // Number of rows and columns of seats
    const rows = 8; // Change as needed
    const columns = 10; // Change as needed

    for (let i = 1; i <= rows; i++) {
        for (let j = 1; j <= columns; j++) {
            const seat = document.createElement("div");
            seat.classList.add("seat");
            seat.textContent = `${String.fromCharCode(64 + i)}${j}`;
            seat.dataset.row = i;
            seat.dataset.column = j;
            seat.addEventListener('click', selectSeat); // Add click event listener
            seatsContainer.appendChild(seat);
        }
    }

    // Mock logic to make some seats unavailable (demo purposes)
    const unavailableSeats = ['B3', 'D7', 'F2', 'A2', 'C3', 'E5', 'G2']; // Example unavailable seats

    unavailableSeats.forEach(seat => {
        const unavailableSeat = document.querySelector(`.seat[data-row='${seat.charCodeAt(0) - 64}'][data-column='${parseInt(seat.slice(1))}']`);
        unavailableSeat.classList.add('unavailable');
        unavailableSeat.removeEventListener('click', selectSeat);
        unavailableSeat.style.cursor = 'not-allowed';
    });
}


// Function to handle seat selection
function selectSeat(event) {
    const selectedSeat = event.target;
    if (!selectedSeat.classList.contains('unavailable')) {
        selectedSeat.classList.toggle('selected');
        updateSelectedSeats();
    }
}

// Function to update the list of selected seats
function updateSelectedSeats() {
    const selectedSeats = document.querySelectorAll('.seat.selected');
    const selectedSeatsList = document.getElementById('selectedSeats');

    // Clear previous selection
    selectedSeatsList.innerHTML = '';

    selectedSeats.forEach(seat => {
        const seatInfo = document.createElement('li');
        seatInfo.textContent = seat.textContent;
        selectedSeatsList.appendChild(seatInfo);
    });
}
let selectedCount = 0;


  // Function to handle seat selection
  function selectSeat(event) {
    const selectedSeat = event.target;

    if (!selectedSeat.classList.contains('unavailable')) {
      if (selectedSeat.classList.contains('selected')) {
        selectedSeat.classList.remove('selected');
      } else {
        const selectedSeats = document.querySelectorAll('.seat.selected');
        if (selectedSeats.length < 3) {
          selectedSeat.classList.add('selected');
        } else {
          // You can show an alert or provide feedback if the user tries to select more than 3 seats
          alert('You can select only 3 seats.');
        }
      }
      updateSelectedSeats();
      updateTotalPrice(); // Call function to update the total price
    }
  }

  // Function to update the list of selected seats
  function updateSelectedSeats() {
    // ... (existing code remains unchanged)
  }

  // Function to update the total price based on selected seats
function updateTotalPrice() {
  const selectedSeats = document.querySelectorAll('.seat.selected');
  const totalPriceField = document.getElementById('price');

  // Get the movie price from the URL
  const urlParams = new URLSearchParams(window.location.search);
  const moviePrice = parseFloat(urlParams.get('price'));

  // Calculate total price based on the number of selected seats and movie price
  const totalPrice = selectedSeats.length * moviePrice;

  // Update the total price field
  totalPriceField.value = '৳' + totalPrice;
}

// Event listener to select seats
document.addEventListener('DOMContentLoaded', function () {
  generateSeats();

  // Initialize total price to 0 taka
  document.getElementById('price').value = '৳0';

  // Attach click event to each seat
  const seats = document.querySelectorAll('.seat');
  seats.forEach(seat => {
      seat.addEventListener('click', selectSeat);
  });

  // Update total price initially (if seats are pre-selected)
  updateTotalPrice();
});





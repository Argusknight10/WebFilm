const container   = document.querySelector('.container');
const seats       = document.querySelectorAll('.row .seat:not(.occupied)'); 
const count       = document.getElementById('count');
const total       = document.getElementById('total');
const movieSelect = document.getElementById('movie');
// const bangku      = document.getElementsByClassName('bangku');
let ticketPrice = +movieSelect.value;

//price calculation function
// function priceTotal() {
//     var total = parseFloat(valueCount) * parseFloat(price);
//     document.getElementById("price").value = total
// }

// seave selected movie index and price
function setMovieData(movieIndex, moviePrice) {
    localstorage.setItem('selectedMovieIndex', movieIndex);
    localstorage.setItem('selectedMoviePrice', moviePrice);
}

//update total and count
function updateSelectedCount() {
    const selectedSeats = document.querySelectorAll('.row .seat.selected');
    const seatsIndex = [...selectedseats].map(function (seat) {
         return [...seats].indexOf(seat); 
    });

    localStorage.setItem('selectedSeats', JSON.stringify(seatsIndex));

    const selectedSeatsCount = selectedSeats.length;

    count.innerText = selectedSeatsCount; 
    total.innerText = selectedSeatsCount = ticketPrice;
}

// // get data from localstorage and populate the ui
function populateUI() {
    const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));

    if (selectedSeats !== null && selectedSeats.length > 0) {
        seats.forEach((seat, index) => { 
            if (selectedSeats.indexOf(index) > -1) {
                seat.classList.add('selected');
            }
        });
    }
        
    const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');

    if (selectedMovieIndex != null) {
        movieSelect.selectedIndex = selectMovieIndex;
    }
}

// //movie select event 
movieSelect.addEventListener('change', (e)=> {
    ticketPrice = +e.target.value;
    setMovieData(e.target.selectedIndex, e.target.value); 
    updateSelectedCount();
});

container.addEventListener('click', (e)=> {
    if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
        e.target.classList.toggle('selected');
    }
    updateSelectedCount();    
});
updateSelectedCount();


function pesanKursi() {
    var checkboxes = document.getElementsByName('seat[]');
    var jumlahKursi = 0;
    var hargaKursi = document.getElementById("price").value; // Harga per kursi
    console.log(hargaKursi);
    var totalHarga = 0;

    parseFloat(hargaKursi);

    // Menghitung jumlah kursi yang dipesan dan mengumpulkan harga
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
        jumlahKursi++;
        // totalHarga = hargaKursi * JumlahKursi;
        totalHarga += hargaKursi;
        }
    }

    // document.getElementById("price").value = totalHarga;

    // Menampilkan hasil
    if (jumlahKursi > 0) {
        alert("Anda memesan " + jumlahKursi + " kursi dengan total harga Rp" + totalHarga); 
        document.getElementById("price").value = totalHarga;
    } else {
        alert("Silakan pilih kursi terlebih dahulu.");
    }
}









document.querySelector(".minus-btn").setAttribute("disabled", "disabled");

//taking value to increment decrement input value
var valueCount

//taking price value in variable
var price = document.getElementById("price").value;
// var price = 30000;
// console.log(price);

//price calculation function
function priceTotal() {
    var total = parseFloat(valueCount) * parseFloat(price);
    document.getElementById("price").value = total
}

//plus button
// document.querySelector(".plus-btn").addEventListener("click", function () {
document.querySelector(".seat-btn").addEventListener("click", function () {
    valueCount = document.getElementById("jumlah").value;
    valueCount++;
    document.getElementById("jumlah").value = valueCount;
    if (valueCount > 1) {
        // document.querySelector(".minus-btn").removeAttribute("disabled");
        // document.querySelector(".minus-btn").classList.remove("disabled");
    }
    priceTotal()
})

//minus button
// document.querySelector(".minus-btn").addEventListener("click", function () {
//     valueCount = document.getElementById("jumlah").value;
//     valueCount--;
//     document.getElementById("jumlah").value = valueCount
//     if (valueCount < 2 ) {
//         document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
//     }
//     priceTotal()
// })


// var checkboxes = document.getElementsByName('seat[]');
// var jumlah = document.getElementById("jumlah").value;
// var price = 30000; // Harga per kursi
// var total = document.getElementById("price").value;

// function priceTotal() {
//     for (var i = 0; i < checkboxes.length; i++) {
//         if (checkboxes[i].checked) {
//         jumlah++;
//         total = jumlah * price;
//         }
//     }
//     // var total = parseFloat(valueCount) * parseFloat(price);
// }

// function pesanKursi() {
//     // Menampilkan hasil
//     if (jumlah > 0) {
//         document.getElementById("jumlah").value = jumlah
//         document.getElementById("price").value = total
//         priceTotal()
//         // console.log("Anda memesan " + jumlahKursi + " kursi dengan total harga Rp" + totalHarga);
//     } else {
//         alert("Silakan pilih kursi terlebih dahulu !");
//     }
// }





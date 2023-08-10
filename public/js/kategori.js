// Ambil semua tombol kategori
const kategoriButtons = document.querySelectorAll('.kategori');

// Ambil wadah untuk daftar film
const movieContainer = document.getElementById('movie');

// Fungsi untuk menampilkan film berdasarkan kategori
function showFilmsByCategory(kategori) {
    // Ambil semua elemen film
    const films = movieContainer.getElementsByClassName('col-movie');

    // Tampilkan film yang sesuai dengan kategori yang dipilih dan sembunyikan yang lainnya
    for (const film of films) {
        if (kategori === 'all' || film.getAttribute('data-kategori') === kategori) {
            film.style.display = 'block';
        } else {
            film.style.display = 'none';
        }
    }
}

// Tambahkan event listener untuk setiap tombol kategori
kategoriButtons.forEach(button => {
    button.addEventListener('click', function () {
        // Hapus kelas 'active' dari semua tombol kategori
        kategoriButtons.forEach(btn => btn.classList.remove('active'));

        // Tambahkan kelas 'active' pada tombol kategori yang dipilih
        this.classList.add('active');

        // Ambil data-kategori dari tombol kategori yang dipilih
        const selectedCategory = this.getAttribute('data-kategori');

        // Tampilkan film berdasarkan kategori yang dipilih
        showFilmsByCategory(selectedCategory);
    });
});

// Tampilkan semua film saat halaman pertama kali dimuat
showFilmsByCategory('all');

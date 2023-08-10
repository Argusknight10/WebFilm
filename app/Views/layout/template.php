<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- MY CSS -->
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/movies.css">
  <link rel="stylesheet" href="/css/navbar.css">
  <link rel="stylesheet" href="/css/slider.css">
  <link rel="stylesheet" href="/css/owlCarousel.css">
  <link rel="stylesheet" href="/css/details.css">
  <link rel="stylesheet" href="/css/footer.css">
  <!-- <link rel="stylesheet" href="/css/.css"> -->

  <!-- BOOTSTRAP CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- BOOTSTRAP JS -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <!-- OWL CAROUSEL CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>

<body class="bg-light ">

  <?= $this->include('layout/navbar'); ?>

  <?= $this->renderSection('content'); ?>

  <?= $this->include('layout/footer'); ?>

  <script>
    function previewImgPoster() {
      const poster = document.querySelector('#poster');
      const posterLabel = document.querySelector('.input-group-text');
      const imgPreview = document.querySelector('.img-preview');

      // untuk mengganti url
      posterLabel.textContent = poster.files[0].name;

      // untuk mengganti preview
      const filePoster = new FileReader();
      filePoster.readAsDataURL(poster.files[0]);

      filePoster.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }

    function previewImgSlider() {
      const slider = document.querySelector('#slider');
      const sliderLabel = document.querySelector('.input-group-text');
      const imgPreview = document.querySelector('.img-preview');

      // untuk mengganti url
      sliderLabel.textContent = slider.files[0].name;

      // untuk mengganti preview
      const fileSLider = new FileReader();
      fileSLider.readAsDataURL(slider.files[0]);

      fileSLider.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }
  </script>

  <!-- <script src="/js/script.js" type="text/javascript"></script> -->

  <!-- JQUERY -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <script src="/js/jquery.js" type="text/javascript"></script> -->
  <!-- JQUERY -->

  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  <!-- OWL CAROUSEL JS -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <!-- Js Saya -->
  <script src="/js/filter.js"></script>
  <script src="/js/jml_pesanan.js"></script>
  <scripts src="/js/kategori.js"></script>
  <script src="/js/seat_pesanan.js"></script>
  <script>
    $(document).ready(function() {
      $("#owl-card-slide").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 3], // between 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0;
        itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option

        // Navigation
        nav: true,
        // navigationText : ["prev","next"],
        // pagination : true,
        // paginationNumbers: true,

        //   //Basic Speeds
        //   slideSpeed : 200,
        //   paginationSpeed : 800,

        //   //Autoplay
        //   autoPlay : true,
        //   goToFirst : true,
        //   goToFirstSpeed : 1000,

        //   // Navigation
        //   navigation : true,
        //   navigationText : ["prev","next"],
        //   pagination : true,
        //   paginationNumbers: true,

        //   // Responsive
        //   responsive: true,
        //   items : 4,
        //   itemsDesktop : [1199,4],
        //   itemsDesktopSmall : [980,3],
        //   itemsTablet: [768,2],
        //   itemsMobile : [479,1]
      });
    });

    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 2000, //Set AutoPlay to 3 seconds
        margin: 15,
        nav: true,
        navText: ["<div class='nav-button owl-prev far fa-caret-square-left'></div>", "<div class='nav-button owl-next far fa-caret-square-right'></div>"],
        responsive: {
          0: {
            items: 2
          },
          600: {
            items: 2
          },
          1000: {
            items: 2
          }
        }
      });
    });
  </script>
</body>

</html>
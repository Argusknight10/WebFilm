<!-- <nav class="navbar fixed-top navbar-expand-lg"> -->
<nav class="navbar py-3 navbar-main navbar-expand-lg ">
    <div class="container container-fluid-main ">
        <header>
            <a class="navbar-brand navbar-brand-main fs-3" href="/">Film-Movie</a>
        </header>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbartoggler" aria-controls="navbartoggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbartoggler">
            <ul class=" navbar-nav mx-3 navbar-nav-main navbar-nav-scroll " style="--bs-scroll-height: 100px;">
                <li class="nav-item nav-item-main nav-menu">
                    <a class="nav-link " aria-current="page" href="/">HOME</a>
                </li>
                <li class="nav-item  nav-item-main nav-menu">
                    <a class="nav-link" href="/pages/movies">MOVIES</a>
                </li>
                <!-- <li class="nav-item  nav-item-main">
                    <a class="nav-link" href="/pages/contact">Contact</a>
                </li> -->
                <!-- CONTOH -->
                <!-- <li class="nav-item  nav-item-main">
                    <a class="nav-link" href="/penduduk/">Penduduk</a>
                </li> -->
                <li class="nav-item  nav-item-main nav-menu dropdown dropdown-main">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">DATA</a>
                    <ul class="dropdown-menu dropdown-menu-main">
                        <li><a class="dropdown-item dropdown-item-main" href="/movies">MOVIE </a></li>
                        <li><a class="dropdown-item dropdown-item-main" href="/slider">SLIDER</a></li>
                        <li><a class="dropdown-item dropdown-item-main" href="/pesan">PESAN</a></li>
                    </ul>
                </li>
            </ul>
            <div class="search-main ">
                <div class="nav-item navbar-search ">
                    <form class="search d-flex" role="search" method="post" action="/movies/">
                        <input class="placeholder-search bg-dark text-light form-control me-2 " type="search" placeholder="Cari film...." aria-label="Search" name="keyword">
                        <button class="btn btn-outline-dark" type="submit" name="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <ul class="  navbar-nav mx-3 navbar-nav-main navbar-nav-scroll " style="--bs-scroll-height: 100px;">
                <li class="nav-item nav-item-main nav-login">
                    <a class="nav-link" aria-current="page" href="#"><i class="fas fa-user-circle fs-4"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
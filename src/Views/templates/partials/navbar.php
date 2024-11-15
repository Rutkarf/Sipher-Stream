<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <!-- Logo + Home Link -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="./public/img/SipherStream.png" alt="Logo" width="30" height="30" class="me-2"> <!-- Logo avec un peu d'espace à droite -->
            SipherStream
        </a>

        <!-- Toggle button for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Center part of the navbar -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Link to Films Page -->
                <li class="nav-item mx-2"> <!-- Espacement avec mx-2 -->
                    <a class="nav-link" href="/films">Film</a>
                </li>

                <!-- Search Bar -->
                <li class="nav-item mx-2"> <!-- Espacement avec mx-2 -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>

                <!-- Link to Series Page -->
                <li class="nav-item mx-2"> <!-- Espacement avec mx-2 -->
                    <a class="nav-link" href="/series">Série</a>
                </li>
            </ul>
        </div>

        <!-- Right part of the navbar (Connexion & Register) -->
        <div class="d-flex">
            <a href="/login" class="btn btn-primary ms-2">Connexion</a> <!-- Espacement à gauche -->
            <a href="/register" class="btn btn-outline-primary ms-2">Register</a> <!-- Bouton Register avec espacement -->
        </div>
    </div>
</nav>
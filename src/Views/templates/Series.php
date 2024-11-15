


<!-- views/home.php -->

<!-- La navbar est supposée être déjà incluse avant ce contenu -->

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid position-relative overflow-hidden vh-50 d-flex align-items-center">
    <div class="container py-5 position-relative z-index-2">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto text-center">
                <h1 class="display-2 fw-bold mb-4 text-uppercase text-white animate__animated animate__fadeInDown">
                    Bienvenue sur <span class="text-primary">Sipher*Stream</span>
                </h1>
                <p class="lead fs-3 mb-5 text-white-50 animate__animated animate__fadeInUp animate__delay-1s">
                    Découvrez un monde de cinéma et de séries comme jamais auparavant
                </p>
                <a href="#" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold text-uppercase animate__animated animate__zoomIn animate__delay-2s">
                    Explorez l'univers
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Contenu principal -->
<section class="container my-5">
    <h2 class="text-center mb-5 display-4 fw-bold text-uppercase position-relative pb-3">
        <?= $title ?>
        <span class="position-absolute start-50 bottom-0 translate-middle-x" style="width: 80px; height: 4px; background-color: #007bff;"></span>
    </h2>


    <!-- Section Séries -->
    <h3 class="mb-4 h2 fw-bold text-uppercase border-start border-primary border-5 ps-3">Séries populaires</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="col">
            <div class="card h-100 shadow-lg border-0 rounded-lg overflow-hidden">
                <img src="chemin/vers/serie1.jpg" class="card-img-top" alt="Stranger Things">
                <div class="card-body">
                    <h5 class="card-title">Stranger Things</h5>
                    <p class="card-text">Une série de science-fiction et d'horreur se déroulant dans les années 80.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="btn btn-primary">Voir plus</a>
                        <span class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-lg border-0 rounded-lg overflow-hidden">
                <img src="chemin/vers/serie2.jpg" class="card-img-top" alt="Breaking Bad">
                <div class="card-body">
                    <h5 class="card-title">Breaking Bad</h5>
                    <p class="card-text">L'histoire d'un professeur de chimie devenu baron de la drogue.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="btn btn-primary">Voir plus</a>
                        <span class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-lg border-0 rounded-lg overflow-hidden">
                <img src="chemin/vers/serie3.jpg" class="card-img-top" alt="Game of Thrones">
                <div class="card-body">
                    <h5 class="card-title">Game of Thrones</h5>
                    <p class="card-text">Une épopée fantastique mêlant politique, guerre et dragons.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="btn btn-primary">Voir plus</a>
                        <span class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-lg border-0 rounded-lg overflow-hidden">
                <img src="chemin/vers/serie4.jpg" class="card-img-top" alt="The Crown">
                <div class="card-body">
                    <h5 class="card-title">The Crown</h5>
                    <p class="card-text">Une série dramatique sur la vie de la reine Elizabeth II et la famille royale britannique.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="btn btn-primary">Voir plus</a>
                        <span class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-lg border-0 rounded-lg overflow-hidden">
                <img src="chemin/vers/serie5.jpg" class="card-img-top" alt="The Mandalorian">
                <div class="card-body">
                    <h5 class="card-title">The Mandalorian</h5>
                    <p class="card-text">Une aventure spatiale dans l'univers de Star Wars.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="btn btn-primary">Voir plus</a>
                        <span class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-lg border-0 rounded-lg overflow-hidden">
                <img src="chemin/vers/serie6.jpg" class="card-img-top" alt="Friends">
                <div class="card-body">
                    <h5 class="card-title">Friends</h5>
                    <p class="card-text">La sitcom culte sur la vie de six amis à New York.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="btn btn-primary">Voir plus</a>
                        <span class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
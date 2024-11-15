


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


    <!-- Section Films -->
    <h3 class="mb-4 h2 fw-bold text-uppercase border-start border-primary border-5 ps-3">Films à l'affiche</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
        <div class="col">
            <div class="card h-100 shadow-lg border-0 rounded-lg overflow-hidden">
                <img src="chemin/vers/image1.jpg" class="card-img-top" alt="Inception">
                <div class="card-body">
                    <h5 class="card-title">Inception</h5>
                    <p class="card-text">Un thriller de science-fiction captivant sur les rêves et la réalité.</p>
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
                <img src="chemin/vers/image2.jpg" class="card-img-top" alt="La La Land">
                <div class="card-body">
                    <h5 class="card-title">La La Land</h5>
                    <p class="card-text">Une comédie musicale romantique sur les rêves et l'amour à Los Angeles.</p>
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
                <img src="chemin/vers/image3.jpg" class="card-img-top" alt="The Shawshank Redemption">
                <div class="card-body">
                    <h5 class="card-title">The Shawshank Redemption</h5>
                    <p class="card-text">Un drame puissant sur l'espoir et la rédemption en prison.</p>
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
                <img src="chemin/vers/image4.jpg" class="card-img-top" alt="Pulp Fiction">
                <div class="card-body">
                    <h5 class="card-title">Pulp Fiction</h5>
                    <p class="card-text">Un film culte mêlant crime, humour noir et dialogues percutants.</p>
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
                <img src="chemin/vers/image5.jpg" class="card-img-top" alt="The Dark Knight">
                <div class="card-body">
                    <h5 class="card-title">The Dark Knight</h5>
                    <p class="card-text">Un chef-d'œuvre du genre super-héros avec une performance inoubliable du Joker.</p>
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
                <img src="chemin/vers/image6.jpg" class="card-img-top" alt="Forrest Gump">
                <div class="card-body">
                    <h5 class="card-title">Forrest Gump</h5>
                    <p class="card-text">Une odyssée touchante à travers l'histoire américaine vue par un homme simple.</p>
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
    </div>

    
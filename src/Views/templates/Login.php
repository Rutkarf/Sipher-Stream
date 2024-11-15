


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

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-4">
            <div class="login-container animate__animated animate__fadeInDown">
                <form action="/login" method="POST">
                    <div class="text-center mb-4">
                        <h2 class="text-dark mb-3">Sipher*Stream</h2>
                        <p class="text-dark-50">Connectez-vous pour découvrir l'univers du cinéma</p>
                    </div>
                    
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" required>
                    </div>
                    
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    
                    <div class="mb-4">
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-cinema btn-lg animate__animated animate__pulse animate__delay-1s">
                            Se connecter
                        </button>
                    </div>
                    
                    <div class="text-center mt-3">
                        <a href="#" class="text-white-50 text-decoration-none">Mot de passe oublié ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
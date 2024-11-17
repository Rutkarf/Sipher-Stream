<?php if ($hasErrors): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>




<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-4">
            <div class="login-container animate__animated animate__fadeInDown">
                <div class="text-center mb-4">
                    <h2 class="text-dark mb-3">Sipher*Stream</h2>
                    <p class="text-dark-50">Connectez-vous pour découvrir l'univers du cinéma</p>
                </div>
                <form action="/login" method="POST">
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
                </form>
            </div>
        </div>
    </div>
</div>
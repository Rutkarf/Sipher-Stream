


<!-- views/home.php -->

<!-- La navbar est supposée être déjà incluse avant ce contenu -->



<!-- views/home.php -->

<!-- La navbar est supposée être déjà incluse avant ce contenu -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Sipher*Stream</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="register-container">
                    <h2 class="text-center mb-4">Inscription à Sipher*Stream</h2>
                    
                    <?php if ($this->hasErrors()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($this->getErrors() as $error): ?>
                                    <li><?php echo htmlspecialchars($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="/register" method="POST">
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" required>
                        </div>
                        
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                        </div>
                        
                        <div class="mb-4">
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirmer le mot de passe" required>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">S'inscrire</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Déjà membre ? <a href="/login">Se connecter</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php if ($hasErrors): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
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

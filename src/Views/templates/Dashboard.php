<h1>Bienvenue, <?php echo htmlspecialchars($user->getUsername()); ?></h1>

<div class="row">
    <div class="col-md-6">
        <h2>Informations du profil</h2>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user->getEmail()); ?></p>
        <!-- Ajoutez d'autres informations de profil si nécessaire -->
    </div>
    <div class="col-md-6">
        <h2>Mes Favoris</h2>
        <div id="favorites-container">
            <!-- Les favoris seront chargés ici dynamiquement -->
        </div>
    </div>
</div>

<!-- Toast pour les détails des favoris -->
<div id="favoriteToast" class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto" id="toastTitle"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toastBody">
        </div>
    </div>
</div>

<script src="/assets/js/favorites.js"></script>

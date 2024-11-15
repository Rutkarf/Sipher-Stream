<!-- Contenu principal -->
<section id="content" class="py-5">
        <div class="container">
            <div class="row">
                <!-- Colonne Films -->
                <div class="col-md-6">
                    <h2 class="text-center mb-4">Films populaires</h2>
                    <?php foreach ($movies as $movie): ?>
                    <div class="card mb-4">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://image.tmdb.org/t/p/w500<?php echo $movie->getPosterPath(); ?>" class="img-fluid rounded-start" alt="<?php echo $movie->getTitle(); ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $movie->getTitle(); ?></h5>
                                    <p class="card-text"><?php echo substr($movie->getOverview(), 0, 100) . '...'; ?></p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <?php
                                            $rating = round($movie->getVoteAverage() / 2);
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $rating) {
                                                    echo '<i class="fas fa-star text-warning"></i>';
                                                } elseif ($i == ceil($rating) && $rating != floor($rating)) {
                                                    echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                                } else {
                                                    echo '<i class="far fa-star text-warning"></i>';
                                                }
                                            }
                                            ?>
                                            <?php echo $movie->getVoteAverage(); ?>/10
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Colonne Séries -->
                <div class="col-md-6">
                    <h2 class="text-center mb-4">Séries populaires</h2>
                    <?php foreach ($series as $serie): ?>
                    <div class="card mb-4">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://image.tmdb.org/t/p/w500<?php echo $serie->getPosterPath(); ?>" class="img-fluid rounded-start" alt="<?php echo $serie->getName(); ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $serie->getName(); ?></h5>
                                    <p class="card-text"><?php echo substr($serie->getOverview(), 0, 100) . '...'; ?></p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <?php
                                            $rating = round($serie->getVoteAverage() / 2);
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $rating) {
                                                    echo '<i class="fas fa-star text-warning"></i>';
                                                } elseif ($i == ceil($rating) && $rating != floor($rating)) {
                                                    echo '<i class="fas fa-star-half-alt text-warning"></i>';
                                                } else {
                                                    echo '<i class="far fa-star text-warning"></i>';
                                                }
                                            }
                                            ?>
                                            <?php echo $serie->getVoteAverage(); ?>/10
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
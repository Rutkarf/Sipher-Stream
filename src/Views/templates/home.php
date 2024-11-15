<div class="container-fluid py-5">
  <div class="row">
    <!-- Colonne Films -->
    <div class="col-md-5">
      <h2 class="text-center mb-4">Films populaires</h2>
      <div class="row row-cols-1 row-cols-sm-2 g-3">
        <?php foreach ($movies as $movie): ?>
          <div class="col">
            <div class="card h-100 shadow-sm">
              <div class="row g-0">
                <div class="col-4">
                  <img src="https://image.tmdb.org/t/p/w500<?php echo $movie->getPosterPath(); ?>" class="img-fluid rounded-start h-100 object-fit-cover" alt="<?php echo $movie->getTitle(); ?>">
                </div>
                <div class="col-8">
                  <div class="card-body d-flex flex-column h-100">
                    <h5 class="card-title fs-6"><?php echo $movie->getTitle(); ?></h5>
                    <p class="card-text small flex-grow-1"><?php echo substr($movie->getOverview(), 0, 50) . '...'; ?></p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                      <div class="rating small">
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
                      </div>
                      <small class="text-muted"><?php echo date('Y', strtotime($movie->getReleaseDate())); ?></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Séparateur -->
    <div class="col-md-2 d-flex justify-content-center align-items-center">
      <div class="vr h-100"></div>
    </div>

    <!-- Colonne Séries -->
    <div class="col-md-5">
      <h2 class="text-center mb-4">Séries populaires</h2>
      <div class="row row-cols-1 row-cols-sm-2 g-3">
        <?php foreach ($series as $serie): ?>
          <div class="col">
            <div class="card h-100 shadow-sm">
              <div class="row g-0">
                <div class="col-4">
                  <img src="https://image.tmdb.org/t/p/w500<?php echo $serie->getPosterPath(); ?>" class="img-fluid rounded-start h-100 object-fit-cover" alt="<?php echo $serie->getName(); ?>">
                </div>
                <div class="col-8">
                  <div class="card-body d-flex flex-column h-100">
                    <h5 class="card-title fs-6"><?php echo $serie->getName(); ?></h5>
                    <p class="card-text small flex-grow-1"><?php echo substr($serie->getOverview(), 0, 50) . '...'; ?></p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                      <div class="rating small">
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
                      </div>
                      <small class="text-muted"><?php echo date('Y', strtotime($serie->getFirstAirDate())); ?></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>



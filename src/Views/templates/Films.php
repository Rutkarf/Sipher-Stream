


<!-- views/home.php -->

<!-- La navbar est supposée être déjà incluse avant ce contenu -->

 <!-- Films Section -->
 <section id="films" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 display-4 fw-bold text-uppercase position-relative pb-3">
                Films à l'affiche
                <span class="position-absolute start-50 bottom-0 translate-middle-x" style="width: 80px; height: 4px; background-color: #007bff;"></span>
            </h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
                <?php foreach ($movies as $movie): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm rounded-lg overflow-hidden">
                        <img src="https://image.tmdb.org/t/p/w500<?php echo $movie->getPosterPath(); ?>" class="card-img-top" alt="<?php echo $movie->getTitle(); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $movie->getTitle(); ?></h5>
                            <p class="card-text"><?php echo substr($movie->getOverview(), 0, 100) . '...'; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="rating">
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
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    
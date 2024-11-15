<?php
namespace App\Controllers;

use App\Views\View;
use App\Models\FilmModel;

class FilmsController {
    private $filmModel;

    public function __construct() {
        $this->filmModel = new FilmModel();
    }

    public function index() {
        $movies = $this->filmModel->getPopularMovies();
        $view = new View();
        $view->render('films', ['title' => 'Films populaires', 'movies' => $movies]);
    }
}

<?php
namespace App\Controllers;

use App\Views\View;
use App\Models\FilmModel;
use App\Models\SerieModel;

class HomeController {
    private $filmModel;
    private $serieModel;

    public function __construct() {
        $this->filmModel = new FilmModel();
        $this->serieModel = new SerieModel();
    }

    public function index() {
        $movies = $this->filmModel::getPopularMovies();
        $series = $this->serieModel::getPopularSeries();
        
        $view = new View();
        $view->render('home', [
            'title' => 'Accueil',
            'movies' => $movies,
            'series' => $series,
            'loadParticleUniverse' => true // Cette note dit qu'on veut voir les étoiles
        ]);
    }
}

<?php
namespace App\Controllers;

use App\Views\View;
use App\Models\SerieModel;

class SeriesController {
    private $serieModel;

    public function __construct() {
        $this->serieModel = new SerieModel();
    }

    public function index() {
        $series = $this->serieModel->getPopularSeries();
        $view = new View();
        $view->render('series', ['title' => 'Séries populaires', 'series' => $series]);
  
    }}
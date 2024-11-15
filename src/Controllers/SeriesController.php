<?php
namespace App\Controllers;

use App\Views\View;

class SeriesController {
    public function index() {
        $view = new View();
        $view->render('series', ['title' => 'series !']);
    }
}
<?php
namespace App\Controllers;

use App\Views\View;

class FilmsController {
    public function index() {
        $view = new View();
        $view->render('films', ['title' => 'films !']);
    }
}
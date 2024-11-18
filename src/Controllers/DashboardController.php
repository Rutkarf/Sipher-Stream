<?php

namespace App\Controllers;

use App\Views\View;

class DashboardController
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $view = new View();
        $view->render('dashboard', [
            'title' => 'Dashboard',
            'username' => $_SESSION['username'] ?? 'Utilisateur'
        ]);
    }
}
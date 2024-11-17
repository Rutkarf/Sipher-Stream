<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Views\View;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function dashboard()
    {
        error_log("UserController::dashboard() appelée");
        if (!$this->isUserLoggedIn()) {
            $this->redirectToLogin();
        }

        $userId = $_SESSION['user_id'];
        $user = $this->userModel->findById($userId);

        if (!$user) {
            error_log("Utilisateur non trouvé. ID: $userId");
            $this->redirectToLogin();
        }

        $favorites = $this->userModel->getFavorites($userId);

        $view = new View();
        $view->render('user/dashboard', [
            'title' => 'Dashboard',
            'user' => $user,
            'favorites' => $favorites
        ]);
    }

    public function getFavorites()
    {
        if (!$this->isUserLoggedIn()) {
            $this->sendUnauthorizedResponse();
            return;
        }

        $userId = $_SESSION['user_id'];
        $favorites = $this->userModel->getFavorites($userId);

        $this->sendJsonResponse($favorites);
    }

    public function removeFavorite()
    {
        if (!$this->isUserLoggedIn()) {
            $this->sendUnauthorizedResponse();
            return;
        }

        $userId = $_SESSION['user_id'];
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'] ?? null;
        $type = $data['type'] ?? null;

        if (!$id || !$type) {
            $this->sendBadRequestResponse('Missing id or type');
            return;
        }

        $success = $this->userModel->removeFavorite($userId, $id, $type);

        $this->sendJsonResponse(['success' => $success]);
    }

    private function isUserLoggedIn(): bool
    {
        return isset($_SESSION['user_id']);
    }

    private function redirectToLogin(): void
    {
        error_log("Redirection vers /login");
        header('Location: /login');
        exit;
    }

    private function sendUnauthorizedResponse(): void
    {
        http_response_code(401);
        $this->sendJsonResponse(['error' => 'Unauthorized']);
    }

    private function sendBadRequestResponse(string $message): void
    {
        http_response_code(400);
        $this->sendJsonResponse(['error' => $message]);
    }

    private function sendJsonResponse($data): void
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

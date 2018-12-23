<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\UserModel;

class LoginController extends BaseController
{
    public function showLogin()
    {
        $viewModel = [
            'pageTitle' => 'Login'
        ];

        $this->renderView('login-view', $viewModel);
    }

    public function login(string $username, string $password)
    {
        $userModel = new UserModel();
        $user = $userModel->authenticate($username, $password);

        if ($user) {
            $_SESSION['profile'] = $user;
            header('Location: ./');
        } else {
            $this->addError('This combination of username and password is incorrect');
            header('Location: index.php?route=login');
        }
    }

    public function logout()
    {
        unset($_SESSION['profile']);
        header('Location: ./');
    }

    public static function getProfile(): ?array
    {
        return $_SESSION['profile'] ?? null;
    }
}
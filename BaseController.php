<?php

declare(strict_types=1);

namespace App\Controller;

abstract class BaseController
{
    protected $errors = [];
    protected $messages = [];

    public function __construct()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'] ?? '';

        if ($requestMethod === 'GET') {
            $this->errors = $_SESSION['errors'] ?? [];
            $this->messages = $_SESSION['messages'] ?? [];

            unset($_SESSION['errors']);
            unset($_SESSION['messages']);
        }
    }

    public function __destruct()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'] ?? '';

        if ($requestMethod === 'POST') {
            $_SESSION['errors'] = $this->errors;
            $_SESSION['messages'] = $this->messages;
        }
    }

    protected function addError(string $error) : void
    {
        $this->errors[] = $error;
    }

    protected function getErrors() : array
    {
        return $this->errors;
    }

    protected function addMessage(string $message) : void
    {
        $this->messages[] = $message;
    }

    protected function getMessages() : array
    {
        return $this->messages;
    }

    public function renderView(string $view, array $viewModel)
    {
        $viewModel['errors'] = $this->getErrors();
        $viewModel['messages'] = $this->getMessages();
        $viewModel['profile'] = LoginController::getProfile();
        require_once(__DIR__ . '/../View/' . $view . '.php');
    }
}
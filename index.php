<?php

declare(strict_types=1);

use \App\Controller\BookController;
use App\Controller\AboutController;
use App\Controller\LoginController;
use App\Controller\PageController;
use Dotenv\Dotenv;

require_once(__DIR__ . '/../vendor/autoload.php');

session_start();

$dotenv = new Dotenv(__DIR__.'/../');
$dotenv->load();

$route = $_GET['route'] ?? 'book-overview';
$method = $_SERVER['REQUEST_METHOD'];

if ($route == 'book-overview') {
    $bookController = new BookController();
    $bookController->showbooks();
} else if ($route == 'book') {
    $id = (int) $_GET['id'];
    $bookController = new BookController();
    $bookController->showBook($id);
} else if ($route == 'new-book' && $method == 'GET') {
    $bookController = new BookController();
    $bookController->newBook();
} else if ($route == 'new-book' && $method == 'POST') {
    $bookFields = $_POST;
    $bookController = new BookController();
    $bookController->addBook($bookFields);
} else if ($route == 'edit-book' && $method =='GET') {
    $id = (int) $_GET['id'];
    $bookController = new BookController();
    $bookController->editBook($id);
} else if ($route == 'edit-book' && $method =='POST') {
    $id = (int) $_GET['id'];
    $bookFields = $_POST;
    $bookController = new BookController();
    $bookController->updateBook($id, $bookFields);
} else if ($route == 'delete-book' && $method == 'POST') {
    $id = (int) $_GET['id'];
    $bookController = new BookController();
    $bookController->deleteBook($id);
} else if ($route == 'about') {
    $aboutController = new AboutController();
    $aboutController->showAbout();
} else if ($route == 'login' && $method == 'GET') {
    $loginController = new LoginController();
    $loginController->showLogin();
} else if ($route == 'login' && $method == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $loginController = new LoginController();
    $loginController->login($username, $password);
} else if ($route == 'logout') {
    $loginController = new LoginController();
    $loginController->logout();
} else {
    $pageController = new PageController();
    $pageController->showNotFound();
}

















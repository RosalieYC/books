<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\AuthorModel;
use App\Model\BookModel;
use App\Model\PublisherModel;

class BookController extends BaseController
{
    public function showBooks()
    {
        $bookModel = new BookModel();
        $books = $bookModel->getAllBooks();

        $viewModel = [
            'pageTitle' => 'Books',
            'books' => $books
        ];
        $this->renderView('book-overview', $viewModel);
    }

    public function showBook(int $bookId)
    {
        $bookModel = new BookModel();
        $book = $bookModel->getOneBook($bookId);

        if ($book) {
            $viewModel = [
                'pageTitle' => $book['title'],
                'book' => $book
            ];
            $this->renderView('book-detail', $viewModel);
        } else {
            $viewModel = [
                'pageTitle' => 'Page not found'
                ];
            http_response_code(404);
            $this->renderView('page-not-found', $viewModel);
        }
    }

    public function newBook()
    {
        $authorModel = new AuthorModel();
        $authors = $authorModel->getAllAuthors();

        $publisherModel = new PublisherModel();
        $publishers = $publisherModel->getAllPublishers();

        $viewModel = [
            'pageTitle' => 'Add new book',
            'authors' => $authors,
            'publishers' => $publishers
        ];
        $this->renderView('new-book', $viewModel);
    }

    public function addBook(array $bookFields) {
        $errors = [];

        if (!isset($bookFields['title']) || empty($bookFields['title'])) {
            $errors[] = 'Title is required!';
        }
        if (!isset($bookFields['isbn']) || empty($bookFields['isbn'])) {
            $errors[] = 'Isbn is required!';
        }
        if (!isset($bookFields['pages']) || empty($bookFields['pages'])) {
            $errors[] = 'Pages is required!';
        }
        if (!isset($bookFields['price']) || empty($bookFields['price'])) {
            $errors[] = 'Price is required!';
        }

        if ($errors) {
            foreach($errors as $error) {
                $this->addError($error);
            }
            header('Location: index.php?route=new-book');
        }
        else {
            $bookModel = new BookModel();
            $newBookId = $bookModel->createBook($bookFields);

            $this->addMessage('Successfull!');

            header('Location: index.php?route=book&id=' . $newBookId);
        }
    }

    public function editBook(int $bookId) {
        $bookModel = new BookModel;
        $book = $bookModel->getOneBook($bookId);

        $authorModel = new AuthorModel();
        $authors = $authorModel->getAllAuthors();

        $publisherModel = new PublisherModel();
        $publishers = $publisherModel->getAllPublishers();

        if ($book) {
            $viewModel = [
                'pageTitle' => $book['title'],
                'book' => $book,
                'authors' => $authors,
                'publishers' => $publishers
            ];
            $this->renderView('edit-book', $viewModel);
        } else {
            $viewModel = [
                'pageTitle' => 'Page not found'
            ];
            http_response_code(404);
            $this->renderView('page-not-found', $viewModel);
        }
    }

    public function updateBook (int $id, array $bookFields) {
        $bookModel = new BookModel;
        $bookModel->updateBook($id,$bookFields);

        header('Location: index.php?route=book&id=' . $id);
    }

    public function deleteBook(int $id) {
        $bookModel = new BookModel;
        $bookModel->deleteBook($id);

        header('Location: index.php?route=book-overview');
    }
}
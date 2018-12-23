<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\AboutModel;
use App\Model\BookModel;

class AboutController extends BaseController
{
    public function showAbout()
    {
        $aboutModel = new AboutModel();
        $about = $aboutModel->getAboutInfo();

        $bookModel = new BookModel();
        $books = $bookModel->getAllBooks();

        $viewModel = [
            'pageTitle' => 'About me',
            'about' => $about,
            'books' => $books
        ];

        $this->renderView('AboutView', $viewModel);
    }

}
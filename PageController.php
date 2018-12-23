<?php

declare(strict_types=1);

namespace App\Controller;

class PageController extends BaseController
{
    public function showNotFound() {
        $viewModel = [
            'pageTitle' => 'Page not found'
        ];
        http_response_code(404);
        $this->renderView('page-not-found', $viewModel);
    }
}
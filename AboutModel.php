<?php

declare(strict_types=1);

namespace App\Model;

class AboutModel extends BaseModel
{
    private $about;
    public function __construct()
    {
        $this->about = [
            'firstname' => 'Rosalie',
            'lastname' => 'Rebel',
            'functie' => 'Trainee PHP developer',
            'interests' => ['Guitars', 'Watching documentaries', 'Planning trips', 'Making omelettes'],
            'favoBooks' => [0, 2]
        ];
    }

    public function getAboutInfo() : array
    {
        return $this->about;
    }
}






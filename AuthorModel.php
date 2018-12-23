<?php

declare(strict_types=1);

namespace App\Model;

class AuthorModel extends BaseModel
{
    public function getAllAuthors(): array
    {
        $query = "SELECT
                  id,
                  name 
                  FROM 
                    authors";

        $statement = $this->getConnection()->prepare($query);
        $statement->execute();
        return $statement->fetchAll();

    }
}


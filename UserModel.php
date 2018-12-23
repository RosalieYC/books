<?php

declare(strict_types=1);

namespace App\Model;

class UserModel extends BaseModel
{
    public function authenticate(string $username, string $password): ?array
    {
        $query = "SELECT 
                    id,
                    username,
                    password,
                    fullname
                  FROM
                  users
                  WHERE
                  username = :username";

        $parameters = [
            'username' => $username
        ];

        $statement = $this->getConnection()->prepare($query);
        $statement->execute($parameters);

        if ($statement->rowCount() > 0) {
            $user = $statement->fetch();

           if (password_verify($password, $user['password'])) {
               unset($user['password']);
               return $user;
           }
        }
        return null;
    }
}


<?php
declare(strict_types=1);
namespace App\Model;

use PDO;

abstract class BaseModel
{
    protected static $connection;
    protected function getConnection() : PDO
    {
        if(!self::$connection) {

            $host = getenv('DB_HOST');
            $username = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');
            $database = getenv('DB_DATABASE');
            self::$connection = new PDO('mysql:host=' . $host . ';dbname=' . $database,$username,$password);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        }
        return self::$connection;
    }
}
<?php

namespace App\Core\Data;

use FFI\Exception;
use PDO;

class Database
{
    static PDO $connection;
    
    public static $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
    ];
    
    public function __construct()
    {
        try{
            $dns = getenv('DATABASE_DNS');
            $username = getenv('DATABASE_USER');
            $password = getenv('DATABASE_PASSWORD');
            self::$connection = new PDO($dns, $username, $password, self::$options);

        } catch(Exception $exception){
            throw new Exception($exception->getMessage());
        }
    }
}
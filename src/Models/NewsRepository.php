<?php

namespace App\Models;

use App\Core\Data\Database;
use App\Core\Data\IRepository;

class NewsRepository implements IRepository
{
    const INSERT_ALL = "INSERT INTO News(title, text, image, link) VALUES (?, ?, ?, ?)";

    public function insertAll(array $news): void
    {
        $pdo = Database::$connection;

        foreach($news as $item)
        {
            try {
                list($title, $image, $text, $link) = array_values($item);
                $statement = $pdo->prepare(self::INSERT_ALL, );
                $statement->execute([$title, $text, $image[0]??NULL, $link]);
            }
            catch(\Error $error)
            {
                var_dump($error->getMessage());
            }
        }
    }
}
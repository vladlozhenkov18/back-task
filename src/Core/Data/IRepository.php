<?php

namespace App\Core\Data;

interface IRepository
{
    public function insertAll(array $news): void;
}
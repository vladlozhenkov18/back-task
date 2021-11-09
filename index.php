<?php

define('COMPONENTS_PATH', __DIR__ . '\src\Views\components\\');
define('PAGES_PATH', __DIR__ . '\src\Views\pages\\');
define('ROOT_PATH', __DIR__);
define('JSON_PATH', __DIR__ . '\public\description.json');
define('DATA_PATH', __DIR__ . '\public\data.json');

require_once '.\vendor\autoload.php';

use App\Application;
use App\Utils\DotEnv;

(new DotEnv(__DIR__ . '\.env'))->read();
(new Application());


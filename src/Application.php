<?php

namespace App;

use App\Core\Data\Database;
use App\Models\NewsRepository;
use App\Services\View\Render;
use App\Utils\Crawler;
use App\Utils\Parcer;
use App\Utils\Json;
use App\Utils\Text;

class Application
{
    public function __construct()
    {
        // Initilize database
        (new Database());
        // Creating news repository for iserting data to database
        $repository = new NewsRepository();

        // Geting the page from url
        $url = getenv('WEB_PAGE_URL');
        $page = Crawler::getWebPage($url);
        $parcer = new Parcer($page);

        // Geting description about neaded elements
        list($newsLinks, $childs) = Json::getData();

        // Getting the neaded news links
        $links = array_values($parcer->getLinks($newsLinks));

        $content = [];

        // Iterating through each news and getting the neaded content from attributes
        foreach($links[0] as $link) {
            $page = Crawler::getWebPage($link);
            $parcer->setContex($page);
            list($title, $image, $text) = $parcer->getValues($childs);

            if($title && $text) {
                array_push($content, [
                    "title" => Text::validateString($title), 
                    "image" => $image,
                    "text"  => Text::validateString($text),
                    "link"  => $link
                ]);
            }
        }
        // Insert data to database table
        $repository->insertAll($content);

        // Rendering news to main page
        Render::view('main', ["content" => $content, "limit" => 15]);
    }
}
<?php

namespace App\Utils;

class Crawler
{
    const USER_AGENT = 'Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

    static public function getWebPage(string $url): string | bool
    {
        $ch = curl_init();

        $options = array(
            CURLOPT_URL  => $url,                       // set url             
            CURLOPT_USERAGENT      => self::USER_AGENT, // set user agent
            CURLOPT_RETURNTRANSFER => true,             // return web page
            CURLOPT_FOLLOWLOCATION => true,             // follow redirects
            CURLOPT_SSL_VERIFYPEER => false,
        );
        
        curl_setopt_array($ch, $options);

        $res = curl_exec($ch);

        curl_close($ch);

        return $res;
    }
}
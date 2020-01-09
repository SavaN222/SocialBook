<?php
namespace App\libraries;
/**
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */
class Core
{
    public function __construct()
    {
        echo $this->getUrl();
    }

    public function getUrl()
    {
        return 'Da';
    }
} // class end
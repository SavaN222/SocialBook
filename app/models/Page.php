<?php
use App\libraries\Database; 
class Page
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

}
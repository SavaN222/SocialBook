<?php 

use App\libraries\Controller;

class PagesController extends Controller
{
    public function __construct()
    {
        // $this->pageModel = $this->model('Page');
    }

    public function index()
    {

        return $this->view('pages/index');

    }
}
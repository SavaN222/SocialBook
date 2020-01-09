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
        // $users = $this->pageModel->getNames();

        // $data = [
        //     'users' => $users
        // ];
        
        return $this->view('pages/index');

    }
}
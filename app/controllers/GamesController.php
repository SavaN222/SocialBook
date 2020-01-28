<?php

use App\libraries\Controller;

/**
 * GamesController
 */
class GamesController extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('login/login');
        }

        $this->friendModel = $this->model('Friend');
    }
    
    /**
     * Display game
     */
    public function index()
    {
        $friendRequest = $this->friendModel->checkForRequest($_SESSION['id']);
        $countFriendRequest = $this->friendModel->countFriendRequest($_SESSION['id']);

        $data = [
            'friendRequests' => $friendRequest,
            'countFriendRequest' => $countFriendRequest
        ];

        return $this->view('games/index', $data);
    }
}
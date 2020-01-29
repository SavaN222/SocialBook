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
        $this->postModel = $this->model('Post');
    }
    
    /**
     * Display game
     */
    public function index()
    {
        $friendRequest = $this->friendModel->checkForRequest($_SESSION['id']);
        $countFriendRequest = $this->friendModel->countFriendRequest($_SESSION['id']);
        $commentsNotifications = $this->postModel->commentsNotifications($_SESSION['id']);
        $countComments = $this->postModel->countCommentsNotifications($_SESSION['id']);

        $data = [
            'friendRequests' => $friendRequest,
            'countFriendRequest' => $countFriendRequest,
            'commentsNotifications' => $commentsNotifications,
            'notification' => $countComments
        ];

        return $this->view('games/index', $data);
    }
}
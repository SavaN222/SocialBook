<?php 

use App\libraries\Controller;
use App\appclass\MessageValidation;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->friendModel = $this->model('Friend');
        $this->messageModel = $this->model('Message');
        $this->userModel = $this->model('User');
         if (!isLoggedIn()) {
            redirect('login/login');
        }
    }

    /**
     * Get all user friends for chat
     * @return type
     */
    public function index()
    {
        $countFriendRequest = $this->friendModel->countFriendRequest($_SESSION['id']);
        $friends = $this->friendModel->userFriends($_SESSION['id']);

        $data = [
            'countFriendRequest' => $countFriendRequest,
            'friends' => $friends
        ];

        return $this->view('messages/index', $data);
    }

    /**
     * Get friend info ande messages for chat
     * @param int $id 
     */
     public function chat(int $id)
     {
        $messages = $this->messageModel->getMessages($_SESSION['id'], $id);
        $countFriendRequest = $this->friendModel->countFriendRequest($_SESSION['id']);
        $friends = $this->friendModel->userFriends($_SESSION['id']);
        $friendInfo = $this->userModel->getUserInfo($id);


        $data = [
            'messages' => $messages,
            'countFriendRequest' => $countFriendRequest,
            'friends' => $friends,
            'friendInfo' => $friendInfo
        ];

        return $this->view('messages/chat', $data);
     }

    /**
     * Send message
     * @param int $id 
     */
    public function send(int $id)
    {
        $text = MessageValidation::sanitizeText();

        $this->messageModel->sendText($_SESSION['id'], $id, $text);

        redirect('messages/chat/' . $id);
    }
}
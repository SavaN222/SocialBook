<?php 

use App\libraries\Controller;

/**
 * Friends Controller
 */
class FriendsController extends Controller
{
    public function __construct()
    {
        $this->friendModel = $this->model('Friend');
    }

    /**
     * Send friend request
     */
    public function sendFriendRequest($id)
    {
        $this->friendModel->sendFriendRequest($_SESSION['id'], $id);

        redirect('pages/profile/' . $id);
    }

    /**
     * Accept friend request
     */
    public function accept($id)
    {
        $this->friendModel->acceptFriendRequest($id, $_SESSION['id']);

        redirect('pages/index');
    }

    /**
     * Reject friend request
     */
    public function decline($id)
    {
        $this->friendModel->declineFriendRequest($id, $_SESSION['id']);

        redirect('pages/index');
    }

    /**
     * Delete user from friend list
     */
    public function delete($id)
    {

        $this->friendModel->declineFriendRequest($_SESSION['id'], $id);

        redirect('pages/index');
    }
}
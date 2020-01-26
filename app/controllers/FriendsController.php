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
    * @param int $id 
    */
    public function sendFriendRequest(int $id)
    {
        $this->friendModel->sendFriendRequest($_SESSION['id'], $id);

        redirect('pages/profile/' . $id);
    }

    /**
     * Accept friend request
     * @param int $id
     */
    public function accept(int $id)
    {
        $this->friendModel->acceptFriendRequest($id, $_SESSION['id']);

        redirect('pages/index');
    }

    /**
     * Reject friend request
     * @param int $id
     */
    public function decline(int $id)
    {
        $this->friendModel->declineFriendRequest($id, $_SESSION['id']);

        redirect('pages/index');
    }

    /**
     * Delete user from friend list
     * @param int $id
     */
    public function delete(int $id)
    {

        $this->friendModel->declineFriendRequest($_SESSION['id'], $id);

        redirect('pages/index');
    }
}
<?php 

namespace App\appclass;

class FriendStatus
{
   /**
    * Check friendStatus for value and text for button
    * if user not friend - text = send friend request
    * if user send request - text = on Hold
    * if user get friend request - text = accept friend
    * if both of users are friend - text = delete friend
    * @param object $status 
    * @return array
    */
    public static function friendStatus($status): array
    {

        if ($status == null) {
            $text = 'Send Friend Request';
            $btn = '';
            $href = URLROOT.'/friends/sendFriendRequest/';
        } elseif ($status->status == '1') {
            if ($_SESSION['id'] != $status->user_id) {
                $text = 'Accept Friend';
                $btn = '';
                $href = URLROOT.'/friends/accept/';
            } else {
                 $text = 'On Hold';
                $btn = 'disabled';
                $href = '#';
            }
        } else {
            $text = 'Delete Friend';
            $btn = '';
            $href = URLROOT.'/friends/delete/';
        }

        $statusData = [
            'text' => $text,
            'btn' => $btn,
            'href' => $href
        ];

        return $statusData;
    }
}
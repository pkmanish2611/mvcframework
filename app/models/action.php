<?php
class Action
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function addWishList($bookId, $userId, $action)
    {
        $this->db->query('INSERT INTO user_bookdata (userId, bookId, actionType) VALUES (:userId  ,:bookId ,:action )');
        $this->db->bind(':userId', $userId);
        $this->db->bind(':bookId', $bookId);
        $this->db->bind(':action', $action);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function checkForWishlist($bookId, $userId, $action)
    {
        $this->db->query('SELECT * FROM user_bookdata WHERE userId = :userId AND bookId = :bookId');
        $this->db->bind(':userId', $userId);
        $this->db->bind(':bookId', $bookId);
        $row = $this->db->single();
        $actionType = $row->actionType;
        if ($actionType == $action) {
            return true;
        } else {
            return false;
        }
    }
 
}

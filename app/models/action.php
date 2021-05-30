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
        $this->db->query('SELECT * FROM user_bookdata WHERE userId = :userId AND bookId = :bookId AND actionType =:action');
        $this->db->bind(':userId', $userId);
        $this->db->bind(':bookId', $bookId);
        $this->db->bind(':action', $action); 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function markAsRead($bookId, $userId, $action){
        $this->db->query('INSERT INTO user_bookdata (userId, bookId, bookFinishedDate, actionType) VALUES (:userId  ,:bookId , now(),:action )');
        $this->db->bind(':userId', $userId);
        $this->db->bind(':bookId', $bookId);
        $this->db->bind(':action', $action);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function checkForReadBook($bookId, $userId, $action){ 
        $this->db->query('SELECT * FROM user_bookdata WHERE userId = :userId AND bookId = :bookId AND actionType = :action');
        $this->db->bind(':userId', $userId);
        $this->db->bind(':bookId', $bookId);
        $this->db->bind(':action', $action); 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getWishlistCount(){
        $this->db->query('SELECT * FROM user_bookdata');  
        if ($count=$this->db->rowCount()) {
            return $count;
        } else {
            return false;
        }
    }
    public function isBookTaken($userId,$bookId,$action){

    }
    public function checkAvailableCount($bookId){

    }
    public function borrowBook($userId, $bookId, $action)
    {
    }
    public function minusAvailableBookCount($bookId)
    {
    }
 
}

<?php
class actions extends Controller
{ 
    public function __construct()
    {
        $this->actionModel = $this->model('Action');
    }
    public function addWishList()
    {
        $url = $this->getUrl();
        if($url[2] == 'bookList'){
            $page=$url[2];
        }else if($url[2] == 'bookDetail'){
            $page = $url[2].'/'.$url[3];
        }
        $bookId = $url[3];
        $userId = $_SESSION['user_id'];
        $action = 'wishlist';
        if ($this->actionModel->checkForWishlist($bookId, $userId, $action)) {
            $_SESSION['wishlistError'] = 'Book is already added';
            header('location:' . URLROOT . 'books/'.$page);
        } else {
            if ($this->actionModel->addWishList($bookId, $userId, $action)) {
                $_SESSION['wishlistSuccess'] = 'Book added to wishlist';
                header('location:' . URLROOT .'books/' .$page);
            }
        }
    }
    public function markRead(){
        $url = $this-> getUrl();
        $page = $url[2].'/'.$url[3];
        $bookId=$url[3];
        $userId = $_SESSION['user_id'];
        $action = 'finished';
        if($this->actionModel->checkForReadBook($bookId, $userId, $action)){
            $_SESSION['bookMarked'] = 'Book is already marked as read';
            header('location:' . URLROOT . 'books/'.$page);
        }else{
            if($this->actionModel->markAsRead($bookId, $userId, $action)){
                $_SESSION['bookMarkedSuccess'] = 'Book is marked as read';
                header('location:' . URLROOT . 'books/'. $page);
            }
        }
    }
    public function borrow(){
        $url = $this->getUrl();
        $page = $url[2] . '/' . $url[3];
        $bookId = $url[3];
        $userId = $_SESSION['user_id'];
        $action = 'borrowed';
        if($this->actionModel->isBookTaken($userId,$bookId,$action)){
            $_SESSION['bookTaken'] = 'You have already borrowed this book';
            header('location:' . URLROOT . 'books/' . $page); 
        }else if($this->actionModel->checkAvailableCount($bookId)){
            $_SESSION['notAvailable'] = 'Copies not available';
            header('location:' . URLROOT . 'books/' . $page);
        }else{
            if($this->actionModel->borrowBook($userId, $bookId, $action)){
                $this->actionModel->minusAvailableBookCount($bookId);
                $_SESSION['bookBorrowed'] = 'You have just borrowed book';
                header('location:' . URLROOT . 'books/' . $page);
            }
        }

    }
    public function return(){

    }
   
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

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
        $bookId = $url[2];
        $userId = $_SESSION['user_id'];
        $action = 'wishlist';
        if ($this->actionModel->checkForWishlist($bookId, $userId, $action)) {
            $_SESSION['wishlistError'] = 'Book is already added';
            header('location:' . URLROOT . 'books/bookList');
        } else {
            if ($this->actionModel->addWishList($bookId, $userId, $action)) {
                $_SESSION['wishlistSuccess'] = 'Book added to wishlist';
                header('location:' . URLROOT . 'books/bookList');
            }
        }
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

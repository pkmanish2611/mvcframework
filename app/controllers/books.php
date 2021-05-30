<?php
class books extends Controller
{
    public function __construct()
    {
        $this->bookModel = $this->model('Book');
    }
    public function addBook()
    {
        $data = [
            'page_title' => '',
            'bookName' => '',
            'bookAuthor' => '',
            'bookDescription' => '',
            'bookImage' => '',
            'bookCount' => '',
            'bookNameError' => '',
            'bookAuthorError' => '',
            'bookDescriptionError' => '',
            'bookImageError' => '',
            'bookCountError' => '',
            'bookAdded' => '',
            'bookAddedError' => '',
            'bookId' => ''

        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'bookName' => trim($_POST['bookName']),
                'bookAuthor' => trim($_POST['bookAuthor']),
                'bookDescription' => nl2br(trim($_POST['bookDescription'])),
                'bookImage' => '',
                'bookCount' => trim($_POST['bookCount']),
                'bookNameError' => '',
                'bookAuthorError' => '',
                'bookDescriptionError' => '',
                'bookImageError' => '',
                'bookCountError' => '',
                'bookAdded' => '',
                'bookAddedError' => '',
                'bookId' => ''

            ];
            if (empty($data['bookName'])) {
                $data['bookNameError'] = 'Book name is required.';
            }
            if (empty($data['bookAuthor'])) {
                $data['bookAuthorError'] = 'Author name is required.';
            }
            if (strlen($data['bookDescription']) > 600) {
                $data['bookDescriptionError'] = 'Description should be less than 600 in words.';
            }
            if (($_FILES['bookImage']['size'] <= (1024 * 1024)) and (($_FILES['bookImage']['type'] == "image/jpeg") or ($_FILES['bookImage']['type'] == "image/png"))) {
                move_uploaded_file($_FILES['bookImage']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/MVCframework/public/assets/img/uploads/" . $_FILES['bookImage']['name']);
                $data['bookImage'] = $_FILES['bookImage']['name'];
            } else {
                $data['bookImageError'] = "Please upload image in jpg/png format and max 1 mb";
            }
            if ($data['bookCount'] < 0) {
                $data['bookCountError'] = 'Book count should be greater than "0".';
            }
            if (empty($data['bookNameError']) && empty($data['bookAuthorError']) && empty($data['bookDescriptionError']) && empty($data['bookImageError']) && empty($data['bookCountError'])) {
                $id = $this->bookModel->addBook($data);
                if ($id) {
                    $data['bookAdded'] = true;
                    $data['bookId'] = $id;
                } else {
                    $data['bookAddedError'] = true;
                }
            }
        } else {
            $data = [
                'page_title' => '',
                'bookName' => '',
                'bookAuthor' => '',
                'bookDescription' => '',
                'bookImage' => '',
                'bookCount' => '',
                'bookNameError' => '',
                'bookAuthorError' => '',
                'bookDescriptionError' => '',
                'bookImageError' => '',
                'bookCountError' => '',
                'bookAdded' => '',
                'bookAddedError' => '',
                'bookId' => ''
            ];
        }

        $this->view('books/addBook', $data);
    }

    public function bookList()
    {
        $data = [
            'totalPage' => '',
            'currentPage' => '',
            'books' => '',
            'recordNotFound' => ''
        ];
        $page = 0;
        $bookPerPage = 5;
        $data['currentPage']  = 1; 
        $url = $this->getUrl();
        if (isset($url[2])) {
            $page = $url[2];
            if ($page <= 0) {
                $page = 0;
                $data['currentPage'] = 1;
            } else {
                $data['currentPage'] = $page;
                $page--;
                $page = $page * $bookPerPage;
            }
        } 
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sort'])) { 
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if ($_POST['sort'] == 'A-Z') {
                $a = 'book_name';
            } elseif ($_POST['sort'] == 'Z-A') {
                $a = 'book_name DESC';
            } else {
                $a = 'book_id';
            }
            $data['totalPage'] = ceil($this->bookModel->getRowCount() / $bookPerPage);
            if ($data['books'] = $this->bookModel->getSortedData($a, $page, $bookPerPage)) {
                $data['recordNotFound'] = false;
            } else {
                $data['recordNotFound'] = true;
            }
        }else{
            $a = 'book_id'; 
        }
        $data['totalPage'] = ceil($this->bookModel->getRowCount() / $bookPerPage);
        if ($data['books'] = $this->bookModel->getSortedData($a, $page, $bookPerPage)) {
            $data['recordNotFound'] = false;
        } else {
            $data['recordNotFound'] = true;
        }  
        $this->view('books/bookList', $data);
    }

    public function bookDetail()
    {
        $data = [
            'page_title' => 'bookDetail',
            'bookId' => '',
            'bookName' =>  '',
            'bookAuthor' =>  '',
            'bookDescription' => '',
            'bookImage' => '',
            'bookCount' =>  '',
            'modifiedDate' => ''
        ];
        $url = $this->getUrl();
        $id = $url[2];
        if ($row = $this->bookModel->bookDetail($id)) {
            $data = [
                'page_title' => 'bookDetail',
                'bookId' => $id,
                'bookName' => $row->book_name,
                'bookAuthor' => $row->book_author,
                'bookDescription' => $row->book_description,
                'bookImage' => $row->book_image,
                'bookCount' => $row->total_count,
                'modifiedDate' => $row->modified_date
            ];
        }
        $this->view('books/bookDetail', $data);
    }
    public function editBook()
    {
        $data = [
            'bookName' => '',
            'bookAuthor' => '',
            'bookDescription' => '',
            'bookImage' => '',
            'bookCount' => ''
        ];
        $url = $this->getUrl();
        $id = $url[2];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            print_r($id);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'bookName' => trim($_POST['bookName']),
                'bookAuthor' => trim($_POST['bookAuthor']),
                'bookDescription' => nl2br(trim($_POST['bookDescription'])),
                'bookCount' => trim($_POST['bookCount'])
            ];
            if (($_FILES['bookImage']['size'] <= (1024 * 1024)) and (($_FILES['bookImage']['type'] == "image/jpeg") or ($_FILES['bookImage']['type'] == "image/png"))) {
                move_uploaded_file($_FILES['bookImage']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/MVCframework/public/assets/img/uploads/" . $_FILES['bookImage']['name']);
                $data['bookImage'] = $_FILES['bookImage']['name'];
            }
            if ($this->bookModel->editBook($data, $id)) {
                $_SESSION['bookEdited'] = "Book edited successfully";
                header('location:' . URLROOT . 'books/bookDetail/' . $id);
            } else {
                $_SESSION['bookEditedError'] = "Book not edited successfully";
                print_r($id);
            }
        }
    }
    public function bookDelete()
    {
        $url = $this->getUrl();
        $id = $url[2];
        if ($this->bookModel->bookDelete($id)) {
            $_SESSION['bookDeleted'] = "Book deleted successfully";
            header('location:' . URLROOT . 'books/bookList');
        } else {
            $_SESSION['bookDeletedError'] = "Book not deleted successfully";
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

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
            'bookAuthor'=>'',
            'bookDescription'=>'',
            'bookImage' =>'',
            'bookCount'=> '', 
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
                'bookAdded'=>'',
                'bookAddedError'=> '',
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
            if(empty($data['bookNameError']) && empty($data['bookAuthorError']) && empty($data['bookDescriptionError']) && empty($data['bookImageError']) && empty($data['bookCountError'])){
                $id = $this->bookModel->addBook($data); 
                if($id){ 
                    $data['bookAdded'] = true;
                    $data['bookId']= $id;
                }else{
                    $data['bookAddedError'] = true;
                }
            }
        }else{
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
                'bookId'=>'' 
            ]; 
        }

        $this->view('books/addBook', $data);
    }

    public function bookList()
    { 
        $data = $this->bookModel->getAllRecord() ; 
        $this->view('books/bookList', $data);
    }
    public function bookDetail()
    {
        $data = [
            'page_title' => 'bookDetail',
            'bookId' => '',
            'bookName' =>  '',
            'bookAuthor' =>  '',
            'bookDescription' =>'', 
            'bookImage' => '',
            'bookCount' =>  '',
            'modifiedDate' => '' 
        ];
        $url = $this->getUrl(); 
        $id= $url[2]; 
        if($row = $this->bookModel->bookDetail($id)){
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
        $url = $this->getUrl();
        $id = $url[2];
         $data = [ 
                'bookName' => trim($_POST['bookName']),
                'bookAuthor' => trim($_POST['bookAuthor']),
                'bookDescription' => nl2br(trim($_POST['bookDescription'])),
                'bookImage' => '',
                'bookCount' => trim($_POST['bookCount']) 
         ];
        if (($_FILES['bookImage']['size'] <= (1024 * 1024)) and (($_FILES['bookImage']['type'] == "image/jpeg") or ($_FILES['bookImage']['type'] == "image/png"))) {
            move_uploaded_file($_FILES['bookImage']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/MVCframework/public/assets/img/uploads/" . $_FILES['bookImage']['name']);
            $data['bookImage'] = $_FILES['bookImage']['name'];
        }
        if ($this->bookModel->bookDelete($id,$data)) {
            $_SESSION['bookEdited'] = "Book edited successfully";  
        } else {
            $_SESSION['bookEditedError'] = "Book not edited successfully";
        } 
    }
    public function bookDelete() 
    { 
        $url = $this->getUrl();
        $id = $url[2];
        if($this->bookModel->bookDelete($id)){ 
            $_SESSION['bookDeleted'] = "Book deleted successfully";
            header('location:' . URLROOT . 'books/bookList');
        }else{
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

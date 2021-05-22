<?php
class books extends Controller
{
    public function __construct()
    {
        //$this->userModel = $this->model('User');
    } 
    public function addBook()
    {
        $data['page_title'] = "addBook";

        $this->view('books/addBook', $data);
    }

    public function bookList()
    {
        $data['page_title'] = "bookList";

        $this->view('books/bookList', $data);
    }
    public function bookDetail()
    {
        $data['page_title'] = "bookDetail";

        $this->view('books/bookDetail', $data);
    }
    public function editBook()
    {
        $data['page_title'] = "editBook";

        $this->view('books/editBook', $data);
    }
    public function bookDelete()
    {
         
    }
    
}

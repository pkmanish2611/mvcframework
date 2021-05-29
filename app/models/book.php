<?php
class Book
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    } 
    public function addBook($data) 
    {
        $this->db->query('INSERT INTO books (book_name, book_author, book_description, book_image, total_count) VALUES(:bookName, :bookAuthor, :bookDescription, :bookImage, :bookCount)'); 
        $this->db->bind(':bookName', $data['bookName']);
        $this->db->bind(':bookAuthor', $data['bookAuthor']);
        $this->db->bind(':bookDescription', $data['bookDescription']); 
        $this->db->bind(':bookImage', $data['bookImage']);
        $this->db->bind(':bookCount', $data['bookCount']);
        if ($this->db->execute()) {
            $this->db->query('SELECT * FROM books WHERE book_id=(SELECT max(book_id) FROM books)');
            $row = $this->db->single();
            $id = $row->book_id;
            return $id;
        } else {
            return false;
        }
    }
    public function bookDetail($id){
        $this->db->query('SELECT * FROM books WHERE book_id = :id');
        $this->db->bind(':id', $id);
        if($row = $this->db->single()){
            return $row;
        }else{
            return false;
        } 
    }
    public function bookDelete($id){
        $this->db->query('DELETE FROM books WHERE book_id = :id');
        $this->db->bind(':id',$id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        } 
    }
    public function editBook($data,$id){
        if(isset($data['bookImage'])){
            $this->db->query('UPDATE books SET book_name=:bookName,book_author=:bookAuthor,book_description=:bookDescription,book_image=:bookImage,total_count=:bookCount WHERE book_id = :id');
            $this->db->bind(':bookName', $data['bookName']);
            $this->db->bind(':bookAuthor', $data['bookAuthor']);
            $this->db->bind(':bookDescription', $data['bookDescription']);
            $this->db->bind(':bookImage', $data['bookImage']);
            $this->db->bind(':bookCount', $data['bookCount']);
            $this->db->bind(':id', $id);
            if ($this->db->execute()) {
               return true;
            } else {
                return false;
            }
        }else{
            $this->db->query('UPDATE books SET book_name=:bookName,book_author=:bookAuthor,book_description=:bookDescription,total_count=:bookCount WHERE book_id = :id');
            $this->db->bind(':bookName', $data['bookName']);
            $this->db->bind(':bookAuthor', $data['bookAuthor']);
            $this->db->bind(':bookDescription', $data['bookDescription']); 
            $this->db->bind(':bookCount', $data['bookCount']);
            $this->db->bind(':id', $id);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            } 
        }
    }
    public function getAllRecord($page, $bookPerPage){
        $this->db->query('SELECT * FROM books ORDER BY book_id ASC LIMIT :page ,:bookPerPage');
        $this->db->bind(':page', $page);
        $this->db->bind(':bookPerPage', $bookPerPage);
        $result = $this->db->resultSet(); 
        if($this->db->rowCount() != 0){
            return $result;
        }else{
            return false;
        }
    }
    public function getRowCount(){
        $this->db->query('SELECT * FROM books'); 
        if ( $count = $this->db->rowCount()) {
            return $count;
        } else {
            return false;
        } 
    }
}

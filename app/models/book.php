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
    public function editBook(){
        
    }
    public function getAllRecord(){
        $this->db->query('SELECT * FROM books ORDER BY book_id ASC');
        $result = $this->db->resultSet(); 
        if($this->db->rowCount() != 0){
            return $result;
        }else{
            return false;
        }
    }
}

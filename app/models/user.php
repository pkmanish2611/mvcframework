<?php

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']); 

        //Execute function
        if ($this->db->execute()) {
             return true; 
        } else {
            return false;
            
        }
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashedPassword = $row->password;  
        $verified = $row->verified;

        if (password_verify($password, $hashedPassword) && ($verified == 1)) {
            return $row;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if ($this->db->rowCount() > 0) {
            return true; 

        } else {
            return false;
        }
    }
    public function sendVerificationMail($data)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email'); 
        $this->db->bind(':email', $data['email']); 
        $row = $this->db->single(); 
        $id = $row->id;
        try { 
            //Recipients
            $GLOBALS['mail']->setFrom('bookshelf2611@gmail.com', 'Admin');
            $GLOBALS['mail']->addAddress($data['email'], $data['username']); //Add a recipient 
            $GLOBALS['mail']->addReplyTo('bookshelf2611@gmail.com', 'Bookshelf | Do Not Reply to this mail unless you wanna talk to a machine');  
            //Content
             
            $GLOBALS['mail']->Subject = 'Email verification link';
            $GLOBALS['mail']->Body = 'Hi ' . $data['username'] . ' ,<br/><br/>Thank you for Registering with Bookshelf.<br>Please verify your email account by <a href="' . $data['link'] .$id. '"> clicking on this activation link</a><br/>Welcome once again. <br> <br/><br/>Thanks & Regards,<br> Bookshelf Team';
            
            if($GLOBALS['mail']->send()){
                return true;
                echo 'Message has been sent';
            }else{
                return false;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$GLOBALS['mail']->ErrorInfo}";
        }
    }
    public function verifyUser($id){
        $this->db->query('UPDATE users SET  verified= 1 WHERE id = :id');

        //Bind value
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        } 
    }   
}

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
        $this->db->query('INSERT INTO users (username, email, password, verify_token) VALUES(:username, :email, :password, :verify_token)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':verify_token', $data['verify_token']); 

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

        if (password_verify($password, $hashedPassword)) {
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
        try { 
            //Recipients
            $GLOBALS['mail']->setFrom('bookshelf2611@gmail.com', 'Admin');
            $GLOBALS['mail']->addAddress($data['email'], $data['username']); //Add a recipient 
            $GLOBALS['mail']->addReplyTo('bookshelf2611@gmail.com', 'Bookshelf | Do Not Reply to this mail unless you wanna talk to a machine');  
            //Content
             
            $GLOBALS['mail']->Subject = 'Email verification link';
            $GLOBALS['mail']->Body = 'Hello <b> ,</b><br/><br/>This mail is to verify your account. so, please click on link given below to verify your account<br/> <br/><br/><br/>Thanks and regards,<br/> Bookshelf admin  ';
            $GLOBALS['mail']->AltBody = 'Hello <b>'.$data['username']. ',</b><br/><br/>This mail is to verify your account. so, please click on link given below to verify your account<br/> <br/><br/><br/>Thanks and regards,<br/> Bookshelf admin.  ';

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
     
}

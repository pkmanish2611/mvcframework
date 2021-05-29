<?php



class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'link' => '',
            'message' => '',
            'errorMessage' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'link' =>   'http://localhost/mvcframework/users/verification/?id=',
                'message' => '',
                'errorMessage' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter  name.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
            }


            // Validate password on length, numeric values,
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter password.';
            } else if (strlen($data['password']) < 6) {
                $data['passwordError'] = 'Password must be at least 8 characters.';
            } else if (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter confirm password.';
            } else if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match please try again.';
            }

            // Make sure that errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    $this->userModel->sendVerificationMail($data);
                    $data['message'] = true;
                } else {
                    $data['errorMessage'] = true;
                }
            }
        }
        $this->view('users/register', $data);
    }



    public function login()
    { 
        $data = [
            'title' => 'Login page',
            'email' => '',
            'password' => '',
            'emailError' => '',
            'passwordError' => '',
            'resetMail' => '',
            'link' =>   '',
            'resetMailError' => '',
            'resetMailSent' => '',
            'resetMailSentError' => '',

        ];
        //Check for post
        if (isset($_POST['login'])) {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailError' => '',
                'passwordError' => '',
                'resetMail' => '',
                'link' =>   '',
                'resetMailError' => '',
                'resetMailSent' => '',
                'resetMailSentError' => ''
            ];

            //Validate username
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email.';
            } else if ($this->userModel->verifiedStatus($data['email'])) {
                $data['emailError'] = 'You are not verified';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }
            //Check if all errors are empty
            if (empty($data['emailError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';
                }
            }
        }else
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sendMail'])) {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => '',
                'resetMail' => trim($_POST['resetMail']),
                'link' =>   'http://localhost/mvcframework/users/passwordReset/?id=',
                'resetMailError' => '',
                'resetMailSent' => '',
                'resetMailSentError' => ''
            ];
            if (empty($data['resetMail'])) {
                $data['resetMailError'] = 'Please enter email address.';
            } else if (!filter_var($data['resetMail'], FILTER_VALIDATE_EMAIL)) {
                $data['resetMailError'] = 'Please enter the correct format.';
            } else if ($this->userModel->findUserByEmail($data['resetMail'])) {
                $data['resetMailError'] = '';
            }else{
                $data['resetMailError'] = 'You are not registered with us please register yourself first';
            }

            if (empty($data['resetMailError'])) {
                if($this->userModel->passwordResetMail($data)){
                    $data['resetMailSent'] = 'Mail is sent to you with password reset link';
                }else{
                    $data['resetMailSentError'] = "mail can't be sent right now please try again";
                }
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => '',
                'resetMail' => '',
                'link' =>   '',
                'resetMailError' => '',
                'resetMailSent' => '',
                'resetMailSentError' => '',
            ];
        }

        $this->view('users/login', $data);
    }
    public function verification()
    {
        $data = [
            'verifySuccess' => '',
            'verifyError' => ''
        ];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->userModel->verifyUser($id)) {
                $data['verifySuccess'] = true;
            } else {
                $data['verifyError'] = true;
            }
        } else {
            $data = [
                'verifySuccess' => '',
                'verifyError' => ''
            ];
        }
        $this->view('users/verification', $data);
    }
     
    public function passwordReset()
    {
        $data = [
            'password' => '',
            'confirmPassword' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'passwordChanged' => '',
            'passwordChangedError' => ''
        ];
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'passwordChanged' => '',
                'passwordChangedError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter password.';
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = 'Password must be at least 8 characters.';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter confirm password.';
            } else if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match please try again.';
            }
            if (empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->passwordReset($data,$id)) {
                    $data['passwordChanged'] = 'Password has been changed successfully please go to login page';
                } else {
                    $data['passwordChangedError'] = 'Password has not been changed ! Please try again';
                }
            }
        }else{
            $data = [
                'password' => '',
                'confirmPassword' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'passwordChanged' => '',
                'passwordChangedError' => ''
            ];
        }
        $this->view('users/passwordReset', $data);
    }public function profile(){
        $data['title']='profile';
        $this->view('users/profile', $data);
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['role'] = $user->role;
        header('location:' . URLROOT . 'books/bookList');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        header('location:' . URLROOT . 'pages/landing');
    }
}

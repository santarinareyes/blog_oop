<?php 
    class Users extends Controller {
        public function __construct()
        {
            $this->userModel = $this->model("User");
        }

        public function register(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    "username" => trim($_POST["username"]),
                    "email" => trim($_POST["email"]),
                    "password" => trim($_POST["password"]),
                    "confirm_password" => trim($_POST["confirm_password"]),
                    "username_err" => "",
                    "email_err" => "",
                    "password_err" => "",
                    "confirm_password_err" => ""
                ];

                if(empty($data["username"])){
                    $data["username_err"] = "Please enter username";
                } else {
                    if($this->userModel->findUserByUsername($data["username"])){
                        $data["username_err"] = "Username is already taken";
                    }
                }

                if(empty($data["email"])){
                    $data["email_err"] = "Please enter email";
                } else {
                    if($this->userModel->findUserByEmail($data["email"])){
                        $data["email_err"] = "Email is already taken";
                    }
                }

                if(empty($data["password"])){
                    $data["password_err"] = "Please enter password";
                } else if(strlen($data["password"]) < 6) {
                    $data["password_err"] = "Password must be at least 6 characters";
                }
                
                if(empty($data["confirm_password"])){
                    $data["confirm_password_err"] = "Please confirm password";
                } else if($data["confirm_password"] !== $data["password"]){
                    $data["confirm_password_err"] = "Password does not match";
                }

                if(empty($data["username_err"]) && empty($data["email_err"]) && empty($data["password_err"]) && empty($data["confirm_password_err"])){
                    $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
                    if($this->userModel->register($data)){
                        flash("register_success", "You are now registered.");
                        redirect("users/login");
                    } else {
                        die("Something went wrong!");
                    }
                } else {
                    $this->view("users/register", $data);
                }

            } else {
                $data = [
                    "username" => "",
                    "email" => "",
                    "password" => "",
                    "confirm_password" => "",
                    "username_err" => "",
                    "email_err" => "",
                    "password_err" => "",
                    "confirm_password_err" => ""
                ];

                $this->view("users/register", $data);
            }
        }

        public function login(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "username" => trim($_POST["username"]),
                "password" => trim($_POST["password"]),
                "username_err" => "",
                "password_err" => "",
            ];

            if(empty($data["username"])){
                $data["username_err"] = "Please enter username";
            }

            if(empty($data["password"])){
                $data["password_err"] = "Please enter password";
            }

            // Checks to see if the Username exist in the database
            if($this->userModel->findUserByUsername($data["username"])){

            } else {
                $data["username_err"] = "Username does not exist";
            }

            if(empty($data["username_err"]) && empty($data["password_err"])){
                $loggedInUser = $this->userModel->login($data["username"], $data["password"]);
                
                if($loggedInUser){
                    $this->createUserSession($loggedInUser);
                } else {
                    $data["password_err"] = "Password is incorrect";
                    $this->view("users/login", $data);
                }
            } else {
                $this->view("users/login", $data);
            }

            } else {
                $data = [
                    "username" => "",
                    "password" => "",
                    "username_err" => "",
                    "password_err" => "",
                ];

                $this->view("users/login", $data);
            }
        }

        public function createUserSession($user){
            $_SESSION["user_id"] = $user->user_id;
            $_SESSION["username"] = $user->username;
            $_SESSION["user_status"] = $user->user_status;
            redirect("pages/index");
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['user_status']);
            session_destroy();
            redirect("users/login");
        }

        public function isLoggedIn(){
            if(isset($_SESSION["user_id"])){
                return true;
            } else {
                return false;
            }
        }
    }
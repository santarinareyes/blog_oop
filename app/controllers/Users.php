<?php 
    class Users extends Controller {
        public function __construct()
        {
            
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
                }

                if(empty($data["email"])){
                    $data["email_err"] = "Please enter email";
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
                    die("Account registered.");
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
    }
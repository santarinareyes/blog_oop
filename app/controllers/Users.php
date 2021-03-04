<?php 
    class Users extends Controller {
        public function __construct()
        {
            
        }

        public function register(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){

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
    }
<?php 
    class Categories extends Controller {
        public function __construct()
        {
            if(!isLoggedIn()){
                redirect("users/login");
            } else if ($_SESSION["user_status"] !== "Admin"){
                redirect("pages");
            }
        }

        public function index(){
            $data = [
                "title" => "Millhouse Blog",
                "description" => "Welcome to the blog. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, corporis.",
            ];

            $this->view("categories/index", $data);
        }
    }
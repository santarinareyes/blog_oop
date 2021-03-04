<?php 
    class Posts extends Controller {
        public function __construct()
        {
            if(!isset($_SESSION["user_status"])){
                redirect("pages");
            } else if ($_SESSION["user_status"] !== "Admin"){
                redirect("pages");
            }
        }

        public function index(){
            $data = [

            ];

            $this->view("posts/index");
        }
    }
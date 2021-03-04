<?php 
    class Pages extends Controller {
        public function __construct()
        {
        }

        public function index(){
            $data = [
                "title" => "Millhouse Blog",
                "description" => "Welcome to the blog. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, corporis.",
            ];

            $this->view("pages/index", $data);
        }
        
        public function about(){
            $data = [
                "title" => "About Millhouse Blog",
                "description" => "Welcome to the blog. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, corporis.",
            ];
            $this->view("pages/about", $data);
        }
    }
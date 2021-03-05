<?php 
    class Categories extends Controller {
        public function index(){
            $data = [
                "title" => "Millhouse Blog",
                "description" => "Welcome to the blog. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, corporis.",
            ];

            $this->view("categories/index", $data);
        }
    }
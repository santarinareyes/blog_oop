<?php 
    class Pages extends Controller {
        public function __construct()
        {
            $this->categoryModel = $this->model("category");
        }

        public function index(){
            $category = $this->categoryModel->getCategories();

            $data = [
                "title" => "Millhouse Blog",
                "description" => "Welcome to the blog. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, corporis.",
                "category" => $category
            ];

            $this->view("pages/index", $data);
            $this->view("includes/nav", $data);
        }
        
        public function about(){
            $category = $this->categoryModel->getCategories();

            $data = [
                "title" => "About Millhouse Blog",
                "description" => "Welcome to the blog. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, corporis.",
                "category" => $category
            ];
            $this->view("pages/about", $data);
        }
    }
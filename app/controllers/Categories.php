<?php 
    class Categories extends Controller {
        public function __construct()
        {
            if(!isLoggedIn()){
                redirect("users/login");
            } else if ($_SESSION["user_status"] !== "Admin"){
                redirect("pages");
            }

            $this->categoryModel = $this->model("category");
        }

        public function index(){
            $categories = $this->categoryModel->getCategories();

            $data = [
                "categories" => $categories
            ];

            $this->view("categories/index", $data);
        }
    }
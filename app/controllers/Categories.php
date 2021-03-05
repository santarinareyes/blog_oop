<?php 
    class Categories extends Controller {
        public function __construct()
        {
            if(!isLoggedIn()){
                redirect("users/login");
            } else if ($_SESSION["user_status"] !== "Admin"){
                redirect("pages");
            }
            $this->userModel = $this->model("User");
            $this->categoryModel = $this->model("Category");
        }
        
        public function index(){
            $categories = $this->categoryModel->getCategories();

            $data = [
                "category" => $categories
            ];

            $this->view("categories/index", $data);
        }

        public function show($id){
            $category = $this->categoryModel->singleCategory($id);
            $categories = $this->categoryModel->getCategories();
            $post = $this->categoryModel->getCategoryPosts($id);
            $user = $this->userModel->getUserById($post->post_user_id);

            $data = [
                "posts" => $post,
                "users" => $user,
                "singleCat" => $category,
                "category" => $categories
            ];

            $this->view("categories/show", $data);
        }
    }
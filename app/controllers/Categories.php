<?php 
    class Categories extends Controller {
        public function __construct()
        {
            if(!isLoggedIn()){
                redirect("users/login");
            }
            
            $this->userModel = $this->model("User");
            $this->categoryModel = $this->model("Category");
            $this->postModel = $this->model("Post");
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

            $data = [
                "posts" => $post,
                "singleCat" => $category,
                "category" => $categories
            ];

            $this->view("categories/show", $data);
        }

        public function post($id){
            $category = $this->categoryModel->getCategories();
            $post = $this->postModel->getSinglePost($id);
            $user = $this->userModel->getUserById($post->post_user_id);

            $data = [
                "category" => $category,
                "post" => $post,
                "user" => $user
            ];
            $this->view("categories/post", $data);
        }
    }
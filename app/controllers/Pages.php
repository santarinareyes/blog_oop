<?php 
    class Pages extends Controller {
        public function __construct()
        {
            $this->categoryModel = $this->model("category");
            $this->postModel = $this->model("Post");
        }

        public function index(){
            $category = $this->categoryModel->getCategories();
            $posts = $this->postModel->latestPosts();
            $post_one = $posts[0];
            $data = [
                "title" => "Millhouse Blog",
                "description" => "Welcome to the blog. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, corporis.",
                "category" => $category,
                "posts" => $posts
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
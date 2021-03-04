<?php 
    class Posts extends Controller {
        public function __construct()
        {
            if(!isLoggedIn()){
                redirect("users/login");
            } else if ($_SESSION["user_status"] !== "Admin"){
                redirect("pages");
            }

            $this->postModel = $this->model("Post");
        }

        public function index(){
            $posts = $this->postModel->getPosts();

            $data = [
                "posts" => $posts
            ];

            $this->view("posts/index", $data);
        }
    }
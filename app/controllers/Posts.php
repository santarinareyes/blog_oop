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

        public function add(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    "title" => trim($_POST["title"]),
                    "content" => trim($_POST["content"]),
                    "user_id" => $_SESSION["user_id"],
                    "title_err" => "",
                    "content_err" => ""
                ];

                if(empty($data["title"])){
                    $data["title_err"] = "Please enter title";
                }

                if(empty($data["content"])){
                    $data["content_err"] = "Please enter content";
                }

                if(empty($data["title_err"]) && empty($data["content_err"])){
                    if($this->postModel->addPost($data)){
                        flash("post_message", "Post created");
                        redirect("posts");
                    } else {
                        die("Something went wrong!");
                    }
                } else {
                    $this->view("posts/add", $data);
                }


            } else {
                
                $data = [
                    "title" => "",
                    "content" => ""
                ];
    
                $this->view("posts/add", $data);
            }
        }
    }
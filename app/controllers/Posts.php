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
            $this->userModel = $this->model("User");
            $this->categoryModel = $this->model("Category");
        }
        
        public function index(){
            $category = $this->categoryModel->getCategories();
            $posts = $this->postModel->getPosts();

            $data = [
                "posts" => $posts,
                "category" => $category
            ];

            $this->view("posts/index", $data);
        }

        public function add(){
            $category = $this->categoryModel->getCategories();
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    "category" => $category,
                    "title" => trim($_POST["title"]),
                    "content" => trim($_POST["content"]),
                    "user_id" => $_SESSION["user_id"],
                    "title_err" => "",
                    "content_err" => "",
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
                    "category" => $category,
                    "title" => "",
                    "content" => ""
                ];
    
                $this->view("posts/add", $data);
            }
        }

        public function edit($id){
            $category = $this->categoryModel->getCategories();
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    "category" => $category,
                    "id" => $id,
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
                    if($this->postModel->updatePost($data)){
                        flash("post_message", "Post Updated");
                        redirect("posts");
                    } else {
                        die("Something went wrong!");
                    }
                } else {
                    $this->view("posts/edit", $data);
                }


            } else {

                $post = $this->postModel->getSinglePost($id);
                $data = [
                    "category" => $category,
                    "id" => $id,
                    "title" => $post->post_title,
                    "content" => $post->post_content
                ];
    
                $this->view("posts/edit", $data);
            }
        }

        public function show($id){
            $category = $this->categoryModel->getCategories();
            $post = $this->postModel->getSinglePost($id);
            $user = $this->userModel->getUserById($post->post_user_id);

            $data = [
                "category" => $category,
                "post" => $post,
                "user" => $user
            ];
            $this->view("posts/show", $data);
        }

        public function delete($id){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if($this->postModel->deletePost($id)){
                    flash("post_message", "Post deleted");
                    redirect("posts");
                } else {
                    die("Something went wrong!");
                }
            } else {
                redirect("posts");
            }
        }
    }
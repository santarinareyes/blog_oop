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

        public function show($id, $currentPage = ""){
            $category = $this->categoryModel->singleCategory($id);
            $categories = $this->categoryModel->getCategories();
            $post = $this->categoryModel->getCategoryPosts($id, $currentPage);
            $count = count($this->categoryModel->catPostPagination($id));
            $count = ceil($count / 9);

            $data = [
                "posts" => $post,
                "count" => $count,
                "page" => $currentPage,
                "singleCat" => $category,
                "category" => $categories
            ];

            $this->view("categories/show", $data);
        }

        public function post($id){
            $category = $this->categoryModel->getCategories();
            $post = $this->postModel->getSinglePost($id);
            $comments = $this->postModel->getComments($id);
            $user = $this->userModel->getUserById($post->post_user_id);

            $data = [
                "category" => $category,
                "post_id" => $id,
                "post" => $post,
                "comments" => $comments,
                "user" => $user,
                "new_comment" => "",
                "new_comment_user" => "",
            ];

            $this->view("categories/post", $data);
        }

        public function add(){
            $category = $this->categoryModel->getCategories();
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    "category" => $category,
                    "title" => trim($_POST["title"]),
                    "title_err" => "",
                ];

                if(empty($data["title"])){
                    $data["title_err"] = "Please enter a title";
                }

                if(!empty($data["title"])){
                    if($this->categoryModel->addCategory($data)) {
                        flash("post_message", "Category created");
                        redirect("categories");
                    } else {
                        die("Something went wrong!");
                    }
                }

                $this->view("categories/add", $data);

            } else {

                $data = [
                    "category" => $category,
                    "title" => "",
                ];

                $this->view("categories/add", $data);
            }
        }

        public function edit($id){
            $category = $this->categoryModel->getCategories();
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    "category" => $category,
                    "title" => $_POST["title"],
                    "id" => $id,
                    "title_err" => ""
                ];

                if(empty($data["title"])){
                    $data["title_err"] = "Please enter a title";
                }

                if(empty($data["title_err"])){
                    if($this->categoryModel->updateCategory($data)){
                        flash("post_message", "Category updated");
                        redirect("categories");
                    }
                } else {
                    die("Something went wrong!");
                }

                $this->view("categories/edit", $data);
            } else {

                $singleCat = $this->categoryModel->getSingleCategory($id);
                $category = $this->categoryModel->getCategories();

                $data = [
                    "id" => $id,
                    "category" => $category,
                    "title" => $singleCat->cat_title
                ];

                $this->view("categories/edit", $data);
            }
        }

        public function delete($id){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if($this->categoryModel->deleteCategory($id)){
                    flash("post_message", "Category deleted");
                    redirect("categories");
                } else {
                    die("Something went wrong!");
                }
            }
        }

        public function commentDelete($id){
            $post_id = $_GET["post"];
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if($this->postModel->deleteComment($id)){
                    flash("post_message", "Comment deleted");
                    redirect("categories/post/$post_id");
                } else {
                    die("Something went wrong!");
                }
            }
        }

        public function commentAdd($id){
            $data = [
                "post_id" => $id,
                "new_comment" => "",
                "new_comment_user" => "",
            ];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data["new_comment"] = $_POST["comment_content"];
                $data["new_comment_user"] = $_SESSION["user_id"];

                if(!empty($data["new_comment"])) {
                    if($this->postModel->addComment($data)) {
                        flash("post_message", "Comment submitted");
                        redirect("categories/post/$id");
                    } else {
                        die("Something went wrong!");
                    }
                }
            }
        }
    }
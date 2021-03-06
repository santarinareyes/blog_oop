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
                    "post_category" => $_POST["category"],
                    "image" => $_FILES['image']['name'],
                    "image_tmp" => $_FILES['image']['tmp_name'],
                    "image_size" => $_FILES['image']['size'],
                    "image_type" => $_FILES['image']['type'],
                    "image_error" => $_FILES['image']['error'],
                    "content" => trim($_POST["content"]),
                    "tags" => trim($_POST["tags"]),
                    "user_id" => $_SESSION["user_id"],
                    "title_err" => "",
                    "post_category_err" => "",
                    "image_err" => "",
                    "content_err" => ""
                ];

                if(empty($data["title"])){
                    $data["title_err"] = "Please enter title";
                }

                if(strlen($data["title"]) > 25){
                    $data["title_err"] = "Title is too long. Max 25 characters is allowed";
                }

                if($data["post_category"] === "no"){
                    $data["post_category_err"] = "Please choose a category";
                }

                $fileExt = explode(".", $data["image"]);
                $fileActualExt = strtolower(end($fileExt));
                
                $allowed = array("jpg", "jpeg", "gif", "png");

                if(in_array($fileActualExt, $allowed)){
                    if($data["image_error"] === 0){
                        if($data["image_size"] < 524288){
                            $new_name = uniqid("", true) . "." . $fileActualExt;
                            $filePath = "../public/images/$new_name";
                            $data["image"] = $new_name;
                            move_uploaded_file($data["image_tmp"], $filePath);
                        } else {
                            $data["image_err"] = "File must be 500kB or lower";
                        }
                    } else {
                        $data["image_err"] = "There was an error uploading your file";
                    }
                } else {
                    $data["image_err"] = "File must be an image of type: JPG, JPEG, GIF or PNG";
                }

                if(empty($data["content"])){
                    $data["content_err"] = "Please enter content";
                }

                if(empty($data["title_err"]) && empty($data["content_err"]) && empty($data["post_category_err"]) && empty($data["image_err"])){
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
                    "post_category" => "",
                    "content" => "",
                    "tags" => ""
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
                    "post_category" => $_POST["category"],
                    "content" => trim($_POST["content"]),
                    "tags" => trim($_POST["tags"]),
                    "user_id" => $_SESSION["user_id"],
                    "title_err" => "",
                    "post_category_err" => "",
                    "image_err" => "",
                    "content_err" => ""
                ];

                if(empty($data["title"])){
                    $data["title_err"] = "Please enter title";
                }

                if($data["post_category"] === "no"){
                    $data["post_category_err"] = "Please choose a category";
                }

                if(empty($data["content"])){
                    $data["content_err"] = "Please enter content";
                }

                if(empty($data["content"])){
                    $data["content_err"] = "Please enter content";
                }

                if(empty($data["title_err"]) && empty($data["content_err"]) && empty($data["post_category_err"]) && empty($data["image_err"])){
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
                    "post_category" => $post->post_category_id,
                    "title" => $post->post_title,
                    "content" => $post->post_content,
                    "tags" => "$post->post_tags"
                ];
    
                $this->view("posts/edit", $data);
            }
        }

        public function image($id){
            $category = $this->categoryModel->getCategories();
            $post = $this->postModel->getSinglePost($id);
            
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $data = [
                    "post_id" => $id,
                    "post_category" => $_POST["category"],
                    "image" => $_FILES['image']['name'],
                    "image_tmp" => $_FILES['image']['tmp_name'],
                    "image_size" => $_FILES['image']['size'],
                    "image_type" => $_FILES['image']['type'],
                    "image_error" => $_FILES['image']['error'],
                    "image_err" => "",
                ];

                $fileExt = explode(".", $data["image"]);
                $fileActualExt = strtolower(end($fileExt));
                
                $allowed = array("jpg", "jpeg", "gif", "png");

                if(in_array($fileActualExt, $allowed)){
                    if($data["image_error"] === 0){
                        if($data["image_size"] < 524288){
                            $new_name = uniqid("", true) . "." . $fileActualExt;
                            $filePath = "../public/images/$new_name";
                            $data["image"] = $new_name;
                            move_uploaded_file($data["image_tmp"], $filePath);
                        } else {
                            $data["image_err"] = "File must be 500kB or lower";
                        }
                    } else {
                        $data["image_err"] = "There was an error uploading your file";
                    }
                } else {
                    $data["image_err"] = "File must be an image of type: JPG, JPEG, GIF or PNG";
                }

                if(empty($data["image_err"])){
                    if($this->postModel->updateImage($data)){
                        flash("post_message", "Image Updated");
                        redirect("posts");
                    } else {
                        die("Something went wrong!");
                    }
                } else {
                    $this->view("posts/image", $data);
                }

            } else {
                $data = [
                    "post_id" => $id,
                    "category" => $category,
                    "post" => $post
                ];
                $this->view("posts/image", $data);
            }
        }

        public function show($id){
            $category = $this->categoryModel->getCategories();
            $post = $this->postModel->getSinglePost($id);
            $user = $this->userModel->getUserById($post->post_user_id);

            $data = [
                "category" => $category,
                "post" => $post,
                "tags" => explode(",", $post->post_tags),
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
<?php 
    class Pages extends Controller {
        public function __construct()
        {
            $this->categoryModel = $this->model("category");
            $this->postModel = $this->model("Post");
            $this->userModel = $this->model("User");
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
        }
        
        public function about(){
            $category = $this->categoryModel->getCategories();

            $data = [
                "title" => "About Millhouse Blog",
                "description" => "Welcome to the blog. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, corporis.",
                "category" => $category,
                "intro" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat saepe praesentium optio nam. Dignissimos officia cumque, aut fugit ullam quia saepe natus laudantium repudiandae suscipit?",
                "about" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat saepe praesentium optio nam. Dignissimos officia cumque, aut fugit ullam quia saepe natus laudantium repudiandae suscipit? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat saepe praesentium optio nam. Dignissimos officia cumque, aut fugit ullam quia saepe natus laudantium repudiandae suscipit?",
                "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat saepe praesentium optio nam. Dignissimos officia cumque, aut fugit ullam quia saepe natus laudantium repudiandae suscipit? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat saepe praesentium optio nam. Dignissimos officia cumque, aut fugit ullam quia saepe natus laudantium repudiandae suscipit? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat saepe praesentium optio nam. Dignissimos officia cumque, aut fugit ullam quia saepe natus laudantium repudiandae suscipit? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat saepe praesentium optio nam. Dignissimos officia cumque, aut fugit ullam quia saepe natus laudantium repudiandae suscipit? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat saepe praesentium optio nam. Dignissimos officia cumque, aut fugit ullam quia saepe natus laudantium repudiandae suscipit? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat saepe praesentium optio nam. Dignissimos officia cumque, aut fugit ullam quia saepe natus laudantium repudiandae suscipit? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat saepe praesentium optio nam. Dignissimos officia cumque, aut fugit ullam quia saepe natus laudantium repudiandae suscipit? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat saepe praesentium optio nam. Dignissimos officia cumque, aut fugit ullam quia saepe natus laudantium repudiandae suscipit?",
            ];
            $this->view("pages/about", $data);
        }
    }

    
<?php 
    class Post {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function pagination(){
            $this->db->query("SELECT * FROM posts as p
            INNER JOIN users as u on p.post_user_id = u.user_id
            ORDER BY p.post_created DESC");

            return $this->db->resultSet();
        }

        public function getPosts($page){
            $this->db->query("SELECT * FROM posts as p
                              INNER JOIN users as u on p.post_user_id = u.user_id
                              ORDER BY p.post_created DESC");
            $count = $this->db->rowCount();
            $count = ceil($count / 9);

            if($page === 1 || $page === ''){
                $page_1 = 0;
            } else {
                $page_1 = ($page * 9) - 9;
            }

            $getRows = $this->db->query("SELECT * FROM posts as p
                                         INNER JOIN users as u on p.post_user_id = u.user_id
                                         ORDER BY p.post_created DESC LIMIT $page_1, 9");

            return $this->db->resultSet();
        }

        public function addPost($data){
            $this->db->query("INSERT INTO posts (post_image, post_title, post_category_id, post_user_id, post_content, post_tags) 
                              VALUES (:post_image, :post_title, :post_category, :post_user_id, :post_content, :post_tags)");
            $this->db->bind(":post_image", $data['image']);
            $this->db->bind(":post_title", $data['title']);
            $this->db->bind(":post_category", $data['post_category']);
            $this->db->bind(":post_user_id", $data['user_id']);
            $this->db->bind(":post_content", $data['content']);
            $this->db->bind(":post_tags", $data['tags']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updatePost($data){
            $this->db->query("UPDATE posts SET 
                              post_title = :post_title, 
                              post_category_id = :post_category, 
                              post_content = :post_content, 
                              post_tags = :post_tags 
                              WHERE post_id = :post_id");
            $this->db->bind(":post_id", $data['id']);
            $this->db->bind(":post_title", $data['title']);
            $this->db->bind(":post_category", $data['post_category']);
            $this->db->bind(":post_content", $data['content']);
            $this->db->bind(":post_tags", $data['tags']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getSinglePost($id){
            $this->db->query("SELECT * FROM posts WHERE post_id = :id");
            $this->db->bind(":id", $id);

            return $row = $this->db->single();
        }

        public function updateImage($data){
            $this->db->query("UPDATE posts SET post_image = :post_image WHERE post_id = :id");
            $this->db->bind(":id", $data["post_id"]);
            $this->db->bind(":post_image", $data["image"]);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deletePost($id){
            $this->db->query("DELETE FROM posts WHERE post_id = :id");
            $this->db->bind(":id", $id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getComments($id){
            $this->db->query("SELECT * FROM (SELECT * FROM posts where post_id = :id) as p 
                              INNER JOIN comments as c on p.post_id = c.comment_post_id 
                              INNER JOIN users as u on c.comment_user_id = u.user_id");
            $this->db->bind(":id", $id);

            return $this->db->resultSet();
        }

        public function addComment($data){
            $this->db->query("INSERT INTO comments (comment_user_id, comment_post_id, comment_content) 
                              VALUES (:comment_user_id, :comment_post_id, :comment_content)");
            $this->db->bind(":comment_user_id", $data["new_comment_user"]);
            $this->db->bind(":comment_post_id", $data["post_id"]);
            $this->db->bind(":comment_content", $data["new_comment"]);
            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteComment($id){
            $this->db->query("DELETE FROM comments WHERE comment_id = :id");
            $this->db->bind(":id", $id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function latestPosts(){
            $this->db->query("SELECT * FROM posts as p
                              INNER JOIN users as u on p.post_user_id = u.user_id
                              WHERE post_category_id IS NOT NULL
                              ORDER BY post_id DESC LIMIT 3");
            return $this->db->resultSet();
        }
    }
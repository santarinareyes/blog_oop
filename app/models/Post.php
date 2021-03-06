<?php 
    class Post {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getPosts(){
            $this->db->query("SELECT * FROM posts as p
                              INNER JOIN users as u on p.post_user_id = u.user_id
                              ORDER BY p.post_created DESC");

            return $results = $this->db->resultSet();
        }

        public function addPost($data){
            $this->db->query("INSERT INTO posts (post_title, post_category_id, post_user_id, post_content, post_tags) 
                              VALUES (:post_title, :post_category, :post_user_id, :post_content, :post_tags)");
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
    }
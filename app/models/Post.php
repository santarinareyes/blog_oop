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
    }
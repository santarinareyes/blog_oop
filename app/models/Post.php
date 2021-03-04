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
            $this->db->query("INSERT INTO posts (post_title, post_user_id, post_content) 
                              VALUES (:post_title, :post_user_id, :post_content)");
            $this->db->bind(":post_title", $data['title']);
            $this->db->bind(":post_user_id", $data['user_id']);
            $this->db->bind(":post_content", $data['content']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
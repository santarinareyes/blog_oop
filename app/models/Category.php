<?php 
    class Category {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function singleCategory($id){
            $this->db->query("SELECT * FROM categories WHERE cat_id = :id");
            $this->db->bind(":id", $id);
            return $row = $this->db->single();
        }

        public function getCategories(){
            $this->db->query("SELECT * FROM categories");
            return $results = $this->db->resultSet();
        }

        public function getCategoryPosts($id){
            $this->db->query("SELECT * FROM (SELECT * FROM posts WHERE post_category_id = :id) as p
                              INNER JOIN users as u on p.post_user_id = u.user_id
                              ORDER BY p.post_created DESC");
            $this->db->bind(":id", $id);

            return $results = $this->db->resultSet();
        }

        public function addCategory($data){
            $this->db->query("INSERT INTO categories (cat_title) VALUES (:cat_title)");
            $this->db->bind(":cat_title", $data["title"]);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getSingleCategory($id){
            $this->db->query("SELECT * FROM categories WHERE cat_id = :id");
            $this->db->bind(":id", $id);

            return $this->db->single();
        }

        public function updateCategory($data){
            $this->db->query("UPDATE categories SET cat_title = :title WHERE cat_id = :id");
            $this->db->bind(":title", $data["title"]);
            $this->db->bind(":id", $data["id"]);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteCategory($id){
            $this->db->query("DELETE FROM categories WHERE cat_id = :id");
            $this->db->bind(":id", $id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
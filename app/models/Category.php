<?php 
    class Category {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getCategories(){
            $this->db->query("SELECT * FROM categories");
            return $results = $this->db->resultSet();
        }


    }
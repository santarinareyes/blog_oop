<?php 
    class User {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function findUserByEmail($email){
            $this->db->query("SELECT * FROM users WHERE user_email = :email");
            $this->db->bind(":email", $email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        public function findUserByUsername($username){
            $this->db->query("SELECT * FROM users where username = :username");
            $this->db->bind(":username", $username);

            $row = $this->db->single();

            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
    }
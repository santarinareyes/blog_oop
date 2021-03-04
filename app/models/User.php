<?php 
    class User {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function register($data){
            $this->db->query("INSERT INTO users (username, user_email, user_pass, user_status) VALUES (:username, :user_email, :user_pass, :user_status)");
            $this->db->bind(":username", $data['username']);
            $this->db->bind(":user_email", $data['email']);
            $this->db->bind(":user_pass", $data['password']);
            $this->db->bind(":user_status", "User");

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
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
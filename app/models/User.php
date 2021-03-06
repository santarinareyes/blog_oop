<?php 
    class User {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function register($data){
            $this->db->query("SELECT * FROM users");
            $count = $this->db->resultSet();

            if(count($count) < 1){
                $status = "Admin";
            } else {
                $status = "User";
            }

            $this->db->query("INSERT INTO users (username, user_email, user_pass, user_status) VALUES (:username, :user_email, :user_pass, :user_status)");
            $this->db->bind(":username", $data['username']);
            $this->db->bind(":user_email", $data['email']);
            $this->db->bind(":user_pass", $data['password']);
            $this->db->bind(":user_status", $status);

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

        public function login($username, $password){
            $this->db->query("SELECT * FROM users WHERE username = :username");
            $this->db->bind(":username", $username);

            $row = $this->db->single();
            $hashed_password = $row->user_pass;

            if(password_verify($password, $hashed_password)){
                return $row;
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

        public function getUserById($id){
            $this->db->query("SELECT * FROM users where user_id = :id");
            $this->db->bind(":id", $id);

            return $row = $this->db->single();
        }

        public function accountEdit($data){
            $this->db->query("UPDATE users SET user_pass = :password
                              WHERE user_id = :id");
            $this->db->bind(":id", $data["id"]);
            $this->db->bind(":password", $data["password"]);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function singleUser($id){
            $this->db->query("SELECT * FROM users WHERE user_id = :id");
            $this->db->bind(":id", $id);

            return $this->db->single();
        }

        public function getUsers(){
            $this->db->query("SELECT * FROM users ORDER BY user_status");

            return $this->db->resultSet();
        }

        public function promoteUser($id){
            $this->db->query("UPDATE users SET user_status = :user_status WHERE user_id = :id");
            $this->db->bind(":user_status", "Admin");
            $this->db->bind(":id", $id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function demoteUser($id){
            $this->db->query("UPDATE users SET user_status = :user_status WHERE user_id = :id");
            $this->db->bind(":user_status", "User");
            $this->db->bind(":id", $id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteUser($id){
            $this->db->query("DELETE FROM users WHERE user_id = :id");
            $this->db->bind(":id", $id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
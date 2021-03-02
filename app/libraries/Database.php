<?php 
    /*
     * PDO Databae Class
     * Connect to the database
     * Create prepared statements
     * Bind values
     * Return rows and results
     */

     class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;

        private $dbh;
        private $stm;
        private $error;

        public function __construct() {
            // Set DSN
            $dsn = $this->host;
            $options = array(
                // Will increase performance by checking if 
                // the connection is already established with the database
                PDO::ATTR_PERSISTENT => true,
                // 3 EROROR MODE: Silent, Warning, Exception
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // Create PDO instance with a try catch block
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch(PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
     }
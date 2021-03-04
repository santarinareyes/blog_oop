<?php 
    /*
     * PDO Database Class
     * Connecet to the database
     * Create prepared statements
     * Bind Values
     * Return rows and results
     */
    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $name = DB_NAME;

        private $dbh;
        private $stm;
        private $error;

        public function __construct()
        {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->name;
            $options = array(
                // Increase performance by checking to see if 
                // there is already a connection established
                PDO::ATTR_PERSISTENT => true,
                // A way to handle errors
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // Create PDO instance
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // Prepare statement with query
        public function query($sql){
            $this->stm = $this->dbh->prepare($sql);
        }

        // Bind values
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }

            $this->stm->bindValue($param, $value, $type);
        }

        public function execute(){
            return $this->stm->execute();
        }

        public function resultSet(){
            $this->execute();
            return $this->stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function single(){
            $this->execute();
            return $this->stm->fetch(PDO::FETCH_OBJ);
        }

        public function rowCount(){
            return $this->stm->rowCount();
        }
    }
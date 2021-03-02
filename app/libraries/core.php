<?php
    /*
     * App Core Class
     * Creates URL & loads core controller
     * URL FORMAT - /controller/method/params
     */
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            
            $url = $this->getUrl();

            if($url) {
                
                //Look in controllers for the first index value
                if(file_exists("../app/controllers/" . ucwords($url[0]) . ".php")){
                    $this->currentController = ucwords($url[0]);
                    unset($url[0]);
                }
            }

            // Require the controller
            require_once "../app/controllers/" . $this->currentController . ".php";

            // Instantiate controller class
            $this->currentController = new $this->currentController;
        }

        public function getUrl() {
            if(isset($_GET["url"])) {
                // Remove the last "/"
                $url = rtrim($_GET["url"], "/");
                // Sanitize anything that doesn't belong in the URL
                $url = filter_var($url, FILTER_SANITIZE_URL);
                // Put every string in an array and seperate by "/"
                $url = explode("/", $url);
                return $url;
            }
        }
    } 
     
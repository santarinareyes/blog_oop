<?php 
    /*
     * Base Controller
     * Loads the models and views
     */
    class Controller {
        public function model($model){
            // Require
            require_once "../app/models/" . $model . ".php";
            // Instantiate
            return new $model();
        }

        public function view($view, $data = []){
            if(file_exists(APPROOT . "/views/" . $view . ".php")){
                require_once APPROOT . "/views/" . $view . ".php";
            } else {
                die("View does not exist");
            }
        }
    }
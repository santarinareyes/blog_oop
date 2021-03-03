<?php 
    class Pages extends Controller {
        public function __construct()
        {
            echo "This is inside Pages <br/>";
        }

        public function index(){

        }

        public function about($id){
            echo $id;
        }
    }
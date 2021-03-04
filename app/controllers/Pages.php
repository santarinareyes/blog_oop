<?php 
    class Pages extends Controller {
        public function __construct()
        {
        }

        public function index(){
            $data = [
                "title" => "Inside The Index",
            ];

            $this->view("pages/index", $data);
        }
        
        public function about(){
            $data = [
                "title" => "Inside About",
                "testing" => " About Testing "
            ];
            $this->view("pages/about", $data);
        }
    }
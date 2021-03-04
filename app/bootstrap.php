<?php 
    // Config
    require_once "config/config.php";
    require_once "helpers/url_helper.php";
    // Autoloader Core Libraries
    spl_autoload_register(function($className){
        require_once "libraries/" . $className . ".php";
    });
<?php
    // Load Config
    require_once "config/config.php";

    // Load Libraries
    // require_once "libraries/Core.php";
    // require_once "libraries/Controller.php";
    // require_once "libraries/Db.php";

    // Autoload Core Libraries
    spl_autoload_register(function($className) {
        require "libraries/" . $className . ".php";
    });
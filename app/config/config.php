<?php 
    // DB Params
    // Change accordingly
    define("DB_HOST", "localhost:8888"); // E.g localhost
    define("DB_USER", "username"); // Your username to connect to your Database. Usually root
    define("DB_PASS", "password"); // Your database password
    define("DB_NAME", "blogoop");   /* Change this to desired datbase name.
                                      * If you choose to change this, then you have to change
                                      * the "CREATE DATABASE IF NOT EXISTS `blogoop`;
                                      * USE `blogoop`;
                                      */


    // APP Root
    define("APPROOT", dirname(dirname(__FILE__)));
    // URL Root
    define("URLROOT", "http://localhost/blog_oop");
    // Site name
    define("TITLE", "Millhouse Blog");
    define("SITENAME", "Millhouse");
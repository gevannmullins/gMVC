<?php

// Debug Mode
const RISE_DEBUG = 0;

// DB_TYPE options
// 1. mysql
// 2. sqlite
const DB_TYPE = 'sqlite';

// Global Path Directories
$path = dirname(dirname(__FILE__));
$cwd = getcwd();
// const ROOT_DIR = $path;
// echo ROOT_DIR;
define("ROOT_DIR", $path);
define("ASSETS_DIR", $path . "/public/assets");
define("BASE_PATH", $cwd);
define("MEDIA_PATH", $cwd . "/");

// Defining DB Credentials
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = 'root';
const DB_NAME = 'rise_ims';
// const DB_NAME = 'ultimate_rise';

// const DB_HOST = "sdb-70.hosting.stackcp.net";
// const DB_USER = "rise_ims-353035334658";
// const DB_PASS = "q0bmch0kyw";
// const DB_NAME = "rise_ims-353035334658";    


return [
    'database' => [
        'name' => DB_NAME,
        'username' => DB_USER,
        'password' => DB_PASS,
        'connection' => "mysql:host=localhost",
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ],
    ],
];
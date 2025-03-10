<?php

// Debug Mode
const RISE_DEBUG = 0;

// DB_TYPE options
// 1. mysql
// 2. sqlite
const DB_TYPE = 'mysql';

// Global Path Directories
$path = dirname(dirname(__FILE__));
$cwd = getcwd();
// const ROOT_DIR = $path;
// echo ROOT_DIR;
define("ROOT_DIR", $path);
define("ASSETS_DIR", $path . "/public/assets");
define("BASE_PATH", $cwd);
define("MEDIA_PATH", $cwd . "/");

// SQLite db path
const SQLITE_DB_PATH = '../app/db/ultimateDb.db';

// Defining DB Credentials
const MYSQL_DB_HOST = 'localhost';
const MYSQL_DB_USER = 'root';
const MYSQL_DB_PASS = 'root';
const MYSQL_DB_NAME = 'ultimate_db';
// const DB_NAME = 'ultimate_rise';

const ORACLE_DB_HOST = '';
const ORACLE_DB_PORT = '';
const ORACLE_DB_NAME = '';
const ORACLE_DB_USER = '';
const ORACLE_DB_PASS = '';


// const DB_HOST = "sdb-70.hosting.stackcp.net";
// const DB_USER = "rise_ims-353035334658";
// const DB_PASS = "q0bmch0kyw";
// const DB_NAME = "rise_ims-353035334658";    

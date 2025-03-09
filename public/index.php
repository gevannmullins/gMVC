<?php

// // CRUD Routes Examples
// $router->get('crud/index', 'CrudController@index');
// $router->get('crud/create', 'CRUDController@create');
// $router->post('crud/store', 'CRUDController@store');
// $router->get('crud/edit/{id}', 'CRUDController@edit');
// $router->post('crud/update/{id}', 'CRUDController@update');
// $router->post('crud/delete/{id}', 'CRUDController@destroy');

session_start();

require_once '../vendor/autoload.php';
require_once '../config/config.php';

use App\Core\Router;

$router = new Router();

// Home Route
$router->get('', 'HomeController@index');



// // Admin Routes
$router->get('admin/login', 'AuthController@showLoginForm');
$router->post('admin/authenticate', 'AuthController@authenticate');
$router->get('admin/logout', 'AuthController@logout');

// Admin Dashboard Route (Example)
$router->get('admin/dashboard', 'AdminController@dashboard');


// User Profile
$router->get('user/profile', 'UserController@showUserProfile');
$router->post('user/updateProfile', 'UserController@updateProfile');
$router->post('user/updateProfileImage', 'UserController@updateProfileImage');

// Media
$router->get('media/list', 'MediaController@viewMedia');
$router->post('media/form', 'MediaController@loadMediaForm');
$router->post('media/mediaEditorForm', 'MediaController@loadMediaEditorForm');
$router->post('media/upload', 'MediaController@uploadMedia');





// Users
$router->get('users/list', 'UserController@showAllUsers');
$router->post('users/add', 'UserController@addUser');





// Tools
$router->get('admin/tools', 'ToolsController@index');



// Chat test
$router->get('chat/index', 'ChatController@index');
$router->get('chat/messages', 'ChatController@showMessages');
$router->post('chat/send', 'ChatController@sendMessage');


// Handle the request
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$requestType = $_SERVER['REQUEST_METHOD'];

$router->direct($uri, $requestType);
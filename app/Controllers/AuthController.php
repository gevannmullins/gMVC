<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller {

    protected $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function showLoginForm() {
        $this->view('auth/login');
    }


    public function authenticate() {

        session_start();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->userModel->findByUsername($username);

        if (password_verify($password, $user[0]['password'])) {
            // Password matches, login successful
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];
            $_SESSION['name'] = $user[0]['name'];
            $_SESSION['surname'] = $user[0]['surname'];
            $_SESSION['logged_in'] = '1';

            // $this->view('admin/dashboard', [
            //     'data' => $user[0]
            // ]);

            $this->redirect('admin/dashboard');

        } else {
            // Username or password is incorrect
            $this->view('auth/login', [
                    'error' => 'Username or password is incorrect.'
                ]
            );
        }

    }

    public function logout() {
        session_unset();
        session_destroy();
        $this->redirect('admin/login');
    }
}

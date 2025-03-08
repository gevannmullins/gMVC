<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AdminController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function dashboard()
    {
        $username = $_SESSION['username'];

        $user = $this->userModel->findByUsername($username);
        $userRole = $this->userModel->getAccessRole($user[0]["access_role"]);

        $this->view('admin/dashboard', [
            'data' => $user[0],
            "userRole" => $userRole
        ]);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $this->redirect('admin/login');
    }

}

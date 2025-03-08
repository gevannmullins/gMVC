<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Models\Media;
use DateTime;

class UserController extends Controller 
{

    protected $userModel;
    protected $mediaModel;
    // protected $pdo;

    public function __construct() {
        $this->userModel = new User();
        $this->mediaModel = new Media();
    }


    public function findByUserId($id)
    {
        // $userModel = new User();
        $userData = $this->userModel->find($id);
        $this->view('users/list', [
            'data' => $userData
        ] );

    }

    public function showAllUsers()
    {
        $users = $this->userModel->all();
        // $newUser = $userModel->createUser();
        $this->view('users/list', [
            'page_title' => 'Users',
            'data' => $users
        ]);

    }

    
    public function addUser()
    {
        $this->userModel->create($_POST);
        $this->redirect('users/list');
    }



    public function showUserProfile()
    {
        $userId = $_SESSION["user_id"];
        $uploadedImages = $this->mediaModel->getAllMedia();
        $userProfile = $this->userModel->findUserProfile($userId);

        
        //Calculate the age
        $today = new DateTime();
        $birthDate = new DateTime($userProfile['dob']);
        $diff = $birthDate->diff($today);

        $age = $diff->y;


        $userProfile['age'] = $age;

        $this->view('users/profile', [
            "media" => $uploadedImages,
            "userProfile" => $userProfile
        ]);
    }

    public function updateProfileImage()
    {
        $userId = $_SESSION["user_id"];
        $profileImagePath = $_POST['imageUrl'];
        $postData = ['profile_image_path' => $profileImagePath];

        $this->userModel->updateUserProfileImage($userId, $postData);
    }

    public function updateProfile()
    {
        $postData = $_POST;
        $userId = $_SESSION["user_id"];
        $this->userModel->updateUserProfile($userId, $postData);
    }


}

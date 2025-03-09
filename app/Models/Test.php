<?php

namespace App\Models;

use App\Core\Model;

class Test extends Model {

    public function createDbTable()
    {
        $sql = "
            CREATE TABLE `users` (
                `id` int(11) UNSIGNED NOT NULL,
                `username` varchar(50) NOT NULL,
                `password` varchar(255) NOT NULL,
                `name` varchar(255) NOT NULL,
                `surname` varchar(255) NOT NULL,
                `mobile` varchar(99) NOT NULL,
                `email` varchar(100) NOT NULL,
                `title` varchar(100) NOT NULL,
                `branch` varchar(100) NOT NULL,
                `access_role` varchar(100) NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
             ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }

    public function all() 
    {
        return $this->getAll("users");
    }


      
    public function findByUsername($username) 
    {
        return $this->getAll("users", ["username"=>$username]);
    }

    public function findById($id)
    {
        return $this->getRow("users", ["id"=>$id]);

    }




    public function create($data) {
        $user_password = $data['password'];
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT); 
        $data['password'] = $hashed_password;
        return $this->insert("users", $data);
    }

    public function find($id) {
        return $this->getAll("users", ["id"=> $id]);
    }

    public function updateUser($id, $data) {
        $data['id'] = $id;
        return $this->update("users", $data, ["id"=>$id]);
    }

    public function deleteUser($id) {
        return $this->delete("users", ["id"=>$id]);
    }

    public function getAccessRole($roleId)
    {
        $accessRole = $this->getRow("user_access_roles", ["id"=>$roleId]);
        return $accessRole["role_name"];
    }

    public function findUserProfile($id)
    {
        return $this->getRow("user_profiles", ["user_id" => $id]);
    }

    public function updateUserProfileImage($id, $data) {
        // $data['id'] = $id;
        return $this->update("user_profiles", $data, ["user_id"=>$id]);
    }

    public function updateUserProfile($id, $data) {
        // $data['id'] = $id;
        return $this->update("user_profiles", $data, ["user_id"=>$id]);
    }










    public function createUser()
    {
        $password = '12345';
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

        $data = [
            'username' => 'gevann',
            'password' => $hashed_password,
            'email' => 'gevann.mullins@gmail.com'
        ];

        // $sql = "INSERT INTO `users` (`username`, `password`, `email`) VALUES ('gevann.mullins@gmail.com', '$hashed_password', 'gevann.mullins@gmail.com')";
        $sql = "INSERT INTO users (`username`, `password`, `email`) VALUES (:username, :password, :email)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
        return [
            'username' => 'gevann',
            'password' => $hashed_password,
            'email' => 'gevann.mullins@gmail.com'
        ];

    }


}

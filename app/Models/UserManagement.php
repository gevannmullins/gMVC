<?php

namespace App\Models;

use App\Core\Model;

class UserManagement extends Model 
{
    

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

    public function all() {
        return $this->getAll("users");
    }

    public function create($data) {
        return $this->insert("users", $data);
    }

    public function find($id) {
        // return $this->getRow("users", ["id"=>$id]);
        $statement = $this->pdo->prepare("SELECT * as count FROM users WHERE id = :id");
        $statement->execute(['id' => $id]);
        return $statement->fetch();

    }

    public function updateDomain($id, $data) {
        return $this->update("users", $data, ["id"=>$id]);
    }

    public function deleteDomainById($id) {
        return $this->delete("users", ["id"=>$id]);
    }

    public function checkIfUserEmailExists($email)
    {
        $statement = $this->pdo->prepare("SELECT COUNT(*) as count FROM users WHERE email = :email");
        $statement->execute(['email' => $email]);
        return $statement->fetch();
    }

    public function importUser($data)
    {
        return $this->insert("users", $data);

    }

    public function usageCounterInfo($columnName){
        return $this->usageData("users", $columnName);
    }

    public function uniqueEntriesList($columnName){
        return $this->uniqueEntries("users", $columnName);
    }

    public function countUniqueEntries($columnName, $columnValue)
    {
        return $this->countEntries("users", $columnName, $columnValue);

    }





}

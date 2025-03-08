<?php

namespace App\Models;

use App\Core\Model;

class Media extends Model 
{

    public function createDbTable()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS `media` (
            `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `label` VARCHAR(255) NOT NULL,
            `type` VARCHAR(255) NOT NULL,
            `category` VARCHAR(255) NOT NULL,
            `description` VARCHAR(255) NOT NULL,
            `file_path` VARCHAR(255) NOT NULL,
            `user_id` VARCHAR(255) NOT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }

    public function getAllMedia()
    {
        return $this->getAll("media");
    }

    public function getAllMediaByThisUser()
    {
        $this_user = $_SESSION["user_id"];
        return $this->getAll("media", ["user_id"=>$this_user]);

    }

    public function getAllMediaByUserId($user_id)
    {
        return $this->getAll("media", ["user_id"=>$user_id]);
    }

    public function saveMedia($data)
    {
        return $this->insert("media", $data);

    }


}
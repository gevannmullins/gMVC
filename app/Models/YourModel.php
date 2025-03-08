<?php

namespace App\Models;

use App\Core\Model;

class YourModel extends Model {
    public function all() {
        $statement = $this->pdo->prepare("SELECT * FROM your_table");
        $statement->execute();

        return $statement->fetchAll();
    }

    public function create($data) {
        $sql = "INSERT INTO your_table (column1, column2) VALUES (:column1, :column2)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }

    public function find($id) {
        $statement = $this->pdo->prepare("SELECT * FROM your_table WHERE id = :id");
        $statement->execute(['id' => $id]);

        return $statement->fetch();
    }

    public function update($id, $data) {
        $data['id'] = $id;
        $sql = "UPDATE your_table SET column1 = :column1, column2 = :column2 WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }

    public function delete($id) {
        $statement = $this->pdo->prepare("DELETE FROM your_table WHERE id = :id");
        $statement->execute(['id' => $id]);
    }
}

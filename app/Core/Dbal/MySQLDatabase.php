<?php

namespace app\Core\Dbal;

use PDO;
use PDOException;

class MySQLDatabase {
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            // return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    public function insert($table, $data) {
        try {
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo "Insert failed: " . $e->getMessage();
        }
    }

    public function update($table, $data, $where) {
        try {
            $fields = "";
            foreach ($data as $key => $value) {
                $fields .= "$key = :$key, ";
            }
            $fields = rtrim($fields, ", ");
            $sql = "UPDATE $table SET $fields WHERE $where";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
        }
    }

    public function delete($table, $where, $params = []) {
        try {
            $sql = "DELETE FROM $table WHERE $where";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
        } catch (PDOException $e) {
            echo "Delete failed: " . $e->getMessage();
        }
    }

    public function getAll($table) {
        try {
            $sql = "SELECT * FROM $table";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Get all failed: " . $e->getMessage();
        }
    }

    public function getRow($table, $where, $params = []) {
        try {
            $sql = "SELECT * FROM $table WHERE $where";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Get row failed: " . $e->getMessage();
        }
    }
}

<?php

namespace App\Core\dblayer;
use PDO;
use PDOException;

class SQLite
{
    protected $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('sqlite:app/db/ultimateDb.db');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    /**
     * Executes a custom SQL query and returns the results.
     *
     * @param string $sql The SQL query to execute.
     * @param array $params An associative array of parameters to bind to the query.
     * @return array|false An array of associative arrays representing the rows or false on failure.
     */
    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Inserts a new row into the specified table.
     *
     * @param string $table The name of the table.
     * @param array $data An associative array of column names and values to insert.
     * @return bool Returns true on success, false on failure.
     */
    public function insert($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $values = implode(", ", array_fill(0, count($data), "?"));
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_values($data));
    }

    /**
     * Updates existing rows in the specified table based on a where condition.
     *
     * @param string $table The name of the table.
     * @param array $data An associative array of column names and values to update.
     * @param array $where An associative array of column names and values to specify the where condition.
     * @return bool Returns true on success, false on failure.
     */
    public function update($table, $data, $where)
    {
        $set = implode(", ", array_map(fn($key) => "$key = ?", array_keys($data)));
        $whereClause = implode(" AND ", array_map(fn($key) => "$key = ?", array_keys($where)));
        $sql = "UPDATE $table SET $set WHERE $whereClause";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_merge(array_values($data), array_values($where)));
    }

    /**
     * Deletes rows from the specified table based on a where condition.
     *
     * @param string $table The name of the table.
     * @param array $where An associative array of column names and values to specify the where condition.
     * @return bool Returns true on success, false on failure.
     */
    public function delete($table, $where)
    {
        $whereClause = implode(" AND ", array_map(fn($key) => "$key = ?", array_keys($where)));
        $sql = "DELETE FROM $table WHERE $whereClause";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_values($where));
    }

    /**
     * Retrieves all rows from the specified table.
     *
     * @param string $table The name of the table.
     * @return array An array of associative arrays representing the rows.
     */
    public function getAll($table)
    {
        $sql = "SELECT * FROM $table";
        // $stmt = $this->query($sql);
        // return $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->query($sql);
    }

    /**
     * Retrieves a specific row from the specified table based on a where condition.
     *
     * @param string $table The name of the table.
     * @param array $where An associative array of column names and values to specify the where condition.
     * @return array|false An associative array representing the row or false if no row is found.
     */
    public function getRow($table, $where)
    {
        $whereClause = implode(" AND ", array_map(fn($key) => "$key = ?", array_keys($where)));
        $sql = "SELECT * FROM $table WHERE $whereClause";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_values($where));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

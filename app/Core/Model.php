<?php

namespace App\Core;

use PDO;
use PDOException;

class Model
{

    protected $pdo;
    protected $stmt;

    public function __construct()
    {
        if (DB_TYPE == 'mysql') {
            $servername = DB_HOST;
            $username = DB_USER;
            $password = DB_PASS;
            $db = DB_NAME;
            try {
                $this->pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                // set the PDO error mode to exception
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

        } elseif (DB_TYPE == 'sqlite') {
            try {
                $this->pdo = new PDO('sqlite:../app/db/ultimateDb.db');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        // switch (DB_TYPE) {
        //     case 'mysql':
        //         $servername = DB_HOST;
        //         $username = DB_USER;
        //         $password = DB_PASS;
        //         $db = DB_NAME;
        //         try {
        //     $this->pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        //             // set the PDO error mode to exception
        //             $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //         } catch (PDOException $e) {
        //             echo "Connection failed: " . $e->getMessage();
        //         }
        //         break;
        
        //     case 'sqlite':
        //         try {
        //             $this->pdo = new PDO('sqlite:../app/database.db');
        //             $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //         } catch (PDOException $e) {
        //             echo "Connection failed: " . $e->getMessage();
        //         }
        //         break;
        
        //     default:
        //         echo "Unsupported database type.";
        //         break;
        //     }
    }

    /**
     * query - Method to run any query with optional parameters
     * @param mixed $sql
     * @param mixed $params
     * @return bool
     */
    public function query($sql, $params = [])
    {
        // try {
        //     $this->stmt = $this->pdo->prepare($sql);
        //     return $this->stmt->execute($params);
        // } catch (PDOException $e) {
        //     die("Query failed: " . $e->getMessage());
        // }

        if ($this->pdo === null) {
            throw new \Exception("Database connection not initialized.");
        }
    
        try {
            $this->stmt = $this->pdo->prepare($sql);
            return $this->stmt->execute($params);
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage());
            throw new \Exception("Query execution failed.");
        }
    }

    /**
     * insert - Insert data into a table
     * @param mixed $table
     * @param mixed $data
     * @return bool
     */
    public function insert($table, $data)
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        return $this->query($sql, $data);
    }

    /**
     * update - Update data in a table
     * @param mixed $table
     * @param mixed $data
     * @param mixed $where
     * @return bool
     */
    public function update($table, $data, $where)
    {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ', ');

        $whereClause = '';
        foreach ($where as $key => $value) {
            $whereClause .= "$key = :$key AND ";
        }
        $whereClause = rtrim($whereClause, ' AND ');

        $sql = "UPDATE $table SET $set WHERE $whereClause";
        return $this->query($sql, array_merge($data, $where));
    }

    /**
     * delete - Delete data from a table
     * @param mixed $table
     * @param mixed $where
     * @return bool
     */
    public function delete($table, $where)
    {
        $whereClause = '';
        foreach ($where as $key => $value) {
            $whereClause .= "$key = :$key AND ";
        }
        $whereClause = rtrim($whereClause, ' AND ');

        $sql = "DELETE FROM $table WHERE $whereClause";
        return $this->query($sql, $where);
    }

    /**
     * getRow - Returns a single row of data. Where is optional
     * @param mixed $table
     * @param mixed $where
     * @return mixed
     */
    public function getRow($table, $where = [])
    {
        $whereClause = '';
        if (!empty($where)) {
            $whereClause = 'WHERE ';
            foreach ($where as $key => $value) {
                $whereClause .= "$key = :$key AND ";
            }
            $whereClause = rtrim($whereClause, ' AND ');
        }

        $sql = "SELECT * FROM $table $whereClause LIMIT 1";
        $this->query($sql, $where);
        return $this->stmt->fetch();
    }

    /**
     * etAll - Return all the table data. Where is optional
     * @param mixed $table
     * @param mixed $where
     * @return mixed
     */
    public function getAll($table, $where = [])
    {
        $whereClause = '';
        if (!empty($where)) {
            $whereClause = 'WHERE ';
            foreach ($where as $key => $value) {
                $whereClause .= "$key = :$key AND ";
            }
            $whereClause = rtrim($whereClause, ' AND ');
        }

        $sql = "SELECT * FROM $table $whereClause";
        $this->query($sql, $where);
        return $this->stmt->fetchAll();
    }

    public function usageData($table, $columnName)
    {
        $sql = "SELECT COUNT(DISTINCT $columnName) AS unique_count FROM $table;";
        $this->query($sql);
        return $this->stmt->fetchAll();
        // $statement = $this->pdo->prepare($sql);
        // $statement->execute();
        // return $statement->fetch();

    }

    public function uniqueEntries($table, $columnName)
    {
        $sql = "SELECT DISTINCT $columnName FROM $table;";
        $this->query($sql);
        return $this->stmt->fetchAll();
    }

    public function countEntries($table, $columnName, $columnValue)
    {
        $sql = "SELECT COUNT(*) AS count_rows FROM $table WHERE $columnName = '$columnValue';";
        $this->query($sql);
        return $this->stmt->fetchAll();
    }



}

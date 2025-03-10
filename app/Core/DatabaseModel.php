<?php

namespace app\Core;

use Exception;

use app\Core\Dbal\SQLiteDatabase;
use app\Core\Dbal\MySQLDatabase;
use app\Core\Dbal\OracleDatabase;

class DatabaseModel {
    private $db;
    
    public function __construct() {
        switch (DB_TYPE) {
            case 'mysql':
                $this->db = new MySQLDatabase(MYSQL_DB_HOST, MYSQL_DB_NAME, MYSQL_DB_USER, MYSQL_DB_PASS);
                break;
            case 'sqlite':
                $this->db = new SQLiteDatabase(SQLITE_DB_PATH);
                break;
            // case 'oracle':
            //     $this->db = new OracleDatabase(ORACLE_DB_HOST, ORACLE_DB_PORT, ORACLE_DB_NAME, ORACLE_DB_USER, ORACLE_DB_PASS);
            //     break;
            default:
                throw new Exception("Unsupported DB_TYPE: " . DB_TYPE);
        }
    }

    // Proxy methods to the actual database class methods
    public function query($sql, $params = []) {
        return $this->db->query($sql, $params);
    }

    public function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function update($table, $data, $where) {
        return $this->db->update($table, $data, $where);
    }

    public function delete($table, $where, $params = []) {
        return $this->db->delete($table, $where, $params);
    }

    public function getAll($table) {
        return $this->db->getAll($table);
    }

    public function getRow($table, $where, $params = []) {
        return $this->db->getRow($table, $where, $params);
    }
}
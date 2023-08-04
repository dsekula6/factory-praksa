<?php 

namespace Daniel\Factory\Class;

use PDO;
use Exception;
use PDOException;

class Connection
{
    private static ?Connection $instance = null;
    private PDO $connection;

    private function __construct()
    {
        $dbHost = 'localhost';
        $dbName = 'jela';
        $dbUser = 'root';
        $dbPass = 'root';

        try {
            $this->connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function fetchAssoc(string $query, array $params = [])
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAssocAll(string $query, array $params = [])
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(string $table, array $rows)
    {
        if (empty($rows)) {
            throw new Exception("Insert failed:empty.");
        }
        $columns = implode(', ', array_keys($rows[0]));
        $placeholders = ':' . implode(', :', array_keys($rows[0]));
    
        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->connection->prepare($query);
    
        try {
            foreach ($rows as $row) {
                foreach ($row as $key => $value) {
                    $stmt->bindValue(":$key", $value);
                }
                $stmt->execute();
                $stmt->closeCursor();
            }
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Insert failed: " . $e->getMessage());
        }
    }
    
    public function update(string $table, array $data, array $condition)
    {
        if (!isset($condition['column']) || !isset($condition['value'])) {
            throw new Exception("Invalid condition. Both 'column' and 'value' must be provided.");
        }
    
        $setClause = '';
        foreach ($data as $column => $value) {
            $setClause .= "$column = :$column, ";
        }
        $setClause = rtrim($setClause, ', ');
    
        $query = "UPDATE $table SET $setClause WHERE {$condition['column']} = :condition_value";
        $stmt = $this->connection->prepare($query);
    
        foreach ($data as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }
        $stmt->bindValue(":condition_value", $condition['value']);
    
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Update failed: " . $e->getMessage());
        }
    }

    public function delete(string $table, array $condition)
    {
        if (!isset($condition['column']) || !isset($condition['value'])) {
            throw new Exception("Invalid condition.");
        }

        $query = "DELETE FROM $table WHERE {$condition['column']} = :condition_value";
        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(":condition_value", $condition['value']);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Delete failed: " . $e->getMessage());
        }
    }
    
}

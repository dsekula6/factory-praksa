<?php 

namespace Daniel\Factory\Class;

use PDO;
use Exception;
use PDOException;

class Connection
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        $dbHost = 'localhost';
        $dbName = 'jutarnji';
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

    public function fetchAssoc($query, $params = [])
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAssocAll($query, $params = [])
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->connection->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        try {
            $stmt->execute();
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Insert failed: " . $e->getMessage());
        }
    }

    public function update($table, $data)
    {
        if (!isset($data['id'])) {
            throw new Exception("no 'id' match");
        }

        $id = $data['id'];
        unset($data['id']);

        $setClause = '';
        foreach ($data as $column => $value) {
            $setClause .= "$column = :$column, ";
        }
        $setClause = rtrim($setClause, ', ');

        $query = "UPDATE $table SET $setClause WHERE id = :id";
        $stmt = $this->connection->prepare($query);

        foreach ($data as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }
        $stmt->bindValue(":id", $id);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Update failed: " . $e->getMessage());
        }
    }
}

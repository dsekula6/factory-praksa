<?php

namespace Daniel\Factory\Class;

use Exception;

class Model
{
    protected static $table;
    protected static $primaryKey = 'id';
    protected $attributes = [];

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function save()
    {
        $data = $this->attributes;

        $db = Connection::getInstance();
        $primaryKey = static::$primaryKey;
        $table = static::$table;

        $id = $db->insert($table, $data);

        $this->attributes[$primaryKey] = $id;
    }

    public function update()
    {
        $data = $this->attributes;
        $db = Connection::getInstance();

        if (!isset($data[static::$primaryKey])) {
            throw new Exception("No primary key for update.");
        }

        $table = static::$table;

        $db->update($table, $data);
    }

    public static function find($primaryKeyValue)
    {
        $db = Connection::getInstance();
        $primaryKey = static::$primaryKey;
        $table = static::$table;

        $query = "SELECT * FROM $table WHERE $primaryKey = :primaryKeyValue";
        $params = [':primaryKeyValue' => $primaryKeyValue];

        $row = $db->fetchAssoc($query, $params);

        if ($row) {
            return new static($row);
        }

        return null;
    }

    public function toArray()
    {
        return $this->attributes;
    }
}

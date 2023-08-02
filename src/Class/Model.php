<?php

namespace Daniel\Factory\Class;

use Exception;

class Model
{
    protected static string $table;
    protected static string $primaryKey = 'id';
    protected array $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function __set(string $name, string $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __get(string $name): mixed
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

        $primaryKey = static::$primaryKey;
        $table = static::$table;

        $condition = [
            'column' => $primaryKey,
            'value' => $data[$primaryKey],
        ];

        $db->update($table, $data, $condition);
    }

    public static function find(string $primaryKeyValue): ?static
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

    public function toArray(): ?array
    {
        return $this->attributes;
    }
}

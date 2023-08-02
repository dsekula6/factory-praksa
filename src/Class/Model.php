<?php

namespace Daniel\Factory\Class;

use Exception;
use Daniel\Factory\Class\Traits\HasTimestamps;
use Daniel\Factory\Class\Traits\DeletedAt;

class Model
{
    use HasTimestamps, DeletedAt;

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
        $this->setCreatedAt();
        $id = Connection::getInstance()->insert(static::$table, $this->attributes);
        $this->attributes[static::$primaryKey] = $id;
    }

    public function update()
    {
        if (!isset($this->attributes[static::$primaryKey])) {
            throw new Exception("No primary key for update.");
        }
        $this->setUpdatedAt();

        $condition = [
            'column' => static::$primaryKey,
            'value' => $this->attributes[static::$primaryKey],
        ];

        Connection::getInstance()->update(static::$table, $this->attributes, $condition);
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

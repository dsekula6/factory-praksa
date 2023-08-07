<?php

namespace Daniel\Factory\Model;

use Daniel\Factory\Class\Connection;

class MealModel extends Model
{
    protected static string $table = 'meal';
    protected static string $primaryKey = 'id';

    public function save()
    {
        $this->setCreatedAt();

        $ingredients = $this->attributes['ingredients'] ?? [];
        unset($this->attributes['ingredients']);

        $id = Connection::getInstance()->insert(static::$table, [$this->attributes]);
        $this->attributes[static::$primaryKey] = $id;

        foreach ($ingredients as $ingredient) {
            $ingredient->meal_id = $id;
            $ingredient->save();
        }
    }
}

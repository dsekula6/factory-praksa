<?php

namespace Daniel\Factory\Model;

use Daniel\Factory\Class\Connection;

class MealIngredientModel extends Model
{
    protected static string $table = 'meal_ingredient';

    public function save()
    {
        Connection::getInstance()->insert(static::$table, [$this->attributes]);
    }
}
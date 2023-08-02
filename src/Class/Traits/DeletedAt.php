<?php

namespace Daniel\Factory\Class\Traits;

use Daniel\Factory\Class\Connection;

trait DeletedAt
{
    public function delete()
    {
        $condition = [
            'column' => static::$primaryKey,
            'value' => $this->attributes[$primaryKey],
        ];

        Connection::getInstance()->delete(static::$table, $condition);
    }

    public function softDelete()
    {
        $this->attributes['deleted_at'] = date('Y-m-d H:i:s');
        $this->update();
    }
}

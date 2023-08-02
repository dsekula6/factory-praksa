<?php

namespace Daniel\Factory\Class\Traits;

trait HasTimestamps
{
    public function setCreatedAt()
    {
        $this->attributes['created_at'] = date('Y-m-d H:i:s');
    }

    public function setUpdatedAt()
    {
        $this->attributes['updated_at'] = date('Y-m-d H:i:s');
    }
}

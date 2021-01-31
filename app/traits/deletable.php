<?php

namespace App\traits;

trait deletable 
{
    public function getDeletedAttribute()
    {
        return $this->deleted_at !== null ? "style=background:red" : '';
    }
}
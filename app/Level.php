<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'Level';

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function scopeSelectName($query)
    {
        return $query->select('id','name');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'Departments';

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function scopeSelectName($query)
    {
        return $query->select('id','department','scope');
    }
}

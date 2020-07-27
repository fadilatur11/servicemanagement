<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'Categories';

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function scopeSelectName($query)
    {
        return $query->select('id','category');
    }
}

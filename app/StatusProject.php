<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProject extends Model
{
    protected $table = 'status_projects';
    protected $primaryKey = 'id';

    public function scopeSelectField($query)
    {
        return $query->select('id','name');
    }
}

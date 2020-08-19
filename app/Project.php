<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ['name','categories','status'];

    public function scopeGetStatus($query,$status)
    {
        return $query->where('status',$status);
    }
}

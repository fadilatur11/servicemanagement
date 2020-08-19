<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeSelectField($query)
    {
        return $query->select('id','name','role','responsibility');
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function scopeResponsibility($query,$responsibility)
    {
        return $query->where('responsibility',$responsibility);
    }
    public function tickets()
    {
        return $this->hasMany('App\Ticket')->select('id','project','category_id','ticket_no','department_id','user_id','send_to','pickup_by','level','subject','created_at',);
    }
}

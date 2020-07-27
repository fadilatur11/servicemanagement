<?php
namespace App\Repositories\Eloquent;

use App\Repositories\UserRepositoryInterface;
use App\User;
use Auth;

class UserRepository implements UserRepositoryInterface
{
    private $model;
    
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function relationticket()
    {
        $user = $this->model->find(Auth::user()->id);
        return $user->tickets();
    }
}
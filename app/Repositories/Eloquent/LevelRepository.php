<?php
namespace App\Repositories\Eloquent;

use App\Repositories\LevelRepositoryInterface;
use App\Level;

class LevelRepository implements LevelRepositoryInterface
{
    private $model;
    public function __construct(Level $model)
    {
        $this->model = $model;
    }
    
    public function getdata()
    {
        return $this->model->SelectName()->Active()->get();
    }
}
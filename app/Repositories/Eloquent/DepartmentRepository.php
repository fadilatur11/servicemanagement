<?php
namespace App\Repositories\Eloquent;

use App\Repositories\DepartmentRepositoryInterface;
use App\Department;

class DepartmentRepository implements DepartmentRepositoryInterface
{

    private $model;
    public function __construct(Department $model)
    {
        $this->model = $model;
    }
    public function getdata()
    {
        return $this->model->SelectName()->Active()->get();
    }
}
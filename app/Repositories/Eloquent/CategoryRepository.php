<?php

namespace App\Repositories\Eloquent;
use App\Repositories\CategoryRepositoryInterface;
use App\Categories;

class CategoryRepository implements CategoryRepositoryInterface
{
    private $categories;
    public function __construct(Categories $categories)
    {
        $this->model = $categories;
    }

    public function getdata()
    {
        return $this->model->SelectName()->Active()->get();
    }
}


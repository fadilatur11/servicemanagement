<?php
namespace App\Repositories\Eloquent;

use App\Repositories\TicketRepositoryInterface;
use App\Ticket;

class TicketRepository implements TicketRepositoryInterface
{
    private $model;
    public function __construct(Ticket $model)
    {
        $this->model = $model;
    }
    public function create($attributes)
    {
        return $this->model->create($attributes);
    }
}
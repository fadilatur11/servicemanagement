<?php
namespace App\Repositories;

use App\Services\CreateTicketService;

interface TicketRepositoryInterface{
    public function create(CreateTicketService $attributes);
}
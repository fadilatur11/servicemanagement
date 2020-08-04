<?php 

namespace App\Services;
use App\Ticket;

class CountLevelService
{
    public static function countLevel($level,$status)
    {
        $getlevel = '';
        foreach ($level as $value) {
            if ($status == 0) {
                $getlevel .= Ticket::FilterLevel($value['id'])->count().",";
            } elseif ($status == 2) {
                $getlevel .= Ticket::TicketStatus(2)->FilterLevel($value['id'])->count().",";
            }
        }
        $data = explode(",",$getlevel);
        return $data;
    }

}

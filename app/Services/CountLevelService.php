<?php 

namespace App\Services;
use App\Ticket;

class CountLevelService
{
    /**
     * Undocumented function
     *
     * @param [type] $level
     * @param [type] $status. 0 = none, 1 = progress, 2 = finished/completely, 3 = closed
     * @return void
     */
    public static function countLevel($level,$status)
    {
        $getlevel = '';
        foreach ($level as $value) {
            if ($status == 0) {
                $getlevel .= Ticket::FilterLevel($value['id'])->count().",";
            } else {
                $getlevel .= Ticket::TicketStatus($status)->FilterLevel($value['id'])->count().",";
            }
        }
        $data = explode(",",$getlevel);
        return $data;
    }

}

<?php 

namespace App\Services;

class CreateTicketService
{
    public static function create($data)
    {
        $ticket_number = 'SM-'.time();
        $post = [
                'project' => $data['project'],
                'ticket_no' => $ticket_number,
                'user_id' => $data['user_id'],
                'subject' => $data['subject'],
                'category_id' => $data['category_id'],
                'department_id' => $data['department_id'],
                'send_to' => $data['send_to'],
                'level' => $data['level'],
                'url' => $data['url'],
                'description' => $data['description']
                ];
        return $post;
    }
}

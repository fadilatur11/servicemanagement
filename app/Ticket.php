<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id','department_id','project',
        'user_id','send_to','pickup_by','level',
        'subject','description','url','file','read','ticket_no'];

        /**
         * Scope a query to get data ticket
         */
       
        public function scopeSelectName($query)
        {
            return $query->select('id','project','ticket_no','department_id','user_id','send_to','pickup_by','level','subject','created_at');
        }

        public function scopeUserid($query,$userid)
        {
            return $query->where('user_id',$userid);
        }

        public function scopeSorting($query)
        {
            return $query->orderBy('created_at','desc');
        }

        public function scopeFilterLevel($query, $level)
        {
            if($level != ''){
                return $query->where('level', $level);
            }
        }

        public function scopeFilterTicket($query, $ticket)
        {
            if ($ticket != '') {
                return $query->where('ticket_no',$ticket);
            }
        }

        public function scopeFilterDate($query, $date)
        {
            if ($date != '') {
                return $query->where('created_at','LIKE','%'.$date.'%');
            }
        }

        /**
         * relation ticket with table user and category
         *
         * belongsTo custom ('table yg relasi (child)', 'foreign_key dari table relasi (parent)', 'other_key (dari table relasi -> child)');
         * belongsTo default ('table relation'); foreign key dan other key langsung otomatis dikenali krna sesuai convention
         * @return void
         */
        public function user()
        {
            return $this->belongsTo('App\User')->select('id','role','name');
        }

        public function category()
        {
            return $this->belongsTo('App\Categories')->select('id','category');
        }

        public function fromDepartment()
        {
            return $this->belongsTo('App\Department','department_id','id')->select('id','department');
        }

        public function toDepartment()
        {
            return $this->belongsTo('App\Department', 'send_to', 'id');
        }

        public function relationLevel()
        {
            return $this->belongsTo('App\Level', 'level', 'id');
        }

        public function pickupBy()
        {
            return $this->belongsTo('App\User','pickup_by','id')->select('id','role','name');
        }

}

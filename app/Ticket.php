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
        public function scopeGetTicket($query, $id_user)
        {
            return $query->whereUserId($id_user);
        }

        public function scopeSelectName($query)
        {
            return $query->select('id','department','project');
        }

        public function scopeSorting($query)
        {
            return $query->orderBy('created_at','desc');
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
            return $this->belongsTo('App\User');
        }

        public function category()
        {
            return $this->belongsTo('App\Categories');
        }

        public function fromDepartment()
        {
            return $this->belongsTo('App\Department','department_id','id');
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
            return $this->belongsTo('App\User','pickup_by','id');
        }

}

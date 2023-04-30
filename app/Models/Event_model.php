<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_model extends Model
{
    use HasFactory;
    protected $table = 'event';
     // public function parent()
    // {
    //     return $this->belongsTo(Admin_model::class, 'user_id');
    // }
}

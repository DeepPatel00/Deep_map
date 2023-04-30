<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_model extends Model
{
    protected $table = 'admin';

    public function parent()
    {
        return $this->belongsTo(Admin_model::class, 'user_id');
    }
}

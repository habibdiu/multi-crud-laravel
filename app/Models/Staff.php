<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';
    protected $primaryKey = 'id';
    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [
        'name', 'salary', 'department_id'
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'worker_id', 'id');
    }
}

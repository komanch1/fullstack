<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'worker_id'
    ];

    public function workers(){
        return $this->hasMany('App\Models\Worker', 'department_id', 'id');
    }

    public function getWorker(){
        $worker = Worker::find($this->worker_id);//where('id', $this->worker_id)->get()
        // dd($worker);
        return $worker['name'];
        // return $this->workers();
    }
}

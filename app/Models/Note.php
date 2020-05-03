<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $guarded = [];

    public function Subject(){
        return $this->belongsTo(Subject::class);
    }
}

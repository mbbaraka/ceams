<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDescription extends Model
{
    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }

    public function achivements()
    {
        return $this->hasMany(Achievement::class);
    }
    
}

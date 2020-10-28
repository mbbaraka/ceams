<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    public function users()
    {
    	return $this->belongsTo(Users::class);
    }

    public function description()
    {    	
    	return $this->belongsTo(JobDescription::class);
    }
}

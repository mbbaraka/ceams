<?php

namespace App;

use App\Achievement;
use Illuminate\Database\Eloquent\Model;

class JobDescription extends Model
{
    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }

    public function achievements()
    {
        return $this->HasMany('App\Achievement', 'job_desc_id');
    }

}

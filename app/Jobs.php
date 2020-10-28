<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    public function jobDesc()
    {
        return $this->hasMany(JobDescription::class);
    }
}

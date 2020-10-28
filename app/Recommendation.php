<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    public function staff()
    {
        return $this->belongsToMany(Users::class);
    }
}

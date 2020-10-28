<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityService extends Model
{
    public function staff()
    {
        return $this->belongsTo(Users::class);
    }
}

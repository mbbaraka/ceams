<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchGrants extends Model
{
    public function staff()
    {
        return $this->belongsTo(Users::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetenceAssessment extends Model
{
    public function staff()
    {
        return $this->belongsTo(Users::class);
    }
}

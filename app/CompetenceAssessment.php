<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetenceAssessment extends Model
{
    public function staff()
    {
        return $this->belongsTo(Users::class);
    }

    public function competent()
    {
        return $this->belongsTo(Competence::class, 'competence_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    public function assessment()
    {
        return $this->Hasmany(CompetenceAssessment::class, 'competence_id');
    }
}

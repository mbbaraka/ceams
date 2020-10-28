<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $primaryKey = 'staff_id';
    protected $incrementing = false;
    protected $keyType = 'string';

    public function studies()
    {
        return $this->hasMany(Study::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
    public function workshops()
    {
        return $this->hasMany(Workshops::class);
    }
    public function researchGrant()
    {
        return $this->hasMany(ResearchGrants::class);
    }
    public function researchActivity()
    {
        return $this->hasMany(ResearchActivities::class);
    }
    public function publicLecture()
    {
        return $this->hasMany(PublicLecture::class);
    }
    public function publication()
    {
        return $this->hasMany(Publication::class);
    }
    public function responsibilities()
    {
        return $this->hasMany(AdminResponsibiltity::class);
    }
    public function communitySevice()
    {
        return $this->hasMany(CommunityService::class);
    }
    public function constraintAnalysis()
    {
        return $this->hasMany(ConstraintAnalysis::class);
    }
}

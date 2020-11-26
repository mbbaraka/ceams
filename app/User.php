<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_id', 'name', 'email', 'password', 'status', 'is_appraiser',
    ];
    public $primaryKey = 'staff_id';
    public $incrementing = false;
    public $keyType = 'string';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

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

    public function roles()
    {
        return $this->belongsTo('App\Role', 'role');
    }

    public function appraiser()
    {
        return $this->belongsTo(User::class, 'appraiser_status');
    }

    public function appraisee()
    {
        return $this->hasMany(User::class, 'appraiser_status', 'staff_id');
    }

    public function staffAppraiser()
    {
        return $this->belongsTo(User::class, 'appraiser_status');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
	protected $fillable = [ 'staff_id', 'course', 'institution', 'award', 'date_of_completion'];
    public function staff()
    {
        return $this->belongsTo(Users::class);
    }
}

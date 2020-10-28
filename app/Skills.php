<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
	protected $fillable = ['staff_id', 'skills'];
    public function staff()
    {
        return $this->belongsTo(Users::class);
    }
}

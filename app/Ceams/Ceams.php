<?php

namespace App\Ceams;

use App\Achievement;
use App\User;
use Illuminate\Support\Facades\Facade;



class Ceams extends Facade
{
     //Achivement for descriptions
    public static function achievement($description, $staff)
    {
        $achievement = Achievement::where('job_desc_id', $description)->where('appraisee_id', $staff)->first();

        return $achievement;
    }

    // public static function checkStatus($id)
    // {
    //     /**
    //      * This function checks if some staff particulars have been filled to avoid errors
    //      */
    //     $user = User::find($id);


    // }
}

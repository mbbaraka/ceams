<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function studies()
    {
        $title = 'Studies';
        return view('appraisee.achievements.studies.index', compact('title'));
    }
    // public function createStudies()
    // {
    //     $title = 'Edit Studies';
    //     return view('appraisee.studies.create', compact('title'));
    // }
}

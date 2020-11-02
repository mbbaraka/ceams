<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    public function jobs ()
    {
        return view('hr.pages.jobs.index');
    }

    public function appraisers ()
    {
        return view('hr.pages.appraisers.index');
    }

    public function appraisals ()
    {
        return view('hr.pages.appraisals.index');
    }

    public function roles ()
    {
        $roles = User::paginate(5);
        return view('hr.pages.roles.index', compact('roles'));
    }

    public function staffs ()
    {
        $staffs = User::where('status', 1)->orderBy('staff_id', 'desc')->paginate(5);
        return view('hr.pages.staffs.index', compact('staffs'));
    }

}

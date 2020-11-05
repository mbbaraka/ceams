<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Jobs;

class PageController extends Controller
{
    public function jobs ()
    {
        $jobs = Jobs::paginate(5);
        return view('hr.pages.jobs.index', compact('jobs'));
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
        $roles = Role::paginate(5);
        return view('hr.pages.roles.create', compact('roles'));
    }

    public function staffs ()
    {
        $staffs = User::where('status', '1')->orderBy('staff_id', 'desc')->paginate(5);
        return view('hr.pages.staffs.index', compact('staffs'));
    }

}

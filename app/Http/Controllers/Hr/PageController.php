<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $appraisers = User::where('is_appraiser', '1')->where('status', '1')->paginate(5);
        return view('hr.pages.appraisers.list', compact('appraisers'));
    }

    public function appraisals ()
    {
        $staffs = User::where('status', '1')->where('appraiser_status', '!=', NULL)->paginate(5);
        return view('hr.pages.appraisals.index', compact('staffs'));
    }

    public function roles ()
    {
        $roles = Role::paginate(5);
        return view('hr.pages.roles.create', compact('roles'));
    }

    public function staffs ()
    {
        $jobs = Jobs::get();
        $staffs = User::where('status', '1')->orderBy('staff_id', 'desc')->paginate(5);
        return view('hr.pages.staffs.index', compact('staffs', 'jobs'));
    }

}

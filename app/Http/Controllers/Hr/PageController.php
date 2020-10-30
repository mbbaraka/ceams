<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    public function jobs ()
    {
        return view('hr.pages.jobs');
    }

    public function appraisers ()
    {
        return view('hr.pages.appraisers');
    }

    public function appraisals ()
    {
        return view('hr.pages.appraisals');
    }

    public function staffs ()
    {
        $staffs = User::where('status', 1)->orderBy('staff_id', 'desc')->get();
        return view('hr.pages.staffs.index', compact('staffs'));
    }

}

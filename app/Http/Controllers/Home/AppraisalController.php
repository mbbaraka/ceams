<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AppraisalController extends Controller
{
    public function index()
    {
        return view('appraisals.index');
    }

    public function view($staff)
    {
        $staff = User::find($staff);
        return view('appraisals.index', compact('staff'));
    }
}

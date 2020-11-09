<?php

namespace App\Http\Controllers\Home;

use App\Courses;
use App\Http\Controllers\Controller;
use App\Publication;
use App\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Workshops;

class AppraiserController extends Controller
{
    public function listAppraisee()
    {
        $staffs = User::where('appraiser_status', Auth::user()->staff_id)->where('status', '1')->latest()->paginate(5);
        return view('appraiser.pages.list', compact('staffs'));
    }

    public function staff($id)
    {
        $staff = User::find($id)->first();
        return view('appraiser.pages.staff', compact('staff'));
    }

    public function achievement($id)
    {
        $staff = User::find($id)->first();
        $studies = Study::where('staff_id', $id)->take(5)->latest()->get();
        $courses = Courses::where('staff_id', $id)->take(5)->latest()->get();
        $publications = Publication::where('staff_id', $id)->take(5)->latest()->get();
        $workshops = Workshops::where('staff_id', $id)->take(5)->latest()->get();

        return view('appraiser.pages.staff-achievement', compact(
            'staff', 'courses', 'studies', 'publications', 'workshops'
        ));
    }
}

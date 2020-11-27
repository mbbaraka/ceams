<?php

namespace App\Http\Controllers\Home;

use App\Comment;
use App\Courses;
use App\Http\Controllers\Controller;
use App\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AppraisalController extends Controller
{
    public function index()
    {
        if (Auth::user()->appraiser_status == NULL) {
            toast('You cannot view this form. You dont have an appraiser yet.', 'warning');
            return redirect()->back();
        }else{

            return view('appraisals.index');

        }
    }

    public function view($staff)
    {
        $staff = User::find($staff);
        // Staff achivements
        $study = Study::where('staff_id', $staff)->get();
        $course = Courses::where('staff_id', $staff)->get();

        // Comments
        // $comments = Comment::where()
        if ($staff->appraiser_status == NULL) {
            toast('You cannot view this form. You dont have an appraiser yet.', 'warning');
            return redirect()->back();
        }else{

            return view('appraisals.view', compact(
                'staff', 'study', 'course'
            ));

        }
    }
}

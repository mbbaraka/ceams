<?php

namespace App\Http\Controllers\Home;

use App\Achievement;
use App\Competence;
use App\CompetenceAssessment;
use App\Courses;
use App\Http\Controllers\Controller;
use App\JobDescription;
use App\Jobs;
use App\Publication;
use App\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Workshops;
use App\Notification;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function achievementAssessment($id)
    {
        $staff = User::find($id)->first();
        $title = Jobs::where('title', $staff->job_title)->first();
        $achievements = Achievement::where('appraisee_id', $id)->get();
        return view('appraiser.pages.achievement-assessment', compact('staff', 'title', 'achievements'));
    }

    public function updateAchievement(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request,
            [
                'score' => 'required',
                'comment' => 'required|min:20'
            ]
        );

        $achievement = Achievement::where('id', $request->id)->first();
        $achievement->appraiser_id = Auth::user()->staff_id;
        $achievement->comment = $request->comment;
        $achievement->score = $request->score;

        $save = $achievement->save();

        if ($save) {
            Alert::success('Updated', 'Updated the Achievement Successfully!');
            return redirect()->back();
        }
    }


    public function rejectAchievement($id, $staff)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->status = 'rejected';
        $save = $achievement->save();

        if ($save) {
            Alert::success('Approved', 'Rejected the performance Indicator Successfully!');
            Alert::success('Approved', 'Approved the performance Indicator Successfully!');
            $notifications = new Notification();
            $notifications->sender_id = Auth::user()->staff_id;
            $notifications->receiver_id = $staff;
            $notifications->message = "You performance indicator has been rejected by your appraiser.";

            $save_notification = $notifications->save();
            return redirect()->back();
        }
    }

    public function approveAchievement($id, $staff)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->status = 'approved';
        $save = $achievement->save();

        if ($save) {
            Alert::success('Approved', 'Approved the performance Indicator Successfully!');
            $notifications = new Notification();
            $notifications->sender_id = Auth::user()->staff_id;
            $notifications->receiver_id = $staff;
            $notifications->message = "You performance indicator has been approved by your appraiser.";

            $save_notification = $notifications->save();
            return redirect()->back();
        }
    }

    // Core Competences
    public function coreCompetence($id)
    {
        $staff = User::find($id);
        $competences = Competence::paginate(5);
        return view('appraiser.pages.core-competence', compact('staff', 'competences'));
    }

    public function editCompetence(Request $request)
    {
        $this->validate($request, [
            'score' => 'required',
            'comment' => 'required|min:30'
        ]);

        $competence =  new CompetenceAssessment();
        $competence->competence_id = $request->id;
        $competence->appraisee_id = $request->staff;
        $competence->appraiser_id = Auth::user()->staff_id;
        $competence->evaluation_outcome = $request->score;
        $competence->comment = $request->comment;

        $save = $competence->save();

        if ($save) {
            Alert::success('Updated', 'Staff Evaluated successfully');
            return redirect()->back();
        }
    }
}

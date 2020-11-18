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
use App\Recommendation;
use RealRashid\SweetAlert\Facades\Alert;
use UserSeeder;

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

        $score_result = 0;
        $key_results = Achievement::where('appraisee_id', $staff->staff_id)->get();

        foreach ($key_results as $score) {
            $score_result += $score->score;
            $average_score = $score_result/count($key_results);
            $average_achievement = ($average_score * 100) / 5;
        }
        $achievements = Achievement::where('appraisee_id', $id)->get();
        return view('appraiser.pages.achievement-assessment', compact('staff', 'title', 'achievements', 'average_achievement'));
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
        $score_competence = 0;

        $score_level = CompetenceAssessment::where('appraisee_id', $staff->staff_id)->get();
        foreach ($score_level as $score) {
            $score_competence += $score->evaluation_outcome;
            $average_competence = $score_competence/count($score_level);
            $average_competence = ($average_competence * 100) / 5;
        }
        return view('appraiser.pages.core-competence', compact('staff', 'competences', 'average_competence'));
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

    //Recommendations
    public function recommendations($staffs)
    {
        $score_result = 0;
        $score_competence = 0;
        $key_results = Achievement::where('appraisee_id', $staffs)->get();

        foreach ($key_results as $score) {
            $score_result += $score->score;
            $average_score = $score_result/count($key_results);
            $average_score = ($average_score * 100) / 5;
        }

        $competence = CompetenceAssessment::where('appraisee_id', $staffs)->get();
        foreach ($competence as $score) {
            $score_competence += $score->evaluation_outcome;
            $average_competence = $score_competence/count($competence);
            $average_competence = ($average_competence * 100) / 5;
        }


        $average = ($average_score + $average_competence) / 2;
        $staff = User::find($staffs);

        $recommendations = Recommendation::where('appraisee_id', $staffs)->get();

        return view('appraiser.pages.recommendations', compact('staff', 'average_score',
        'average_competence', 'average', 'recommendations'));
    }

    public function storeRecommendation(Request $request, $staff)
    {
        $recommendations = $request->reward;
        if ($request->reward > 0) {
            foreach ($request->reward as $item) {
                $recommend = new Recommendation();
                $recommend->appraisee_id = $staff;
                $recommend->appraiser_id = Auth::user()->staff_id;
                $recommend->recommendation = $item;
                $save = $recommend->save();

                if ($save) {
                    Alert::success('Success', 'Staff recommended successfully!');
                    return redirect()->back();
                }

            }

        }
    }


    public function removeRecommendation($id)
    {
        $recommendations = Recommendation::find($id);
        $delete = $recommendations->delete();
        if ($delete) {
            Alert::success('Removed', 'Recommendation removed successfully');
            return redirect()->back();
        }
    }


    // Performance Improvement Action Plan
    public function actionPlan($staff)
    {
        $staff = User::find($staff);
        return view('appraiser.pages.action-plan', compact('staff'));
    }

    public function particulars($staff)
    {
        $staff = User::find($staff);
        return view('appraiser.pages.particulars', compact('staff'));
    }
}

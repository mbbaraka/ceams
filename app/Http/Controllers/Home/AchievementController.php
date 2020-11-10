<?php

namespace App\Http\Controllers\Home;

use App\Achievement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Jobs;
use App\JobDescription;
use App\User;

class AchievementController extends Controller
{
    public function index()
    {
        $user = User::where('staff_id', Auth::user()->staff_id)->first();
        $title = Jobs::where('title', $user->job_title)->first();
        $description = JobDescription::where('job_id', $title->id)->get();
        $achievements = Achievement::where('appraisee_id', $user->staff_id)->get();
        return view ('appraisee.assessments.index', compact('description', 'achievements'));
    }

    public function storeTarget(Request $request, $id)
    {
        $this->validate($request,
            [
                'target' => 'required|min:50',
            ]
         );

         $target = Achievement::where('job_desc_id', $id)->where('appraisee_id', Auth::user()->staff_id)->first();
         if(!empty($target)){
            $target->min_performance_level = $request->target;
            $save = $target->save();

            if($save){
                Alert::success('Success', 'Successfully updated minimum performance level');
                return redirect()->back();
            }
         }else{
             $target = new Achievement();
             $target->min_performance_level = $request->target;
             $target->appraisee_id = Auth::user()->staff_id;
             $target->job_desc_id = $id;
             $save = $target->save();

                if($save){
                    Alert::success('Success', 'Successfully updated minimum performance level');
                    return redirect()->back();
                }
         }
    }

    public function resetTarget($id)
    {
        $target = Achievement::where('id', $id)->where('appraisee_id', Auth::user()->staff_id)->first();
        $reset = $target->delete();

        if($reset){
            Alert::success('Success', 'Successfully reset minimum performance level');
            return redirect()->back();
        }

    }
}

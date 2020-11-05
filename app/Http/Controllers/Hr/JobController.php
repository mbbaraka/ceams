<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs;
use Alert;
use App\JobDescription;
use Illuminate\Contracts\Queue\Job;

class JobController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:jobs,title'
        ]);

        $title = new Jobs();
        $title->title = $request->title;

        $save = $title->save();

         if ($save) {
             Alert::success('Success', 'Job title created successfully!');
             return redirect()->back();
         }
    }

    public function deleteJob($id)
    {
        $job = Jobs::findOrFail($id);
        $delete = $job->delete();

        if($delete)
        {
            Alert::success('Success', 'Job descripton deleted successfully!');
            return redirect()->back();
        }
    }

    public function jobDescription($id)
    {
        $job = Jobs::findOrFail($id);
        $descriptions = JobDescription::where('job_id', $id)->paginate(5);
        return view('hr.pages.jobs.description', compact('descriptions', 'job'));
    }


    public function jobDescriptionStore(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|min:30'
        ]);

        $description = new JobDescription();
        $description->job_id = $request->job_id;
        $description->description = $request->description;

        $save = $description->save();

        if ($save) {
             Alert::success('Success', 'Job descripton added successfully!');
             return redirect()->back();
        }
    }

    public function descriptionDelete($id)
    {
        $description = JobDescription::findOrfail($id);
        $delete = $description->delete();

        if ($delete) {
            Alert::success('Success', 'Job descripton deleted successfully!');
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers\Home;

use App\ResearchActivities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;


class ResearchActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $research = ResearchActivities::orderBy('id', 'DESC')->where('staff_id', Auth::id())->get();
        return view ('appraisee.achievements.research-activities.index', compact('research'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required',
            'status' => 'required',
        ]);

        $research = new ResearchActivities();
        $research->staff_id = Auth::id();
        $research->topic = $request->topic;
        $research->status = $request->status;

        $save = $research->save();

        if ($save) {
            Session::flash('message', 'New Research Activity added successfully');
            return redirect()->route('researchactivities.index');
        }else{
            Session::flash('error', 'Research Activity failed to be added');
            return redirect()->route('researchactivities.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'topic' => 'required',
            'status' => 'required',
        ]);

        $research = ResearchActivities::findOrFail($id);
        $research->staff_id = Auth::id();
        $research->topic = $request->topic;
        $research->status = $request->status;

        $save = $research->save();

        if ($save) {
            Session::flash('message', 'New Research Activity added successfully');
            return redirect()->route('researchactivities.index');
        }else{
            Session::flash('error', 'Research Activity failed to be added');
            return redirect()->route('researchactivities.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $research = ResearchActivities::findOrFail($id);
        if ($research->delete()) {
            Session::flash('message', 'Deleted successfully');
            return redirect()->route('researchactivities.index');
        }else{
            Session::flash('error', 'Failed to delete');
            return redirect()->route('researchactivities.index');
        }
    }
}

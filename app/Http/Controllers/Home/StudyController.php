<?php

namespace App\Http\Controllers\Home;

use App\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $study = Study::orderBy('id', 'DESC')->where('staff_id', Auth::id())->get();
        return view ('appraisee.achievements.studies.index', compact('study'));
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
            'course' => 'required',
            'institution' => 'required',
            'award' => 'required',
            'date' => 'required',
        ]);

        $study = new Study();
        $study->staff_id = Auth::id();
        $study->courses = $request->course;
        $study->institution = $request->institution;
        $study->award = $request->award;
        $study->date_of_completion = $request->date;

        $save = $study->save();

        if ($save) {
            Session::flash('message', 'New Study added successfully');
            return redirect()->route('studies.index');
        }else{
            Session::flash('error', 'Study failed to be added');
            return redirect()->route('studies.index');
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
            'course' => 'required',
            'institution' => 'required',
            'award' => 'required',
            'date' => 'required',
        ]);

        $course = Study::findOrFail($id);
        $course->staff_id = Auth::id();
        $course->courses = $request->course;
        $course->institution = $request->institution;
        $course->award = $request->award;
        $course->date_of_completion = $request->date;

        $save = $course->save();

        if ($save) {
            Session::flash('message', 'Study updated successfully');
            return redirect()->route('studies.index');
        }else{
            Session::flash('error', 'Study failed to update');
            return redirect()->route('studies.index');
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
        $studies = Study::findOrFail($id);

        if ($studies->delete()) {
            Session::flash('message', 'Deleted successfully');
            return redirect()->route('studies.index');
        }else{
            Session::flash('error', 'Failed to delete');
            return redirect()->route('studies.index');
        }
    }
}

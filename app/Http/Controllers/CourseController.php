<?php

namespace App\Http\Controllers;
 
use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Courses::orderBy('id', 'DESC')->where('staff_id', Auth::id())->get();
        return view ('appraisee.achievements.courses.index', compact('course'));
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
            'program' => 'required',
            'course_unit' => 'required',
            'contact_hours' => 'required',
        ]);

        $course = new Courses();
        $course->staff_id = Auth::id();
        $course->program = $request->program;
        $course->course_unit = $request->course_unit;
        $course->contact_hours = $request->contact_hours;

        $save = $course->save();

        if ($save) {
            Session::flash('message', 'New Course added successfully');
            return redirect()->route('courses.index');
        }else{
            Session::flash('error', 'Study Course to be added');
            return redirect()->route('courses.index');
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
            'program' => 'required',
            'course_unit' => 'required',
            'contact_hours' => 'required',
        ]);

        $course = Courses::findOrFail($id);
        $course->staff_id = Auth::id();
        $course->program = $request->program;
        $course->course_unit = $request->course_unit;
        $course->contact_hours = $request->contact_hours;

        $save = $course->save();

        if ($save) {
            Session::flash('message', 'Course updated successfully');
            return redirect()->route('courses.index');
        }else{
            Session::flash('error', 'Study Course failed to be updated');
            return redirect()->route('courses.index');
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
        $course = Courses::findOrFail($id);
        if ($course->delete()) {
            Session::flash('message', 'Deleted successfully');
            return redirect()->route('courses.index');
        }else{
            Session::flash('error', 'Failed to delete');
            return redirect()->route('courses.index');
        }
    }
}

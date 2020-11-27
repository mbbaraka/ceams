<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

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
            Alert::success('Success', 'Successfully added Course!');
            return redirect()->back();
        }else{
            Alert::warning('Error', 'An error occured!');
            return redirect()->back();
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
            Alert::success('Success', 'Successfully updated Course!');
            return redirect()->back();
        }else{
            Alert::warning('Error', 'An error occured!');
            return redirect()->back();
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
            Alert::success('Success', 'Successfully deleted course held!');
            return redirect()->back();
        }else{
            Alert::warning('Error', 'An error occured!');
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers\Home;

use App\PublicLecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecture = PublicLecture::orderBy('id', 'DESC')->where('staff_id', Auth::id())->get();
        return view ('appraisee.achievements.lectures.index', compact('lecture'));
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
            'category' => 'required',
            'venue' => 'required',
            'topic' => 'required',
            'date' => 'required',
        ]);

        $lecture = new PublicLecture();
        $lecture->staff_id = Auth::id();
        $lecture->category = $request->category;
        $lecture->venue = $request->venue;
        $lecture->topic = $request->topic;
        $lecture->date = $request->date;

        $save = $lecture->save();

        if ($save) {
            Alert::success('Success', 'Successfully added Lectures!');
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
            'category' => 'required',
            'venue' => 'required',
            'topic' => 'required',
            'date' => 'required',
        ]);

        $lecture = PublicLecture::findOrFail($id);
        $lecture->staff_id = Auth::id();
        $lecture->category = $request->category;
        $lecture->venue = $request->venue;
        $lecture->topic = $request->topic;
        $lecture->date = $request->date;

        $save = $lecture->save();

        if ($save) {
            Alert::success('Success', 'Successfully updated Lectures held!');
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
        $lecture = PublicLecture::findOrFail($id);
        if ($lecture->delete()) {
            Alert::success('Success', 'Successfully deleted Lectures held!');
            return redirect()->back();
        }else{
            Alert::warning('Error', 'An error Occurred');
            return redirect()->back();
        }
    }
}

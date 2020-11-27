<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Skills;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sn = 1;
        $skill = Skills::orderBy('id', 'DESC')->where('staff_id', Auth::id())->get();
        return view ('appraisee.achievements.skills.index', compact('skill', 'sn'));
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
            'skill' => 'required',
        ]);

        $skill = new Skills();
        $skill->staff_id = Auth::id();
        $skill->skill = $request->skill;

        $save = $skill->save();

        if ($save) {
            Alert::success('Success', 'Successfully added skill');
            return redirect()->back();
        }else{
            Session::flash('error', 'Skill to be added');
            return redirect()->route('skills.index');
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
            'skill' => 'required',
        ]);

        $skill = Skills::findOrFail($id);
        $skill->staff_id = Auth::id();
        $skill->skill = $request->skill;

        $save = $skill->save();

        if ($save) {
            Alert::success('Success', 'Successfully updated skill');
            return redirect()->back();
        }else{
            Session::flash('error', 'Skill to be updated');
            return redirect()->route('skills.index');
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
        $skills = Skills::findOrFail($id);
        if ($skills->delete()) {
            Alert::success('Success', 'Successfully deleted held!');
            return redirect()->back();
        }else{
            Session::flash('error', 'Failed to delete');
            return redirect()->route('skills.index');
        }
    }
}

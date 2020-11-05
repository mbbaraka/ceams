<?php

namespace App\Http\Controllers\Home;

use App\ResearchGrants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Alert;

class ResearchGrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $research = ResearchGrants::orderBy('id', 'DESC')->where('staff_id', Auth::id())->paginate(5);
        return view ('appraisee.achievements.research-grants.index', compact('research'));
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
            'research_applied_for' => 'required',
            'application_date' => 'required',
            'status' => 'required',
        ]);

        $research = new ResearchGrants();
        $research->staff_id = Auth::id();
        $research->research_applied_for = $request->research_applied_for;
        $research->application_date = $request->application_date;
        $research->is_awarded = $request->status;
        $research->date_of_award = $request->date_of_award;

        $save = $research->save();

        if ($save) {
            Alert::success('Success', 'Successfully added research grant!');
            return redirect()->back();
        }else{
            Alert::warning('Warning', 'An error occured. Try again later!');
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
            'research_applied_for' => 'required',
            'application_date' => 'required',
            'status' => 'required',
        ]);

        $research = ResearchGrants::findOrFail($id);
        $research->staff_id = Auth::id();
        $research->topic = $request->topic;
        $research->status = $request->status;

        $save = $research->save();

        if ($save) {
            Session::flash('message', 'Research Grant added successfully');
            return redirect()->back();
        }else{
            Session::flash('error', 'Research Grant failed to be added');
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
        $research = ResearchGrants::findOrFail($id);
        if ($research->delete()) {
            Alert::success('Success', 'Successfully added research grant!');
            return redirect()->back();
        }else{
            Alert::danger('Warning', 'Failed to delete grant!');
            return redirect()->back();
        }
    }
}

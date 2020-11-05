<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Alert;
use App\ConstraintAnalysis;

class AnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analysises = ConstraintAnalysis::orderBy('id', 'DESC')->where('staff_id', Auth::id())->paginate(5);
        return view ('appraisee.achievements.analysis.index', compact('analysises'));
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
            'constraint' => 'required',
            'strategy' => 'required',
        ]);

        $analysis = new ConstraintAnalysis();
        $analysis->staff_id = Auth::id();
        $analysis->constraint = $request->constraint;
        $analysis->strategy = $request->strategy;

        $save = $analysis->save();

        if ($save) {
            Alert::success('Success', 'Successfully added Constraint Analysis held!');
            return redirect()->back();
        }else{
            Alert::danger('Warning', 'Failed to add constraint analysis!');
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
            'constraint' => 'required',
            'strategy' => 'strategy',
        ]);

        $analysis = ConstraintAnalysis::findOrFail($id);
        $analysis->staff_id = Auth::id();
        $analysis->constraint = $request->constraint;
        $analysis->strategy = $request->analysis;

        $save = $analysis->save();

        if ($save) {
            Alert::success('Success', 'Successfully updated Constraint Analysis!');
            return redirect()->back();
        }else{
            Alert::danger('Warning', 'Failed to update Constraint Analysis!');
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
        $analysis = ConstraintAnalysis::findOrFail($id);

        $delete = $analysis->delete();

        if ($delete) {
            Alert::success('Success', 'Successfully deleted Constraint Analysis!');
            return redirect()->back();
        }else{
            Alert::danger('Warning', 'Failed to delete constraint analysis!');
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers\Appraiser;

use App\ActionPlan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ActionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'performance_gap' => 'required|min:30',
            'action_plan' => 'required|min:30',
            'time_frame' => 'required'
        ]);

        $action = new ActionPlan();
        $action->appraisee_id = $request->id;
        $action->appraiser_id = Auth::user()->staff_id;
        $action->performance_gap = $request->performance_gap;
        $action->action_plan = $request->action_plan;
        $action->time_frame = $request->time_frame;

        $save = $action->save();

        if ($save) {
            Alert::success('Success', 'Action plan added for staff successfully');
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
            'performance_gap' => 'required|min:30',
            'action_plan' => 'required|min:30',
            'time_frame' => 'required'
        ]);

        $action = ActionPlan::find($id);
        $action->appraisee_id = $request->id;
        $action->appraiser_id = Auth::user()->staff_id;
        $action->performance_gap = $request->performance_gap;
        $action->action_plan = $request->action_plan;
        $action->time_frame = $request->time_frame;

        $save = $action->save();

        if ($save) {
            Alert::success('Success', 'Action plan updated successfully');
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
        $action = ActionPlan::findOrFail($id);
        if ($action->delete()) {
            Alert::success('Success', 'Action plan deleted successfully');
            return redirect()->back();
        }
    }
}

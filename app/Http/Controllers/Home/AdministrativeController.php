<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Alert;
use App\AdminResponsibility;
use App\CommunityService;

class AdministrativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsibilities = AdminResponsibility::orderBy('id', 'DESC')->where('staff_id', Auth::id())->paginate(5);
        return view ('appraisee.achievements.responsibilities.index', compact('responsibilities'));
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
            'responsibility' => 'required',
            'date' => 'required',
            'duration' => 'required',
        ]);

        $responsibility = new AdminResponsibility();
        $responsibility->staff_id = Auth::id();
        $responsibility->responsibility = $request->responsibility;
        $responsibility->date = $request->date;
        $responsibility->duration = $request->duration;

        $save = $responsibility->save();

        if ($save) {
            Alert::success('Success', 'Successfully added Responsibility held!');
            return redirect()->back();
        }else{
            Alert::danger('Warning', 'Failed to add responsibility!');
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
            'responsibility' => 'required',
            'date' => 'required',
            'duration' => 'required',
        ]);

        $responsibility = AdminResponsibility::findOrFail($id);
        $responsibility->staff_id = Auth::id();
        $responsibility->responsibility = $request->responsibility;
        $responsibility->date = $request->date;
        $responsibility->duration = $request->duration;

        $save = $responsibility->save();

        if ($save) {
            Alert::success('Success', 'Successfully updated Responsibility held!');
            return redirect()->back();
        }else{
            Alert::danger('Warning', 'Failed to update responsibility!');
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
        $responsibility = AdminResponsibility::findOrFail($id);

        $delete = $responsibility->delete();

        if ($delete) {
            Alert::success('Success', 'Successfully deleted Responsibility held!');
            return redirect()->back();
        }else{
            Alert::danger('Warning', 'Failed to delete responsibility!');
            return redirect()->back();
        }
    }
}

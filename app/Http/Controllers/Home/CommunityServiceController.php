<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Alert;
use App\CommunityService;

class CommunityServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = CommunityService::orderBy('id', 'DESC')->where('staff_id', Auth::id())->paginate(5);
        return view ('appraisee.achievements.community-service.index', compact('service'));
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
            'activity' => 'required',
            'date' => 'required',
            'venue' => 'required',
        ]);

        $service = new CommunityService();
        $service->staff_id = Auth::id();
        $service->activity = $request->activity;
        $service->date = $request->date;
        $service->venue = $request->venue;

        $save = $service->save();

        if ($save) {
            Alert::success('Success', 'Successfully added community service!');
            return redirect()->back();
        }else{
            Alert::danger('Warning', 'Failed to add community service!');
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
            'activity' => 'required',
            'date' => 'required',
            'venue' => 'required',
        ]);

        $service = CommunityService::findOrFail($id);
        $service->staff_id = Auth::id();
        $service->staff_id = Auth::id();
        $service->activity = $request->activity;
        $service->date = $request->date;
        $service->venue = $request->venue;

        $save = $service->save();

        if ($save) {
            Alert::success('Success', 'Successfully updated community service!');
            return redirect()->back();
        }else{
            Alert::danger('Warning', 'Failed to update community service!');
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
        $service = CommunityService::findOrFail($id);

        $delete = $service->delete();

        if ($delete) {
            Alert::success('Success', 'Successfully deleted community service!');
            return redirect()->back();
        }else{
            Alert::danger('Warning', 'Failed to delete grant!');
            return redirect()->back();
        }
    }
}

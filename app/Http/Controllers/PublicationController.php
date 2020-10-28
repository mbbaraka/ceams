<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publication = Publication::orderBy('id', 'DESC')->where('staff_id', Auth::id())->get();
        return view ('appraisee.achievements.publications.index', compact('publication'));
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
            'title' => 'required',
            'publisher' => 'required',
            'publish_date' => 'required',
        ]);

        $publication = new Publication();
        $publication->staff_id = Auth::id();
        $publication->title = $request->title;
        $publication->publisher = $request->publisher;
        $publication->publish_date = $request->publish_date;

        $save = $publication->save();

        if ($save) {
            Session::flash('message', 'New Publication added successfully');
            return redirect()->route('publications.index');
        }else{
            Session::flash('error', 'Publication failed to be added');
            return redirect()->route('publications.index');
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
            'title' => 'required',
            'publisher' => 'required',
            'publish_date' => 'required',
        ]);

        $publication = Publication::findOrFail($id);
        $publication->staff_id = Auth::id();
        $publication->title = $request->title;
        $publication->publisher = $request->publisher;
        $publication->publish_date = $request->publish_date;

        $save = $publication->save();

        if ($save) {
            Session::flash('message', 'Publication updated successfully');
            return redirect()->route('publications.index');
        }else{
            Session::flash('error', 'Publication failed to be updated');
            return redirect()->route('publications.index');
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
        $publication = Publication::findOrFail($id);
        if ($publication->delete()) {
            Session::flash('message', 'Deleted successfully');
            return redirect()->route('publications.index');
        }else{
            Session::flash('error', 'Failed to delete');
            return redirect()->route('publications.index');
        }
    }
}

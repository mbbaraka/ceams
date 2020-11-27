<?php

namespace App\Http\Controllers\Hr;

use App\Competence;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\CommonMark\Inline\Element\Code;
use RealRashid\SweetAlert\Facades\Alert;

class CompetenceController extends Controller
{
    public function index()
    {
        $competences = Competence::latest()->paginate(4);
        return view('hr.pages.core-competences.index', compact('competences'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
        [
            'competence' => 'required',
            'description' => 'required|min:30',
        ]
        );

        $competence = new Competence();
        $competence->competence = $request->competence;
        $competence->description = $request->description;

        $save = $competence->save();

        if ($save) {
            Alert::success('Created', 'Successfully created Core Competence');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'competence' => 'required',
            'description' => 'required|min:30',
        ]
        );

        $competence = Competence::find($id);
        $competence->competence = $request->competence;
        $competence->description = $request->description;

        $save = $competence->save();

        if ($save) {
            Alert::success('Updated', 'Successfully updated Core Competence');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $core = Competence::find($id);

        $delete = $core->delete();

        if ($delete) {
            Alert::success('Deleted', 'Successfully deleted Core Competence');
            return redirect()->back();
        }
    }
}

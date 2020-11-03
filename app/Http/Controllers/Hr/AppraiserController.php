<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Alert;
use phpDocumentor\Reflection\Types\Null_;

class AppraiserController extends Controller
{
    // appraisee list
    public function list()
    {
        $appraisers = User::where('is_appraiser', '1')->paginate(5);
        return view('hr.pages.appraisers.list', compact('appraisers'));
    }

    // appraisee new
    public function new()
    {
        $appraisers = User::where('is_appraiser', '0')->paginate(5);
        return view('hr.pages.appraisers.new', compact('appraisers'));
    }

    // appraisee store
    public function store($id)
    {
        $staff = User::findOrFail($id);
        $staff->is_appraiser = '1';
        $save = $staff->save();
        if ($save) {
            Alert::success('Success', 'Successfully made '. $staff->name .' an appraiser!');
            return redirect()->back();
        }
    }

    // appraisee delete appraisee
    public function delete($id)
    {
        // Deassign appraiser status from staff
        $staff = User::findOrFail($id);
        $staff->is_appraiser = '0';
        $save = $staff->save();
        if ($save) {
            Alert::success('success', 'Staff de-assigned successfully');
            return redirect()->back();
        }
    }

    // appraisee appraisees
    public function appraisees($id)
    {
        $staff = User::where('appraiser_status', NULL)->where('staff_id', '!=', $id)->get();
        $appraisees = User::where('appraiser_status', $id)->paginate(5);
        $currentStaff = User::findOrfail($id);
        return view('hr.pages.appraisers.manage', compact('appraisees', 'id', 'staff', 'currentStaff'));
    }

    public function appraiseeAssign(Request $request, $id)
    {
        $this->validate($request, [
            'staff' => 'required',
        ]);

        $currentStaff = User::findOrFail($id);
        $staff = User::findOrFail($request->staff);
        $staff->appraiser_status = $id;
        $save = $staff->save();

        if ($save) {
            Alert::success('success', 'Staff assigned to '. $currentStaff->name .' successfully');
            return redirect()->back();
        }
    }

    public function appraiseeDeassign($id)
    {
        $staff = User::findOrFail($id);
        $staff->appraiser_status = Null;
        $save = $staff->save();

        if ($save) {
            Alert::success('success', 'Staff de-assigned to successfully');
            return redirect()->back();
        }
    }
}

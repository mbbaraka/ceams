<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\User;
use App\Role;
use App\Jobs;
use Str;
use Alert;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createStaff()
    {
        $jobs = Jobs::get();
        return view('hr.pages.staffs.create', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,
        [
            'avator' => 'required||image|mimes:jpeg,jpg,png,webp',
            'name' => 'required',
            'staff_id' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'department' => 'required',
            'date_of_birth' => 'required',
            'faculty' => 'required',
            'job_title' => 'required',
            'salary_scale' => 'required',
            'appointment_date' => 'required',
            'terms_of_service' => 'required',
        ]);

        $file = $request->file('avator');
         if (isset($file)) {
           $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();


                $file->move(public_path('app/public/images/avator'), $imagename);
         }else{
          $imagename = "default.png";
         }

         if(!(Str::contains($request->email, 'muni.ac.ug'))){
            alert()->warning('Warning','Email must be valid!');
            return redirect()->back()->withInput();
         }else{
            $staff = new User();
            $staff->avator = $imagename;
            $staff->staff_id = $request->staff_id;
            $staff->name = $request->name;
            $staff->password = Hash::make(Str::random(6));
            $staff->email = $request->email;
            $staff->phone = $request->phone;
            $staff->department = $request->department;
            $staff->faculty = $request->faculty;
            $staff->job_title = $request->job_title;
            $staff->salary_scale = $request->salary_scale;
            $staff->appointment_date = $request->appointment_date;
            $staff->terms_of_service = $request->terms_of_service;
            $staff->status = 1;
            $staff->is_appraiser = 0;
            $save = $staff->save();


            if ($save) {
                Alert::success('Inserted', 'Staff successfully created!');

                return redirect()->route('hr.staffs.create');
                }else{
                    Session::flash('error', 'Staff not added. An error occured');
                    return redirect()->back();
            }
        }
    }

    public function deleteStaff($id)
    {
        $staff = User::findOrFail($id);
        $delete = $staff->delete();

        if($delete){
            Alert::success('Success', 'Staff deleted successfully!');
            return redirect()->back();
        }
    }

    public function roles()
    {
        $roles = Role::paginate(5);
        return view('hr.pages.roles.create', compact('roles'));
    }

    public function roleStore(Request $request)
    {
        $this->validate($request,
        [
            'role' => 'required'
        ]
        );

        $role = new Role();
        $role->role = $request->role;
        $save = $role->save();

        if($save)
        {
            Alert::success('Success', 'Role created successfully');
            return redirect()->back();
        }
    }

    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $delete =$role->delete();
        if($delete)
        {
            Alert::success('Success', 'Role deleted successfully!');
            return redirect()->back();
        }
    }

    public function assignRole()
    {
        $staffs = User::where('role', NULL)->paginate(5);
        $roles = Role::get();
        return view('hr.pages.roles.assign', compact('staffs', 'roles'));
    }

    public function assignStoreRole(Request $request, $id)
    {
        $assign = User::findOrFail($id);
        $assign->role = $request->role;
        $save = $assign->save();
        if($save){
            Alert::success('Done', 'Successfully assigned role to '.$assign->name);
            return redirect()->back();
        }

    }

    public function roleStaff()
    {
        // Staff with roles
        $staffs = User::where('role', '!=', '0')->paginate(5);
        return view('hr.pages.roles.staffs', compact('staffs'));
    }


    public function deassignRole($id)
    {
        // Deassign role from staff
        $role = User::findOrFail($id);
        $role->role = NULL;
        $save = $role->save();
        if ($save) {
            Alert::success('success', 'Staff de-assigned successfully');
            return redirect()->back();
        }
    }

    public function pendingStaff()
    {
        $staffs = User::where('status', '0')->orderBy('created_at', 'desc')->paginate(5);
        return view('hr.pages.staffs.pending', compact('staffs'));
    }

    public function updatePending(Request $request, $id)
    {
        $staff = USer::findOrFail($id);
        $staff->status = '1';
        $save = $staff->save();

        if($save)
        {
            Alert::success('success', 'Staff approved successfully!');
            return redirect()->back();
        }
    }
}

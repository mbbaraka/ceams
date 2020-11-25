<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\User;
use App\Role;
use App\Jobs;
use App\Mail\AccountApproved;
use App\Mail\AssignRole;
use App\Mail\DeassignRole;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\HrRegistration;

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
            'avator' => 'image|mimes:jpeg,jpg,png,webp',
            'name' => 'required',
            'staff_id' => 'required',
            'email' => 'required|unique:users|string|email|max:255|regex:/(.*)@muni\.ac.ug/i',
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

            $password = Str::random(8);
            $email = $request->email;
            $staff = new User();
            $staff->avator = $imagename;
            $staff->staff_id = $request->staff_id;
            $staff->name = $request->name;
            $staff->password = Hash::make($password);
            $staff->email = $request->email;
            $staff->dob = $request->date_of_birth;
            $staff->phone = $request->phone;
            $staff->department = $request->department;
            $staff->faculty = $request->faculty;
            $staff->job_title = $request->job_title;
            $staff->salary_scale = $request->salary_scale;
            $staff->appointment_date = $request->appointment_date;
            $staff->terms_of_service = $request->terms_of_service;
            $staff->status = '1';
            $staff->is_appraiser = '0';
            $save = $staff->save();

            if ($save) {
                Alert::success('Inserted', 'Staff successfully created!');
                Mail::to($staff->email)->send(new HrRegistration($email, $password));
                return redirect()->back();
                }else{
                    Session::flash('error', 'Staff not added. An error occured');
                    return redirect()->back();
            }
    }

    public function editStaff(Request $request, $id)
    {
        $this->validate($request,
        [
            'avator' => 'image|mimes:jpeg,jpg,png,webp',
            'name' => 'required',
            'staff_id' => 'required',
            'email' => 'required|string|email|max:255|regex:/(.*)@muni\.ac.ug/i',
            'phone' => 'required',
            'department' => 'required',
            'date_of_birth' => 'required',
            'faculty' => 'required',
            'job_title' => 'required',
            'salary_scale' => 'required',
            'appointment_date' => 'required',
            'terms_of_service' => 'required',
        ]);

        $staff = User::find($id);

        $file = $request->file('avator');
         if (isset($file)) {
           $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('app/public/images/avator'), $imagename);
         }else{
          $imagename = $staff->avator;
         }

            $staff->avator = $imagename;
            $staff->staff_id = $request->staff_id;
            $staff->name = $request->name;
            $staff->email = $request->email;
            $staff->phone = $request->phone;
            $staff->dob = $request->date_of_birth;
            $staff->department = $request->department;
            $staff->faculty = $request->faculty;
            $staff->job_title = $request->job_title;
            $staff->salary_scale = $request->salary_scale;
            $staff->appointment_date = $request->appointment_date;
            $staff->terms_of_service = $request->terms_of_service;
            $staff->status = 1;
            $staff->is_appraiser = $staff->is_appraiser;
            $save = $staff->save();


            if ($save) {
                Alert::success('Updated', 'Staff successfully updated!');

                return redirect()->back();
                }else{
                    Session::flash('error', 'Staff not updated. An error occured');
                    return redirect()->back();
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
        $role->role = Str::upper($request->role);
        $save = $role->save();

        if($save)
        {
            // Mail::to('markbrightbaraka@gmail.com')->send(new HrUserRegistrationMail());
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
        $staffs = User::where('role', NULL)->where('status', '1')->paginate(5);
        $roles = Role::get();
        return view('hr.pages.roles.assign', compact('staffs', 'roles'));
    }

    public function assignStoreRole(Request $request, $id)
    {
        $assign = User::findOrFail($id);
        $assign->role = $request->role;
        $save = $assign->save();
        if($save){
            $notifications = new Notification();
            $notifications->sender_id = Auth::user()->staff_id;
            $notifications->receiver_id = $id;
            $notifications->message = "You have beed assigned a role of ". $request->role ." by the Human Resource Officer. You can now perform the role of ". $request->role . ".";

            $save_notification = $notifications->save();
            Mail::to($assign->email)->send(new AssignRole($assign->name, $assign->role));

            Alert::success('Done', 'Successfully assigned role to '.$assign->name);
            return redirect()->back();
        }

    }

    public function roleStaff()
    {
        // Staff with roles
        $staffs = User::where('role', '!=', NULL)->paginate(5);
        return view('hr.pages.roles.staffs', compact('staffs'));
    }


    public function deassignRole($id)
    {
        // Deassign role from staff
        $role = User::findOrFail($id);
        $role->role = NULL;
        $save = $role->save();
        if ($save) {
            $notifications = new Notification();
            $notifications->sender_id = Auth::user()->staff_id;
            $notifications->receiver_id = $id;
            $notifications->message = "You have beed de-assigned from a role of ". $role->role ." by the Human Resource Officer.";

            $save_notification = $notifications->save();

            Mail::to($role->email)->send(new DeassignRole($role->name));

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
            $notifications = new Notification();
            $notifications->sender_id = Auth::user()->staff_id;
            $notifications->receiver_id = $id;
            $notifications->status = '0';
            $notifications->message = "Your account has been approved successfully by the Human Resource Officer. You can now login to your portal.";

            $save_notification = $notifications->save();

            // Mail::to('markbrightbaraka@gmail.com')->send(new HrUserRegistrationMail());
            Mail::to($staff->email)->send(new AccountApproved());
            Alert::success('success', 'Staff approved successfully!');

            return redirect()->back();
        }
    }
}

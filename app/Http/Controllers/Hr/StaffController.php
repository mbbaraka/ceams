<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\User;
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
        return view('hr.pages.staffs.create');
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


                $file->move(public_path('app\public\images\avator'), $imagename);
         }else{
          $imagename = "default.png";
         }

         if(!(Str::contains($request->email, 'mu.ac.ug'))){
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

}

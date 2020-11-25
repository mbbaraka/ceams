<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\User;
use App\Skills;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ParticularsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skills::where('staff_id', Auth::id())->get();
        $particulars = User::where('staff_id', Auth::id())->first();
        return view('pages.particulars', compact('particulars', 'skills'));
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
        $this->validate($request,
        [
            'avator' => 'image|mimes:jpeg,jpg,png,webp',
            'email' => 'required|string|email|max:255|regex:/(.*)@muni\.ac.ug/i',
            'phone' => 'required',
            'dob' => 'required',
        ]);

        $staff = User::find($id);

        $file = $request->file('avator');
         if (isset($file)) {
           $curentdate = Carbon::now()->toDateString();
                $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                if(fileExists('app/public/images/avator/'.$staff->avator)){
                    unlink('app/public/images/avator/'.$staff->avator);
                }
                $file->move(public_path('app/public/images/avator'), $imagename);
         }else{
          $imagename = $staff->avator;
         }

        if (isset($request->password)) {
           $password = $request->password;
           if(strlen($password) < 8){
            toast('Password to easy. Should be more than 8 characters', 'warning');
            return redirect()->back();
           }elseif ($request->confirm_password == "") {
               toast('You must confirm password', 'warning');
               return redirect()->back();
           }else {
               $confirm_password = $request->confirm_password;

               if ($password === $confirm_password) {
                   $staff->password = bcrypt($password);
               }else{
                    toast('Passwords do not match', 'warning');
                    return redirect()->back();
               }
           }
        }

            $staff->avator = $imagename;
            $staff->email = $request->email;
            $staff->phone = $request->phone;
            $staff->dob = $request->dob;
            $save = $staff->save();


            if ($save) {
                Alert::success('Updated', 'Staff successfully updated!');

                return redirect()->back();
                }else{
                    Alert::warning('Update Failed', 'Staff failed to be updated!');

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
        //
    }
}

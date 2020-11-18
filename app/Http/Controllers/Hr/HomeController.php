<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notification;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        $notifications = Notification::where('receiver_id', Auth::user()->id)->where('status', '0')->paginate();
        $pending = User::where('status', '0')->paginate(5);
        return view('hr.index', compact('pending', 'notifications'));
    }
}

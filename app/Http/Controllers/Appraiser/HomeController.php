<?php

namespace App\Http\Controllers\Appraiser;

use App\Http\Controllers\Controller;
use App\Notification;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $notifications_count = Notification::where('receiver_id', Auth::user()->staff_id)->where('status', '0')->count();
        $notifications = Notification::where('receiver_id', Auth::user()->staff_id)->where('status', '0')->paginate();
        $appraisees = User::where('appraiser_status', Auth::user()->staff_id)->where('status', '1')->get();
        return view ('appraiser.index', compact('appraisees', 'notifications', 'notifications_count'));
    }
}

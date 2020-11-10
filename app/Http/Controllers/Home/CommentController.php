<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $staffs = User::where('appraiser_status', Auth::user()->staff_id)->paginate(5);
        return view('comments.index', compact('staffs'));
    }
}

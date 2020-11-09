<?php

namespace App\Http\Controllers\Home;

use App\Course;
use App\Study;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $categories = Category::orderBy('id', 'DESC')->limit('3')->get();
        // $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')->limit('3')->get();
        // $pages = Post::orderBy('id', 'DESC')->where('post_type', 'page')->limit('3')->get();
        // return view('admin.index', compact('categories', 'posts', 'pages'));
        // $title = 'Hello';
        $notification_count = Notification::where('receiver_id', Auth::user()->staff_id)->where('status', '0')->get();
        $notifications = Notification::where('receiver_id', Auth::user()->staff_id)->latest()->paginate(5);
        return view ('pages.index', compact('notifications', 'notification_count'));
    }
    /**
     * Show the achievement counts.
     *
     */
    public function achievementCount()
    {
        $staff_id = Auth::id();
        $study = Study::where('staff_id', $staff_id)->get();
        return view ('partials.side', compact(
            'study'
        ));
    }

    public function markRead($id)
    {
        $notifications = Notification::findOrFail($id);
        $notifications->status = '1';
        $mark = $notifications->save();
        if ($mark) {
            return redirect()->back();
        }
    }

    public function deleteNotification($id)
    {
        $notifications = Notification::findOrFail($id);

        $delete = $notifications->delete();
        if ($delete) {
            toast('Deleted Notification', 'success');
            return redirect()->back();
        }
    }
}

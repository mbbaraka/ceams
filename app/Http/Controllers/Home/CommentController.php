<?php

namespace App\Http\Controllers\Home;

use App\Comment;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $staffs = User::where('status', '1')->where('staff_id', '!=', Auth::user()->staff_id)->paginate(5);
        return view('comments.index', compact('staffs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['comment' => 'required|min:30']);

        $id = $request->id;
        $staff = User::find(Auth::user()->staff_id);
        $comments = Comment::where('appraisee_id', $id)->first();

        if (!empty($comments)) {
            $comment = Comment::find($comments->id);

            if ($staff->role == 'HOD') {
                $comment->hod_comment = $request->comment;
                $comment->date_hod_comment = Carbon::now();
            }elseif($staff->role == 'DEAN') {
                $comment->dean_comment = $request->comment;
                $comment->date_dean_comment = Carbon::now();
            }elseif($staff->role == 'US') {
                $comment->us_comment = $request->comment;
                $comment->date_us_comment = Carbon::now();
            }elseif($staff->role == 'VC') {
                $comment->vc_comment = $request->comment;
                $comment->date_vc_comment = Carbon::now();
            }

            $save = $comment->save();
            if ($save) {
                Alert::success('Success', 'Successfully updated comment');
                return redirect()->back();
            }
        }else{
            $comment = new Comment();
            $comment->appraisee_id = $id;

            if ($staff->role == 'HOD') {
                $comment->hod_comment = $request->comment;
                $comment->date_hod_comment = Carbon::now();
            }elseif($staff->role == 'DEAN') {
                $comment->dean_comment = $request->comment;
                $comment->date_dean_comment = Carbon::now();
            }elseif($staff->role == 'US') {
                $comment->us_comment = $request->comment;
                $comment->date_us_comment = Carbon::now();
            }elseif($staff->role == 'VC') {
                $comment->vc_comment = $request->comment;
                $comment->date_vc_comment = Carbon::now();
            }
            $save = $comment->save();

            if ($save) {
                Alert::success('Success', 'Successfully inserted comment');
                return redirect()->back();
            }
        }


    }
}

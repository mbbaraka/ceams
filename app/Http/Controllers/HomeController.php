<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Registration pending
    public function pending()
    {
        return view('pages.pending');
    }
}

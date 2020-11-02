<?php

namespace App\Http\Controllers\Appraiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view ('appraiser.index');
    }
}

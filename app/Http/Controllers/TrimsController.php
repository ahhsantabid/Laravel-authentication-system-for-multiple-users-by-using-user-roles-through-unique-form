<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrimsController extends Controller
{
    public function index()
    {
        return view('trims.dashboard'); // Ensure this view exists
    }
}

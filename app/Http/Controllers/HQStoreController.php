<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HQStoreController extends Controller
{
    public function index()
    {
        return view('hq-store.dashboard'); // Ensure this view exists
    }
}

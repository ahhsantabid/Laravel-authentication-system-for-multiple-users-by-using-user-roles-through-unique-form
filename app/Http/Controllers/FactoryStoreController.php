<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactoryStoreController extends Controller
{
    public function index()
    {
        return view('factory-store.dashboard'); // Ensure this view exists
    }
}

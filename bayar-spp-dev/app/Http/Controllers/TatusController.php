<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TatusController extends Controller
{

    public function index()
    {
        return view('/dashboard/tatus');
    }
}

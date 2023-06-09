<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Show Main Page
    public function index()
    {
        return view('items.index');
    }
}

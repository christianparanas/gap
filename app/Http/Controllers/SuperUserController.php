<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperUserController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Welcome, SUPER USER!']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    // store
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            ''
        ]);
    }
}

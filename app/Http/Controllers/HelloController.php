<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function show()
    {
    
        $name = 'Toàn Nè';
        return view('hello', ['name' => $name]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return view('test');
    }

    public function test2()
    {
        $alltest = Test::all();
        return response($alltest);
    }
}

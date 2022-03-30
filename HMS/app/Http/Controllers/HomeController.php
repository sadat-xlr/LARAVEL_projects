<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //


    public function index()
    {
        return view('user.index');
    }
    public function redirect()
    {

        if (Auth::id()) {

            if (Auth::user()->type == 0) {
                return view('user.index');
            } else {
                return view('admin.index');
            }
        } else {
            return redirect()->back();
        }
    }
}

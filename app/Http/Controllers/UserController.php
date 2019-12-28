<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Carbon\Carbon;
use App\User;
use App\TutorApplication;
use App\Package;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = User::whereHas('roles', function($q){ $q->where('name', 'tutor'); })->get();
        return view('users')->with('users', $users);
    }

    //
    public function showGetClientDetails(Request $request)
    {
        session(['tutorial_package' => $request->package]);//store tutor data in session
        //if already authenticated then redirect to checkout
        if (Auth::check()) {
            return redirect(route('checkout'));
        }
        session(['register_redirect' => 'checkout']);
        return view('customer-details');
    }
}

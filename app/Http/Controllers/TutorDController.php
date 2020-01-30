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

class TutorDController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('role:tutor');
    }
    public function showDashboard(Request $request)
    {
        return view('tutor.profile');
    }

    public function showManageTutors(Request $request)
    {
        return view('tutor.tutors');
    }
    public function showManageUsers(Request $request)
    {
        return view('tutor.users');
    }
    public function accept()
    {
        return request()->all();
    }
}

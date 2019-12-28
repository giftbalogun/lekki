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

class AdministratorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function showDashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function showManageTutors(Request $request)
    {
        return view('admin.tutors');
    }
    public function showManageUsers(Request $request)
    {
        return view('admin.users');
    }
    public function accept()
    {
        return request()->all();
    }
}

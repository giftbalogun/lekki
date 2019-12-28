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

class PackageController extends Controller
{
    public function getPackagePricing(Request $request)
    {
        $package = Package::find($request->package);
        return $package->getPackagePricing($request->lga,$request->state);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \Carbon\Carbon;
use App\User;
use App\TutorApplication;
use App\Package;
use App\State;
use App\Lga;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    //
    public function getStateLgas(Request $request)
    {
        $state = State::find($request->state);
        if ($state != NULL) {
            return $state->lgas()->get(['id', 'name']);
        } else {
            return [];
        }
    }
}

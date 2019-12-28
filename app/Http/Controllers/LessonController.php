<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Carbon\Carbon;
use App\User;
use App\TutorRequest;
use App\Package;

class LessonController extends Controller
{
    public function showSelectLesson(Request $request)
    {
        if(!isset($request->tutor)) {
            return redirect(route('select-tutor'));
        }
        $tutor = User::find($request->tutor);
        if (is_null($tutor)) {
            return redirect(route('select-tutor'))->with('error', 'Tutor does not exist.');
        } else if (!$tutor->hasRole('tutor')) {
            return redirect(route('select-tutor'))->with('error', 'Tutor does not exist.');
        }
        //get packages
        $packages = Package::all()->groupBy('group');
        session(['tutor' => $request->tutor]);//store tutor data in session
        return view('select-lesson')->with('tutor', $request->tutor)->with('packages', $packages);
    }
}

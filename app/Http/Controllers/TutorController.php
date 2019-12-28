<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Carbon\Carbon;
use App\User;
use App\TutorApplication;
use App\Package;

class TutorController extends Controller
{
    public function showTutors()
    {
        $tutors = User::whereHas('roles', function($q){ $q->where('name', 'tutor'); })->get();
        return view('tutors')->with('tutors', $tutors);
    }

    public function showBecomeTutor()
    {
        return view('become-tutor');
    }

    public function becomeTutor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "fullname" => "required|max:255|string",
            "phone" => "required",
            "email" => "required|email|unique:users,email|unique:tutor_applications,email",
            "cv" => "required|mimetypes:application/pdf"
        ]);

        if ($validator->fails()) {
            return redirect(route('become-tutor'))->with('error', implode(" ",$validator->messages()->all()))->withInput();
        }
        $textInputs = $request->only(["fullname","phone", "email"]);
        $tutorApplication = new TutorApplication();
        $tutorApplication->fill($textInputs);

        $cv = $this->uploadFile($request->cv);
        $tutorApplication->cv = $cv;

        $tutorApplication->save();

        return redirect(route('become-tutor'))->with('success', 'Application sent!, We will get back to you');
    }

     /**
    * Handle file uploads
    */
    protected function uploadFile($resource, $prefix="")
    {
        $fileName = $prefix . time() . str_random(4) . "pdf";
        $savePath = "uploads/" . $fileName;
        $resource->storeAs("uploads/", $fileName, ['disk' => 'public']);
        return $savePath;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddDropRequest;
use App\Models\Validation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AddDropRequestController extends Controller
{
    public function showAddDropRequestForm()
    {
        $user = Auth::user();
        $student_no = $user->student_no;

        $request = AddDropRequest::where('student_no', $student_no)->first();
        $addDroprequestExists = $request ? true : false;
        $addDroprequestStatus = $request ? $request->status : null;
        $add_drop_form = $request ? $request->add_drop_form : null;

        

        return view('layouts.directives.add_drop', [
            'addDroprequestExists' => $addDroprequestExists,
            'addDroprequestStatus' => $addDroprequestStatus,
            'user' => $user,
            'add_drop_form' => $add_drop_form,
        ]);
    }

    public function pushRequest(Request $request)
    {
        $user = Auth::user();
        $student_no = $user->student_no;

        # Basic Info
        $addDropRequest = AddDropRequest::where('student_no', $student_no)->first();
        $validation = Validation::where('student_no', $student_no)->first();
        $addDropRequest = $addDropRequest == null ? new AddDropRequest() : $addDropRequest;
        $addDropRequest->student_no = $student_no;
        $addDropRequest->date_of_request = Carbon::now();
        $addDropRequest->status = 'Pending';

        if ($validation) {
            $addDropRequest->student_no = $validation->student_no;
            $addDropRequest->study_plan = $validation->study_plan_course_code;
            $validation->delete();
        }

        if ($request->hasFile('add_drop_form')) {
            $addDropRequest->add_drop_form = $request->file('add_drop_form')->store('add-drop-request-files', 'public');
        }

        $addDropRequest->save();

        return redirect()->back();
    }
}
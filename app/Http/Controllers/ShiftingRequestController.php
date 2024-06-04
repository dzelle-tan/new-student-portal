<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShiftingRequest;
use App\Models\Validation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ShiftingRequestController extends Controller
{
    public function showShiftingRequestForm()
    {
        $user = Auth::user();
        $student_no = $user->student_no;

        $request = ShiftingRequest::where('student_no', $student_no)->first();
        $shiftingrequestExists = $request ? true : false;
        $shiftingrequestStatus = $request ? $request->status : null;
        $letter_of_intent= $request ? $request->letter_of_intent : null;
        $note_of_undertaking= $request ? $request->note_of_undertaking : null;
        $shifting_form= $request ? $request->shifting_form : null;

        

        return view('layouts.directives.shifting', [
            'shiftingrequestExists' => $shiftingrequestExists,
            'shiftingrequestStatus' => $shiftingrequestStatus,
            'user' => $user,
            'letter_of_intent' => $letter_of_intent,
            'note_of_undertaking' => $note_of_undertaking,
            'shifting_form' => $shifting_form,
        ]);
    }

    public function pushRequest(Request $request)
    {
        $user = Auth::user();
        $student_no = $user->student_no;

        # Basic Info
        $shiftingRequest = ShiftingRequest::where('student_no', $student_no)->first();
        $validation = Validation::where('student_no', $student_no)->first();
        $shiftingRequest = $shiftingRequest == null ? new ShiftingRequest() : $shiftingRequest;
        $shiftingRequest->student_no = $student_no;
        $shiftingRequest->date_of_request = Carbon::now();
        $shiftingRequest->status = 'Pending';

        if ($validation) {
            $shiftingRequest->student_no = $validation->student_no;
            $shiftingRequest->study_plan = $validation->study_plan_course_code;
            $validation->delete();
        }

        if ($request->hasFile('letter_of_intent')) {
            $shiftingRequest->letter_of_intent = $request->file('letter_of_intent')->store('shifting-request-files', 'public');
        }

        if ($request->hasFile('note_of_undertaking')) {
            $shiftingRequest->note_of_undertaking = $request->file('note_of_undertaking')->store('shifting-request-files', 'public');
        }

        if ($request->hasFile('shifting_form')) {
            $shiftingRequest->shifting_form = $request->file('shifting_form')->store('shifting-request-files', 'public');
        }

        $shiftingRequest->save();

        return redirect()->back()->with('status', 'Request submitted successfully!');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LOARequest;
use App\Models\Validation;
use App\Models\StudentTerm;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LOARequestController extends Controller
{
    public function showLoaRequestForm()
    {
        $user = Auth::user();
        $student_no = $user->student_no;

        $request = LOARequest::where('student_no', $student_no)->first();
        $loarequestExists = $request ? true : false;
        $loarequestStatus = $request ? $request->status : null;
        $loa_form = $request ? $request->loa_form : null; 
        $letter_of_request = $request ? $request->letter_of_request : null;
        $note_of_undertaking = $request ? $request->note_of_undertaking : null;
        $clearance = $request ? $request->clearance : null;

        return view('layouts.directives.loa', [
            'loarequestExists' => $loarequestExists,
            'loarequestStatus' => $loarequestStatus,
            'user' => $user,
            'loa_form' => $loa_form,  // Include document information in the data
            'letter_of_request' => $letter_of_request,
            'note_of_undertaking' => $note_of_undertaking,
            'clearance' => $clearance,
        ]);
    }

    public function pushRequest(Request $request)
    {
        $user = Auth::user();
        $student_no = $user->student_no;

        # Basic Info
        $loaRequest = LOARequest::where('student_no', $student_no)->first();
        $validation = Validation::where('student_no', $student_no)->first();
        $loaRequest = $loaRequest == null ? new LOARequest() : $loaRequest;
        $loaRequest->student_no = $student_no;

        $currentTerm = StudentTerm::where('student_no', $student_no)->latest()->first();
        $loaRequest->year_level = $currentTerm->year_level;
        $loaRequest->date_of_request = Carbon::now();
        $loaRequest->status = 'Pending';

        if ($validation) {
            $loaRequest->student_no = $validation->student_no;
            $loaRequest->study_plan = $validation->study_plan_course_code;
            $validation->delete();
        }

        if ($request->hasFile('loa_form')) {
            $loaRequest->loa_form = $request->file('loa_form')->store('loa-request-files', 'public');
        }
        if ($request->hasFile('letter_of_request')) {
            $loaRequest->letter_of_request = $request->file('letter_of_request')->store('loa-request-files', 'public');
        }
        if ($request->hasFile('note_of_undertaking')) {
            $loaRequest->note_of_undertaking = $request->file('note_of_undertaking')->store('loa-request-files', 'public');
        }
        if ($request->hasFile('clearance')) {
            $loaRequest->clearance = $request->file('clearance')->store('loa-request-files', 'public');
        }

        $loaRequest->save();

        return redirect()->back();
    }
}
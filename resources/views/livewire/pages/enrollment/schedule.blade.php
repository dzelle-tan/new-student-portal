<?php

use App\Models\Student;
use App\Models\StudentRecord;
use App\Models\StudyPlanValidations;
use App\Models\Validation;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {

    public StudentRecord $record;
    public Student $user;
    public string $studentStatus;
    public $requestStatus;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user();
        $this->studentStatus = $this->user->student_status; // Added student status
        $this->getStudentClass();

        $study_plan_validation = Validation::where('student_no', $this->user->student_no)->first();
        if ($study_plan_validation) {
            $this->Status = $study_plan_validation->status;
        }

        $request = Validation::where('student_no', '=', $this->user->student_no);
        $requestExists = $request->exists();

        $this->requestStatus = "Pending";
        if ($requestExists) {
            $this->requestStatus = $request->first()->status;
        }
    }

    public function getStudentClass(): void
    {
        $this->record = StudentRecord::where('student_no', $this->user->student_no)
            ->with('classes')
            ->orderBy('school_year', 'desc')
            ->orderBy('semester', 'desc')
            ->first();
    }
};?>
<div x-data="{ currentStep: 1, openPanel: 1, showConfirmModal: false, studentStatus: '{{ $studentStatus }}' }">
    {{-- Student Information --}}
    <div class="mt-6 mb-6 lg:items-center lg:w-5/6 xl:2/3 lg:flex lg:justify-between">
        <div>
            <div>
                <x-info-label class="w-24">{{_("Student No:")}}</x-info-label>
                <span>{{ $user->student_no }}</span>
            </div>
            <div>
                <x-info-label class="w-24">{{_("Name:")}}</x-info-label>
                <span>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</span>
            </div>
        </div>
        <div>
            <div>
                <x-info-label class="w-24">{{_("Program:")}}</x-info-label>
                <span>{{ $user->degree_program }}</span>
            </div>
            <div>
                <x-info-label class="w-24">{{_("A.Y Term:")}} </x-info-label>
                <span>{{ $record->school_year }} - Term {{ $record->semester }} </span>
            </div>
        </div>
    </div>

    {{-- Conditional Content --}}
    @if($studentStatus == 'Regular')
        {{-- Schedule --}}
        <div class="w-full mt-4 overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap">
                <thead>
                    <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                        <th class="px-4 py-3 font-medium">{{_("Class Code")}}</th>
                        <th class="px-4 py-3 font-medium">{{_("Section")}}</th>
                        <th class="px-4 py-3 font-medium">{{_("Subject Title")}}</th>
                        <th class="px-4 py-3 font-medium">{{_("Units")}}</th>
                        <th class="px-4 py-3 font-medium">{{_("Schedule")}}</th>
                        <th class="px-4 py-3 font-medium">{{_("Type")}}</th>
                        <th class="px-4 py-3 font-medium">{{_("Room")}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($record->classes as $class)
                        <tr class="text-sm border-b border-gray-200">
                            <td class="px-4 py-3">{{ $class->code }}</td>
                            <td class="px-4 py-3">{{ $class->section }}</td>
                            <td class="px-4 py-3 min-w-[200px] max-w-[300px] whitespace-normal">{{ $class->name }}</td>
                            <td class="px-4 py-3 ">{{ $class->units }}</td>
                            <td class="px-4 py-3">{{ $class->day }} {{ date('g:i A', strtotime($class->start_time)) }}
                                {{_("-")}} {{ date('g:i A', strtotime($class->end_time)) }}
                            </td>
                            <td class="px-4 py-3">{{ ucfirst($class->type) }}</td>
                            <td class="px-4 py-3">{{ $class->room }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Additional Information for Regular Students --}}
        <div class="mt-6">
            <div class="p-4 bg-green-100 border border-green-400 rounded-md">
                <h3 class="text-lg font-semibold text-green-800">{{ __("Regular Student Information") }}</h3>
                <p class="mt-2 text-sm text-green-700">
                    {{ __("This section contains additional information specifically for regular students.") }}
                </p>
            </div>
        </div>
    @else
        {{-- Content for Irregular Students --}}
        <!-- Main content -->
        <section class="content">
            <!-- Step 1 -->
            <div class="card custom-table-container mb-3">
                <div class="card-body">
                    <div class="p-4 bg-blue-100 border border-blue-400 rounded-md">
                        <button @click="openPanel === 1 ? openPanel = null : openPanel = 1"
                            class="accordion text-3xl font-normal text-black-700">1. Requirements and
                            Reminders
                            <i class="fas fa-check-circle step-checkmark" style="font-size: 27px;"></i>
                        </button>
                        <div x-show="openPanel === 1" class="panel" x-transition>
                            <p style="font-family: Inter, sans-serif; font-size: 24px; color:black;">General Rules
                                Guidelines</p>
                            <p class="body-font">&nbsp;&nbsp;a. Students of respective degree programs must strictly observe
                                the prescribed curriculum.</p>
                            <p class="body-font">&nbsp;&nbsp;b. Each Department shall issue a Curriculum checklist/ Course
                                Prospectus to the student, which shall be used until he/she graduates.</p>
                            <p class="body-font">&nbsp;&nbsp;c. Students must enroll their subjects as scheduled on a
                                particular semester/term with consideration of the required pre-requisites prior to
                                enrolling.</p>
                            <p class="body-font">&nbsp;&nbsp;d. To avoid re-enrolling a completed subject, the respective
                                Deans must ensure that the student has properly accomplished the “Curriculum checklist/
                                Course Prospectus”.</p>
                            <p class="body-font">&nbsp;&nbsp;e. As an irregular student, it is required of you to submit
                                your Study Plan containing a personalized curriculum of courses to be taken based on the
                                Curriculum checklist/ Course Prospectus provided to you by your department.</p>
                            <p class="body-font">&nbsp;&nbsp;f. Enlistment procedures of irregular students will be similar
                                to enlistment of Physical Education (PE) courses. But this time, all courses will be
                                enlisted by the student as per their approved Study Plan.</p>
                            <p style="font-family: Inter, sans-serif; font-size: 26px; color:black;">Reminders and
                                Regulations</p>
                            <p class="body-font">&nbsp;&nbsp;a. A maximum residency of seven (7) years for undergraduate
                                programs is allowed. Meaning, a student can reside up their 6th year. Academic year skipped
                                due to Leave of Absence (LOA) is not counted.</p>
                            <p class="body-font">&nbsp;&nbsp;b. In cases that students receive failing grade in a subject,
                                they can only retake it once more. Meaning, a student can only take a course twice.</p>
                            <p class="body-font">&nbsp;&nbsp;c. Subjects that have Pre-requisites cannot be taken unless
                                their required subjects are accomplished.</p>
                            <p class="body-font">&nbsp;&nbsp;d. Co-requisites are subjects that should be taken at the same
                                time except in cases that they are to be taken separately as retakes.</p>
                            <p class="body-font">&nbsp;&nbsp;e. Students that are Irregular due to failing grade in a
                                subject are no longer eligible for Latin Honors (Cum Laude, etc.)</p>
                            <p class="body-font">&nbsp;&nbsp;f. Students that are Irregular due to their approved LOA are
                                still eligible for Latin Honors as long as their Study Plan follows the prescribed
                                curriculum.</p>
                            <div class="flex justify-end mt-4">
                                <button type="button"
                                    class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                    @click="openPanel = 2">Proceed to Curriculum Checklist</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Step 2 -->
            <div class="card custom-table-container mb-3">
                <div class="card-body">
                    <div class="p-4 bg-blue-100 border border-blue-400 rounded-md">
                        <button @click="openPanel === 2 ? openPanel = null : openPanel = 2"
                            class="accordion text-3xl font-normal text-black-700">2. Download
                            Curriculum Checklist
                            <i class="fas fa-check-circle step-checkmark" style="font-size: 27px;"></i>
                        </button>
                        <div x-show="openPanel === 2" class="panel" x-transition>
                            <br>
                            <button type="button" class="btn btn-primary float-right"
                                style="color: #2D349A; position: relative; bottom: 0px; left: 5px; width: 120px; height: 4ch;">
                                <i class="fas fa-download"
                                    style="color: white; margin-right: .2rem; top: -0.2rem; position: relative; font-size: 15px;"></i>
                                <span
                                    style="color: white; margin-right: 0.2rem; top: -0.2rem; position: relative; font-size: 15px;">Download</span>
                            </button>
                            <p style="font-family: Inter, sans-serif; font-size: 24px; color:black;">Curriculum Checklist
                            </p>
                            <object data="http://localhost/enrollmentmod/generate-pdf" type="application/pdf" width="80%"
                                height="400px" style="position: relative; top: 20px; left: 10%;"></object>
                            <div class="flex justify-between mt-4">
                                <button type="button"
                                    class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                    @click="openPanel = 1">Back to Requirements and Reminders</button>
                                <button type="button"
                                    class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                    @click="openPanel = 3">Proceed to Create Study Plan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Step 3 -->
            <div class="card custom-table-container mb-3 relative z-10"
                x-data="{ showModal: false, showConfirmSaveModal: false, showToast: false }">
                <div class="card-body">
                    <div class="p-4 bg-blue-100 border border-blue-400 rounded-md">
                        <button @click="openPanel === 3 ? openPanel = null : openPanel = 3"
                            class="accordion text-3xl font-normal text-black-700">3. Create your Study Plan
                            <i class="fas fa-check-circle step-checkmark" style="font-size: 27px;"></i>
                        </button>
                        <div x-show="openPanel === 3" class="panel" x-transition>
                            <p style="font-family: Inter, sans-serif; font-size: 26px; color: black;">Guidelines for Study
                                Plans</p>
                            <p class="body-font">&nbsp;&nbsp;a. Arrange your study plan considering the availability of
                                courses. Major-specific subjects are exclusively offered in particular semesters.</p>
                            <p class="body-font">&nbsp;&nbsp;b. Mandatory major subjects should be taken during the
                                designated semester they are available.</p>
                            <p class="body-font">&nbsp;&nbsp;c. A subject cannot be taken if it is a prerequisite for a
                                previously failed subject. Ensure successful completion of prerequisites before enrolling in
                                advanced courses.</p>
                            <p class="body-font">&nbsp;&nbsp;d. Failed prerequisites must be retaken and successfully
                                completed before proceeding to higher-level courses.</p>
                            <p class="body-font">&nbsp;&nbsp;e. The upcoming semester should be the first one accounted for
                                in your study plan. Plan your courses according to the sequence recommended by the academic
                                curriculum.</p>
                            <p class="body-font">&nbsp;&nbsp;f. Overloaded unit enrollments are permissible only for
                                students approaching graduation, subject to approval.</p>
                            <p class="body-font">&nbsp;&nbsp;g. Underloaded units should also be verified by the college
                                chairperson to ensure compliance with program requirements.</p>

                            <div class="flex justify-between mt-4">
                                <button type="button"
                                    class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                    @click="openPanel = 2">Back to Download Curriculum Checklist</button>
                                <button type="button"
                                    class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                    @click="showModal = true">Create Study Plan</button>
                                <button type="button"
                                    class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                    @click="openPanel = 4">Proceed to Submission of Documents</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for Study Plan -->
                <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10"
                    x-cloak>
                    <div class="bg-white p-6 rounded-md w-full max-w-5xl max-h-[90vh] overflow-y-auto">
                        <div class="modal-header flex justify-between items-center border-b pb-2">
                            <h2 class="text-xl font-semibold">Create Study Plan</h2>
                            <button @click="showModal = false" class="text-gray-600 hover:text-gray-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body mt-4">
                            <livewire:study-plan /> <!-- Added study plan livewire component -->
                        </div>
                    </div>
                </div>
            </div>

            <p style="font-size: 2px;">&nbsp;</p> <!-- Added space w/inline style -->

              <!-- Step 4 -->
              <div class="card custom-table-container mb-3">
                <div class="card-body">
                    <div class="p-4 bg-blue-100 border border-blue-400 rounded-md">
                        <button @click="openPanel === 4 ? openPanel = null : openPanel = 4"
                            class="accordion text-3xl font-normal text-black-700">
                            4. Await Approval
                            <i class="fas fa-check-circle step-checkmark" style="font-size: 27px;"></i>
                        </button>
                        <div x-show="openPanel === 4" class="panel" x-transition>
                            <p style="font-family: Inter, sans-serif; font-size: 26px; color:black; font-weight:bold;">Document Status: 
                                @if( $requestStatus == "Pending")
                                <strong style="color: #AB830F;">For Checking</strong>
                                @elseif( $requestStatus == "Rejected")
                                <strong style="color: #e90c0c;">For Revision</strong>
                                @elseif( $requestStatus == "Approved")
                                <strong style="color: #14ae5c;">For Submission Onsite</strong>
                                @endif
                            </p>
                            <p class="body-font">&nbsp;&nbsp;a. Submitted documents will be checked by corresponding
                                department chairperson.</p>
                            <p class="body-font">&nbsp;&nbsp;b. Refresh this page from time-to-time to know the status of
                                your Study Plan.</p>
                                
                            <div class="flex justify-between mt-4">
                                <button type="button"
                                    class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                    @click="openPanel = 3">Back to Create your Study Plan</button>
                                @if( $requestStatus == "Approved")
                                <button type="button"
                                    class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                    @click="openPanel = 5">Change status to submission onsite</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
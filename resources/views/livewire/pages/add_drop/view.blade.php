<?php

use App\Models\Student;
use App\Models\StudentRecord;
use App\Models\StudyPlanValidations;
use App\Models\Validation;
use App\Models\StudentTerm;
use App\Models\Course;
use App\Models\BSCS_grade;
use App\Models\AddDropRequest;
use App\Models\ShiftingRequest;
use App\Models\LoaRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

new class extends Component {
    use WithFileUploads;
    public $record;
    public Student $user;
    public $studentStatus;
    public $latestTerm;
    public $programTitle;
    public $requestStatus;
    public $otherRequestExists;
    public $studentid;
    public $Status;
    public $pre_requisites;
    public $courses = [];
    public $dropdownContent2_1 = [];
    public $bscs_grades;
    public $dropdownContent2_2 = [];
    public $dropdownContent3_1 = [];
    public $dropdownContent3_2 = [];
    public $dropdownContent4_1 = [];
    public $dropdownContent4_2 = [];
    public $tableBody = '';
    public $tableBodyId = '';
    public $totalUnits21 = 0;
    public $totalUnits22 = 0;
    public $totalUnits32 = 0;
    public $totalUnits42 = 0;
    public $totalUnits72 = 0;
    public $totalUnits62 = 0;
    public $dropdownContentRef;
    public $preRequisiteGrade;
    public $units;
    public $studentName;
    public $yearlevel;
    public $year_level;
    public $student_no;
    public $grade;
    public bool $hasRecord;
    public bool $hasRecord2;
    public $addDroprequestExists;
    public $addDroprequestStatus;
    public $values;
    public $add_drop_form;

    protected $listeners = ['pushCourseCodesFinal'];

    public function mount($addDroprequestExists, $addDroprequestStatus, $user, $add_drop_form)
    {
        $this->addDroprequestExists = $addDroprequestExists;
        $this->addDroprequestStatus = $addDroprequestStatus;
        $this->add_drop_form = $add_drop_form;
        $this->user = $user;

        $this->user = Auth::user();
        $this->studentid = $this->user->student_no;
        $this->latestTerm = $this->user->terms()->latest()->first();
        $this->studentStatus = $this->latestTerm->registrationStatus->registration_status; // Added student status
        $this->programTitle = $this->latestTerm->program->program_title ?? 'N/A';
        $this->otherRequestExists = $this->checkOtherRequests();

        $this->courses = Course::all();
        $this->tableBodyId = '';
        $this->preRequisiteGrade = $this->getPrerequisiteGrade($this->pre_requisites);
        $this->updateTotalUnits32();
        $this->updateTotalUnits42();
        $this->updateTotalUnits72();
        $this->updateTotalUnits62();
        $this->updateTotalUnits22();
        $this->updateTotalUnits21();

        // Assuming you have access to $course object here
        foreach ($this->courses as $course) {
            // Get the grade for the current course
            $grade = $this->getCourseGrade($course->course_code);

            // Get the prerequisite grade for the current course
            $preRequisiteGrade = $this->getPrerequisiteGrade($course->pre_requisites);

            if (($grade === 5 && $course->year_lvl === 2 && $course->sem === 2) || ($preRequisiteGrade === 5 && $course->year_lvl === 2 && $course->sem === 2)) {
                $targetTable = 'tableBody42';
                $this->moveRowToDropdown($course->id, $targetTable);
            } elseif ($preRequisiteGrade === 5 && $course->year_lvl === 3 && $course->sem === 1) {
                $targetTable = 'tableBody72';
                $this->moveRowToDropdown($course->id, $targetTable);
            } elseif (($grade === 5 && $course->year_lvl === 3 && $course->sem === 2) || ($preRequisiteGrade === 5 && $course->year_lvl === 3 && $course->sem === 2)) {

                $targetTable = 'tableBody62';
                $this->moveRowToDropdown($course->id, $targetTable);
            }
        }
        $request = StudyPlanValidations::where('student_no', '=', Auth::user()->student_no);
        $this->hasRecord = $request->exists();
        $this->requestStatus = $this->hasRecord ? $request->first()->status : "Pending";

        $request2 = AddDropRequest::where('student_no', '=', Auth::user()->student_no);
        $this->hasRecord2 = $request2->exists();
        $this->requestStatus = $this->hasRecord2 ? $request2->first()->status : "Pending";

    }

    public function checkOtherRequests()
    {
        if (ShiftingRequest::where('student_no', $this->studentid)->exists()) {
            return true;
        }

        else if (LoaRequest::where('student_no', $this->studentid)->exists()) {
            return true;
        }

        return false;
    }


    public function moveRowToDropdown($courseId, $tableBody)
    {
        $course = $this->courses->firstWhere('id', $courseId);

        if ($tableBody === 'tableBody32') {
            $this->dropdownContent3_1[] = $course;
            $this->courses = $this->courses->reject(function ($c) use ($courseId) {
                return $c->id === $courseId;
            });
        } elseif ($tableBody === 'tableBody42') {
            $this->dropdownContent3_2[] = $course;
            $this->courses = $this->courses->reject(function ($c) use ($courseId) {
                return $c->id === $courseId;
            });
        } elseif ($tableBody === 'tableBody72') {
            $this->dropdownContent4_1[] = $course;
            $this->courses = $this->courses->reject(function ($c) use ($courseId) {
                return $c->id === $courseId;
            });
        } elseif ($tableBody === 'tableBody62') {
            $this->dropdownContent4_2[] = $course;
            $this->courses = $this->courses->reject(function ($c) use ($courseId) {
                return $c->id === $courseId;
            });
        } elseif ($tableBody === 'tableBody22') {
            $this->dropdownContent2_2[] = $course;
            $this->courses = $this->courses->reject(function ($c) use ($courseId) {
                return $c->id === $courseId;
            });
        } elseif ($tableBody === 'tableBody') {
            $this->dropdownContent2_1[] = $course;
            $this->courses = $this->courses->reject(function ($c) use ($courseId) {
                return $c->id === $courseId;
            });

        }

        $this->courses = $this->courses->reject(function ($c) use ($courseId) {
            return $c->id === $courseId;
        });

        $this->updateTotalUnits32();
        $this->updateTotalUnits42();
        $this->updateTotalUnits72();
        $this->updateTotalUnits62();
        $this->updateTotalUnits22();
        $this->updateTotalUnits21();

    }

    public function moveRowFromDropdownToTable($courseCode, $tableBodyId)
    {
        $courseIndex = null;
        $dropdownContentRef = null;

        switch ($tableBodyId) {
            case 'tableBody':
                $dropdownContentRef = &$this->dropdownContent2_1;
                break;
            case 'tableBody22':
                $dropdownContentRef = &$this->dropdownContent2_2;
                break;
            case 'tableBody32':
                $dropdownContentRef = &$this->dropdownContent3_1;
                break;
            case 'tableBody42':
                $dropdownContentRef = &$this->dropdownContent3_2;
                break;
            case 'tableBody72':
                $dropdownContentRef = &$this->dropdownContent4_1;
                break;
            case 'tableBody62':
                $dropdownContentRef = &$this->dropdownContent4_2;
                break;
        }

        // Proceed only if $dropdownContentRef is defined
        if (isset($dropdownContentRef)) {
            foreach ($dropdownContentRef as $index => $course) {
                if ($course->course_code === $courseCode) { // Use -> instead of []
                    $courseIndex = $index;
                    break;
                }
            }

            if ($courseIndex !== null) {
                $course = $dropdownContentRef[$courseIndex];
                $this->courses->push($course);
                unset($dropdownContentRef[$courseIndex]);
                $dropdownContentRef = array_values($dropdownContentRef); // Reset array keys
                // Add the course to the table with the appropriate button
                $this->updateTotalUnits($tableBodyId, $course->units); // Pass tableBodyId for proper update
            } else {
                // Handle course not found in dropdown (optional: error message)
            }
        }
    }

    public function updateTotalUnits($tableBodyId, $unitChange)
    {
        // Determine the total units property based on the table body ID
        switch ($tableBodyId) {
            case 'tableBody21':
                $totalUnitsProperty = 'totalUnits22';
                break;
            case 'tableBody22':
                $totalUnitsProperty = 'totalUnits22';
                break;
            case 'tableBody32':
                $totalUnitsProperty = 'totalUnits32';
                break;
            case 'tableBody42':
                $totalUnitsProperty = 'totalUnits42';
                break;
            case 'tableBody72':
                $totalUnitsProperty = 'totalUnits72';
                break;
            case 'tableBody62':
                $totalUnitsProperty = 'totalUnits62';
                break;
            default:
                return; // Return if the table body ID is not recognized
        }

        // Check if the total units property exists in the class
        if (property_exists($this, $totalUnitsProperty)) {
            // If the unit change is positive, add it to the total units
            if ($unitChange > 0) {
                $this->$totalUnitsProperty += $unitChange;
            }
            // If the unit change is negative, subtract it from the total units
            elseif ($unitChange < 0 && $this->$totalUnitsProperty >= abs($unitChange)) {
                $this->$totalUnitsProperty += $unitChange;
            }
        }
    }

    public function getDisplayedCourseCodes()
    {
        $courseCodes = [];
        foreach ($this->courses as $course) {
            // Retrieve the grade for the current course from the BSCS_grade model
            $grade = BSCS_grade::where('course_code', $course->course_code)
                ->where('student_no', $this->studentid)
                ->value('grades');


            // Retrieve the prerequisite grade from the BSCS_grade model if prerequisites exist
            $prerequisiteGrade = $course->pre_requisites
                ? BSCS_grade::where('course_code', $course->pre_requisites)
                    ->where('student_no', $this->studentid)
                    ->value('grades')
                : null;

            // Include courses based on year level when grades are not 5
            if ($this->yearlevel === 2 && $course->year_lvl >= 2 && $prerequisiteGrade !== 5 && $grade !== 5 || $grade !== 5) {
                $courseCodes[] = $course->course_code;
            } elseif ($this->yearlevel === 3 && $course->year_lvl >= 3 && $prerequisiteGrade !== 5 && $grade !== 5) {
                $courseCodes[] = $course->course_code;
            } elseif ($this->yearlevel === 4 && $course->year_lvl >= 4 && $prerequisiteGrade !== 5 && $grade !== 5) {
                $courseCodes[] = $course->course_code;
            } elseif ($course->year_lvl === $this->yearlevel && $prerequisiteGrade !== 5 && $grade !== 5) {
                $courseCodes[] = $course->course_code;
            }
        }
        return $courseCodes;
    }

    public function getPrerequisiteGrade($preRequisiteCourseCode)
    {
        // Assuming $pre_requisite contains the course code of the prerequisite course
        $preRequisite = BSCS_grade::where('course_code', $preRequisiteCourseCode)
            ->where('student_no', $this->studentid)
            ->first();

        // If the prerequisite course exists and has a grade, return the grade
        if ($preRequisite && isset($preRequisite->grades)) {
            return $preRequisite->grades;
        }
    }

    public function getCourseGrade($courseCode)
    {
        // Assuming there is a model named CourseGrade to represent the grades of each course
        $courseGrade = BSCS_grade::where('course_code', $courseCode)
            ->where('student_no', $this->studentid)
            ->first();

        // If the course grade exists and has a grade, return the grade
        if ($courseGrade && isset($courseGrade->grades)) {
            return $courseGrade->grades;
        }

        // Return null if the course grade does not exist or does not have a grade
        return null;
    }

    public function pushCourseCodes()
    {
        $courseCodes = $this->getDisplayedCourseCodes();

        // Get the validation record for the current student
        $validation = Validation::where('student_no', $this->studentid)->first();

        if (!$validation) {
            $validation = new Validation();
            $validation->student_no = $this->studentid;
            $validation->yearlvl = $this->yearlevel;
            $validation->status = 'Pending';
            $validation->daterequest = Carbon::now(); //di to nagana not sure y
        }

        $studyPlanCourseCodes = json_encode($courseCodes);

        $validation->study_plan_course_code = $studyPlanCourseCodes;

        $validation->save();

        session()->flash('courseCodesNotification', 'Course codes pushed successfully.');
    }

    public function pushCourseCodesFinal()
    {
    $user = Auth::user();
    $student_no = $user->student_no;
    
    // Get the validation record for the current student
    $validation = Validation::where('student_no', $student_no)->first();

    if ($validation) {
        // Create or update the corresponding record in the LOARequest table
        $addDropRequest = AddDropRequest::firstOrNew(['student_no' => $student_no]);

        // Assign the attributes from the validation object to the LOARequest object
        $addDropRequest->student_no = $validation->student_no; 
        $addDropRequest->status = 'Pending';
        $addDropRequest->date_of_request = Carbon::now();
        $addDropRequest->study_plan = $validation->study_plan_course_code;

        // Save the LOARequest object
        $addDropRequest->save();

        // Optionally, delete the validation record after transferring the data
        $validation->delete();
    }

        return redirect()->back();
    }


    private function checkGrades($course, $gradeThreshold)
    {
        // Assuming $course has properties 'course_code' and 'course_name'
        return isset($course->grades) && $course->grades === $gradeThreshold
            ? $course->course_code . ' - ' . $course->course_name
            : '';
    }

    private function updateTotalUnits21()
    {
        $this->totalUnits21 = $this->courses->where('year_lvl', 2)->where('sem', 1)->sum('units');
    }

    private function updateTotalUnits22()
    {
        $this->totalUnits22 = $this->courses->where('year_lvl', 2)->where('sem', 2)->sum('units');
    }

    private function updateTotalUnits32()
    {
        $this->totalUnits32 = $this->courses->where('year_lvl', 3)->where('sem', 1)->sum('units');
    }

    private function updateTotalUnits42()
    {
        $this->totalUnits42 = $this->courses->where('year_lvl', 3)->where('sem', 2)->sum('units');
    }
    private function updateTotalUnits72()
    {
        $this->totalUnits72 = $this->courses->where('year_lvl', 4)->where('sem', 1)->sum('units');
    }

    private function updateTotalUnits62()
    {
        $this->totalUnits62 = $this->courses->where('year_lvl', 4)->where('sem', 2)->sum('units');
    }
};?>
<div class="p-4 pt-4 bg-white sm:p-8 sm:pt-6 sm:rounded-md">
<div x-data="{
        currentStep: {{ $hasRecord2 ? 5 : 1 }},
        openPanel: {{ $hasRecord2 ? 5 : 1 }},   
        isStudyPlanCompleted: false,
        isAddDropCompleted: false,
        showConfirmModal: false,
        studentStatus: '{{ $studentStatus }}',
        hasRecord2: {{ $hasRecord2 ? 'true' : 'false' }},
        showAddDropModal: false,
        showAddDropConfirmSaveModal: false,
        showToast2: true,
        showToast: false,
        addDroprequestStatus: '{{ $addDroprequestStatus }}',
    }">
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
                <span>{{ $programTitle }}</span>
            </div>
            <div>
                <x-info-label class="w-24">{{_("A.Y Term:")}} </x-info-label>
                <span>{{ $latestTerm->aysem->academic_year_code }} - Term {{ $latestTerm->aysem->semester }} </span>
            </div>
        </div>
    </div>

    @if ($otherRequestExists)
    {{-- Notification Box --}}
    <div class="p-4 mb-6 bg-gray-100 border border-gray-300 rounded-md">
        <div class="flex items-center justify-center text-center">
            <x-icon name="information-circle" class="w-6 h-6 mr-2" solid />
            <span class="font-medium">Only one request can be processed at any given time. Resolve all other requests you have first.</span>
        </div>
    </div>

    @else
    {{-- Notification Box --}}
    <div class="p-4 mb-6 bg-gray-100 border border-gray-300 rounded-md">
        <div class="flex items-center justify-center text-center">
            <x-icon name="information-circle" class="w-6 h-6 mr-2" solid />
            <span class="font-medium">Follow steps one to five below. Failure to comply with a step prohibits you from proceeding forward with the request.</span>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <!-- Step 1 -->
        <div class="card custom-table-container mb-3">
            <div class="card-body">
                <div class="p-4 bg-blue-100 border border-blue-400 rounded-md">
                <button type="button" 
                    class="accordion text-3xl font-normal text-black-700"
                    :class="{
                        'opacity-50 cursor-not-allowed  text-gray-600': currentStep < 1 || addDroprequestStatus === 'Approved'
                    }"
                    :disabled="currentStep < 1 || addDroprequestStatus === 'Approved'"
                    @click="if (addDroprequestStatus !== 'Approved') { openPanel = 1 }">
                    1. Requirements and Reminders
                    <i class="fas fa-check-circle step-checkmark" :class="{ 'text-green-500': currentStep > 1 || hasRecord2 }" style="font-size: 27px;"></i>
                </button>
                    <div x-show="openPanel === 1" class="panel" x-transition>
                        <p style="font-family: Inter, sans-serif; font-size: 24px; color:black;">General Rules
                            Guidelines</p>
                    <!-- Content for letter 'a' -->
                    <p class="body-font">&nbsp;&nbsp;a. A student may seek a leave of absence by a written petition to the respective department chair for evaluation. This written permission, together with the Leave of Absence Form, must be duly endorsed by the Dean to the Vice President for Academic Affairs, for approval.</p>
                    <!-- Content for letter 'b' -->
                    <p class="body-font">&nbsp;&nbsp;b. A student who leaves the college without an approved leave of absence shall be denied re-admission.</p></p>
                    <!-- Content for letter 'c' -->
                    <p class="body-font">&nbsp;&nbsp;c. A student is entitled to a leave of absence for a period not to exceed a total of one year.</p></p>
                    <!-- Content for letter 'd' -->
                    <p class="body-font">&nbsp;&nbsp;d. Duly approved Leave of Absence (LOA) shall not be counted as part of the residency of a student.</p></p>
                    <!-- Content for letter 'e' -->
                    <p class="body-font">&nbsp;&nbsp;e. Students who have taken a Leave of Absence (LOA) not exceeding two (2) semesters as endorsed by the Dean and duly approved by the Executive Vice President (EVP) may qualify for academic honors.</p></p>
                    
                    <p style="font-family: Inter, sans-serif; font-size: 26px; color:black;">Reminders and Regulations</p> 
                    <!-- Content for letter 'f' -->
                    <p class="body-font">&nbsp;&nbsp;a. Students of respective degree programs must strictly observe the prescribed curriculum. </p>
                    <!-- Content for letter 'b' -->
                    <p class="body-font">&nbsp;&nbsp;b. Each Department shall issue a Curriculum checklist/ Course Prospectus to the student, which shall be used until he/she graduates. </p>
                    <!-- Content for letter 'c' -->
                    <p class="body-font">&nbsp;&nbsp;c. Students must enroll their subjects as scheduled on a particular semester/term with consideration of the required pre-requisites prior to enrolling. </p>
                    <!-- Content for letter 'd' -->
                    <p class="body-font">&nbsp;&nbsp;d. To avoid re-enrolling a completed subject, the respective Deans must ensure that the student has properly accomplished the “Curriculum checklist/ Course Prospectus”. </p>
                    <!-- Content for letter 'e' -->
                    <p class="body-font">&nbsp;&nbsp;e. As an irregular student, it is required of you to submit your Study Plan containing a personalized curriculum of courses to be taken based of the Curriculum checklist/ Course Prospectus provided to you by your department. </p>
                    <!-- Content for letter 'f' -->
                    <p class="body-font">&nbsp;&nbsp;f. Enlistment procedures of irregular students will be similar to enlistment of Physical Education (PE) courses. But this time, all courses will be enlisted by the student as per their approved Study Plan.</p>
                    <!-- Content for letter 'g' -->
                    <p class="body-font">&nbsp;&nbsp;g. Students shall make sure that overloading and underloading does not happen in their study plan unless approved by dedicated chairperson or advising body.</p>
                    <!-- Content for letter 'h' -->
                    <p class="body-font">&nbsp;&nbsp;h. Subjects that have Pre-requisites cannot be taken unless their required subjects are accomplished.</p>
                    <!-- Content for letter 'i' -->
                    <p class="body-font">&nbsp;&nbsp;i. Co-requisites are subjects that should be taken at the same time except in cases that they are to be taken separately as retakes.</p>
                        <div class="flex justify-end mt-4">
                            <button type="button"
                                class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                @click="openPanel = 2; currentStep = 2">Proceed to Details of Change</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="card custom-table-container mb-3">
            <div class="card-body">
                <div class="p-4 bg-blue-100 border border-blue-400 rounded-md">
                <button type="button" 
                        class="accordion text-3xl font-normal text-black-700"
                        :class="{
                            'opacity-50 cursor-not-allowed  text-gray-600': currentStep < 2 || addDroprequestStatus === 'Approved'
                        }"
                        :disabled="currentStep < 2 || addDroprequestStatus === 'Approved'"
                        @click="if (addDroprequestStatus !== 'Approved') { openPanel = 2 }">
                        2. Details of Change/Cancellation of Registration
                        <i class="fas fa-check-circle step-checkmark" :class="{ 'text-green-500': currentStep > 2 || hasRecord2 }" style="font-size: 27px;"></i>
                    </button>
                    <div x-show="openPanel === 2" class="panel" x-transition>
                        <br>
                        <p style="font-family: Inter, sans-serif; font-size: 24px; color:black;">
                            Kindly click the button to input the reason and subjects to be added/dropped for your request.
                        </p>
                        <div class="flex justify-between mt-4">
                            <button type="button"
                                class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                @click="openPanel = 1; currentStep = 1">Back to Requirements and Reminders</button>
                            <button type="button"
                                class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                @click="showAddDropModal = true">Reason & Subjects to be added/dropped</button>
                            <button type="button"
                                class="btn p-2 border rounded-md text-white"
                                :class="{
                                    'bg-[#2d349a] border-blue-100 cursor-pointer': isAddDropCompleted,
                                    'bg-gray-400 border-gray-400 cursor-not-allowed': !isAddDropCompleted
                                }"
                                :disabled="!isAddDropCompleted"
                                @click="if(isAddDropCompleted) { openPanel = 3; currentStep = 3; }">
                                Proceed to Creation of Study Plan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Add/Drop Details -->
        <div x-show="showAddDropModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10" x-cloak>
            <div class="bg-white p-6 rounded-md w-full max-w-7xl max-h-[90vh] overflow-y-auto">
                <div class="modal-header flex justify-between items-center border-b pb-2">
                    <h2 class="text-xl font-semibold">Reason & Subjects to be added/dropped</h2>
                    <button @click="showAddDropModal = false" class="text-gray-600 hover:text-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body mt-4">
                    <livewire:add-drop-details /> <!-- Added add/drop details Livewire component -->
                </div>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="card custom-table-container mb-3 relative z-1"
        x-data="{ showModal: false, showConfirmSaveModal: false, showToast: false }">
            <div class="card-body">
                <div class="p-4 bg-blue-100 border border-blue-400 rounded-md">
                <button type="button" 
                        class="accordion text-3xl font-normal text-black-700"
                        :class="{
                            'opacity-50 cursor-not-allowed  text-gray-600': currentStep < 3 || addDroprequestStatus === 'Approved'
                        }"
                        :disabled="currentStep < 3 || addDroprequestStatus === 'Approved'"
                        @click="if (addDroprequestStatus !== 'Approved') { openPanel = 3 }">
                        3. Create your Study Plan
                        <i class="fas fa-check-circle step-checkmark" :class="{ 'text-green-500': currentStep > 3 || hasRecord2 }" style="font-size: 27px;"></i>
                    </button>

                    <div x-show="openPanel === 3" class="panel" x-transition>
                        <p style="font-family: Inter, sans-serif; font-size: 26px; color: black;">Guidelines for Study Plans</p>
                        <p class="body-font">&nbsp;&nbsp;a. Arrange your study plan considering the availability of courses. Major-specific subjects are exclusively offered in particular semesters.</p>
                        <p class="body-font">&nbsp;&nbsp;b. Mandatory major subjects should be taken during the designated semester they are available.</p>
                        <p class="body-font">&nbsp;&nbsp;c. A subject cannot be taken if it is a prerequisite for a previously failed subject. Ensure successful completion of prerequisites before enrolling in advanced courses.</p>
                        <p class="body-font">&nbsp;&nbsp;d. Failed prerequisites must be retaken and successfully completed before proceeding to higher-level courses.</p>
                        <p class="body-font">&nbsp;&nbsp;e. The upcoming semester should be the first one accounted for in your study plan. Plan your courses according to the sequence recommended by the academic curriculum.</p>
                        <p class="body-font">&nbsp;&nbsp;f. Overloaded unit enrollments are permissible only for students approaching graduation, subject to approval.</p>
                        <p class="body-font">&nbsp;&nbsp;g. Underloaded units should also be verified by the college chairperson to ensure compliance with program requirements.</p>
                        <div class="flex justify-between mt-4">
                            <button type="button"
                                class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                @click="openPanel = 2; currentStep = 2">Back to Download Curriculum Checklist</button>
                            <button type="button"
                                class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white"
                                @click="showModal = true">Create Study Plan</button>
                            <button type="button"
                                class="btn p-2 border rounded-md text-white"
                                :class="{
                                    'bg-[#2d349a] border-blue-100 cursor-pointer': isStudyPlanCompleted,
                                    'bg-gray-400 border-gray-400 cursor-not-allowed': !isStudyPlanCompleted
                                }"
                                :disabled="!isStudyPlanCompleted"
                                @click="if(isStudyPlanCompleted) { openPanel = 4; currentStep = 4; $wire.pushCourseCodesFinal(); }">
                                Proceed to Downloading of Documents
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Study Plan -->
            <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10" x-cloak>
                <div class="bg-white p-6 rounded-md w-full max-w-7xl max-h-[90vh] overflow-y-auto">
                    <div class="modal-header flex justify-between items-center border-b pb-2">
                        <h2 class="text-xl font-semibold">Create Study Plan</h2>
                        <button @click="showModal = false" class="text-gray-600 hover:text-gray-900">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body mt-4">
                        <livewire:study-plan /> <!-- Added study plan livewire component -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 4 -->
        <div class="card custom-table-container mb-3">
            <div class="card-body">
                <div class="p-4 bg-blue-100 border border-blue-400 rounded-md">
                <button type="button" 
                        class="accordion text-3xl font-normal text-black-700"
                        :class="{
                            'opacity-50 cursor-not-allowed  text-gray-600': currentStep < 4 || addDroprequestStatus === 'Approved'
                        }"
                        :disabled="currentStep < 4 || addDroprequestStatus === 'Approved'"
                        @click="if (addDroprequestStatus !== 'Approved') { openPanel = 4 }">
                        4. Await for Approval
                        <i class="fas fa-check-circle step-checkmark" :class="{ 'text-green-500': currentStep === 4 || hasRecord2 }" style="font-size: 27px;"></i>
                    </button>
                    <div x-show="openPanel === 4" class="panel" x-transition>
                            <br>
                            <p style="font-family: Inter, sans-serif; font-size: 26px; color:black; font-weight:bold;">Status: 
                        @if($addDroprequestStatus == "Pending")
                        <strong style="color: #AB830F;">Pending</strong>
                        @elseif($addDroprequestStatus == "Rejected")
                        <strong style="color: #e90c0c;">For Revision</strong>
                        @elseif($addDroprequestStatus == "Submit Onsite")
                        <strong style="color: #AB830F;">For Submission Onsite</strong>
                        @elseif($addDroprequestStatus == "Approved")
                        <strong style="color: #14ae5c;">Approved</strong>
                        @else
                        <strong style="color: #AB830F;">Pending</strong>
                        @endif
                            </p>
                            <p class="body-font">&nbsp;&nbsp;a. Submitted documents will be checked by corresponding department chairperson.</p>
                            <p class="body-font">&nbsp;&nbsp;b. Refresh this page from time-to-time to know the status of your request.</p>
                        <div class="flex justify-between mt-4">
                            <button type="button" class="btn p-2 border border-blue-100 rounded-md bg-[#2d349a] text-white" @click="openPanel = 3; currentStep = 3">Back to Create your Study Plan</button>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
    </section>
    @endif
</div>
</div>
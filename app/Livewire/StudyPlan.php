<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Validation;
use App\Models\Classes;
use App\Models\Grade;
use App\Models\StudyPlanValidations;
use App\Models\Student;
use App\Models\StudentTerm;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Livewire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aysem;

class StudyPlan extends Component
{
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
    public $studentid;
    public $year_level;
    public $student_no;
    public $grade;
    public $pre_requisite;
    public $parent_class_code;

    protected $listeners = ['pushCourseCodesFinal'];
    
    public function mount()
    {
        $this->user = Auth::user();
        $this->studentid = $this->user->student_no;
        $this->yearlevel = $this->user->year_level;
        $this->studentStatus = $this->user->student_status; // Added student status
        $this->getStudentClass();
    
        $this->courses = Course::all();
        $this->tableBodyId = ''; 
        $preRequisiteGrade = $this->getPrerequisiteGrade($this->pre_requisite);
        $this->updateTotalUnits32();
        $this->updateTotalUnits42();
        $this->updateTotalUnits72();
        $this->updateTotalUnits62();
        $this->updateTotalUnits22();
        $this->updateTotalUnits21();
    
        foreach ($this->courses as $course) {
            // Fetch the corresponding class record using parent_class_code
            $class = \App\Models\Classes::where('parent_class_code', $course->subject_code)->first();
        
            // Initialize year level to minimum_year_level from the class record
            $yearLevel = $class ? $class->minimum_year_level : null;
        
            // Fetch the corresponding aysem record using aysem_id from the class record
            $aysem = $class ? \App\Models\Aysem::find($class->aysem_id) : null;
        
            // Initialize semester to null
            $semester = null;
        
            // Set semester if aysem record is found
            if ($aysem) {
                $semester = $aysem->semester;
            }
        
            // Get the prerequisite grade for the current course
            $preRequisiteGrade = $this->getPrerequisiteGrade($course->pre_requisite);
        
            // Get the grade for the current course
            $grade = $this->getCourseGrade($course->subject_code);
        
            if (($grade == 5 && $yearLevel == 2 && $semester == 2) || ($preRequisiteGrade == 5 && $yearLevel == 2 && $semester == 2)) {
                // Map the target table based on conditions
                $targetTable = ($grade == 5) ? 'tableBody42' : 'tableBody62';
                $this->moveRowToDropdown($course->id, $targetTable);
            
            
            } elseif ($preRequisiteGrade == 5 && $yearLevel == 3 && $semester == 1 || ($preRequisiteGrade == 5 && $yearLevel == 3 && $semester == 1)) {
                $targetTable = 'tableBody72';
                $this->moveRowToDropdown($course->id, $targetTable);
            }
            // } elseif (($grade == 5 && $yearLevel == 3 && $semester == 2) || ($preRequisiteGrade == 5 && $yearLevel == 3 && $semester == 2) || ($grade == 5 && $yearLevel == 2 && $semester == 2) ) {
            //     $targetTable = 'tableBody62';
            //     $this->moveRowToDropdown($course->id, $targetTable);
            // }
        }
        
    }

    public function getStudentClass(): void
    {
        $currStudentTerm = StudentTerm::where('student_no', $this->user->student_no)->latest()->first();
        $this->record = Classes::where('minimum_year_level', $currStudentTerm->year_level)->with('courses');
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
        } elseif ($tableBody === 'tableBody21') {
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


    public function moveRowFromDropdownToTable($courseCode, $tableBodyId){
        $courseIndex = null;
        $dropdownContentRef = null;
    
        switch ($tableBodyId) {
            case 'tableBody21':
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
                if ($course->subject_code === $courseCode) { // Use -> instead of []
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
                $totalUnitsProperty = 'totalUnits21';
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
            // $grade = Grade::where('subject_code', $course->subject_code)
            // ->where('student_no', $this->studentid)
            // ->value('grades');

            
            // // Retrieve the prerequisite grade from the BSCS_grade model if prerequisites exist
            // $prerequisiteGrade = $course->pre_requisite 
            // ? Grade::where('subject_code', $course->pre_requisite)
            //              ->where('student_no', $this->studentid)
            //              ->value('grade')
            // : null;
    
            // Include courses based on year level when grades are not 5
            if ($this->yearlevel === 2 && $course->year_lvl >= 2) {
                $courseCodes[] = $course->subject_code;
            } elseif ($this->yearlevel === 3 && $course->year_lvl >= 3) {
                $courseCodes[] = $course->subject_code;
            } elseif ($this->yearlevel === 4 && $course->year_lvl >= 4) {
                $courseCodes[] = $course->subject_code;
            } elseif ($course->year_lvl === $this->yearlevel) {
                $courseCodes[] = $course->subject_code;
            }
        }
        return $courseCodes;
    }

    public function getPrerequisiteGrade($preRequisiteCourseCode)
    {
        // Assuming there are models named BSCS_grade and Class to represent the respective tables
        $preRequisite = Grade::join('classes', 'grades.class_id', '=', 'classes.id')
                                  ->where('classes.parent_class_code', $preRequisiteCourseCode)
                                  ->where('grades.student_no', $this->studentid)
                                  ->select('grades.grade')
                                  ->first();
    
        // If the prerequisite course exists and has a grade, return the grade
        if ($preRequisite && isset($preRequisite->grade)) {
            return $preRequisite->grade;
        }
    
        // Return null if the prerequisite grade does not exist or does not have a grade
        return null;
    }

    public function getCourseGrade($courseCode)
    {
        // Assuming there are models named Grade and Class to represent the respective tables
        $courseGrade = Grade::join('classes', 'grades.class_id', '=', 'classes.id')
                            ->where('classes.parent_class_code', $courseCode)
                            ->where('grades.student_no', $this->studentid)
                            ->select('grades.grade')
                            ->first();
    
        // If the course grade exists and has a grade, return the grade
        if ($courseGrade && isset($courseGrade->grade)) {
            return $courseGrade->grade;
        }
    
        // Return null if the course grade does not exist or does not have a grade
        return null;
    }
    

    public function pushCourseCodes(){
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
        
        $validation->study_plan_subject_code = $studyPlanCourseCodes;
    
        $validation->save();
    
        session()->flash('courseCodesNotification', 'Course codes pushed successfully.');
    }

    public function pushCourseCodesFinal(){
        $this->mount();

        // Get the validation record for the current student
        $validation = Validation::where('student_no', $this->studentid)->first();
    
        if ($validation) {
            // Create or update the corresponding record in the study_plan_validations table
            $study_plan_validation = StudyPlanValidations::firstOrNew(['student_no' => $this->studentid]);
    
            // Assign the attributes from the validation object to the study_plan_validation object

            $study_plan_validation->student_no = $validation->student_no; 
            $study_plan_validation->year_level = $validation->yearlvl; 
            $study_plan_validation->status = $validation->status;
            $study_plan_validation->date_of_request = $validation->daterequest;
            $study_plan_validation->study_plan = $validation->study_plan_subject_code;
    
            // Save the study_plan_validation object
            $study_plan_validation->save();

            $validation->delete();
        }

        return redirect()->back();
    }

    public function render(){  
        $courses = Course::all();
        $validations = Validation::all();
        $grades = Grade::all();
        $study_plan_validations = StudyPlanValidations::all();
        $student = Student::all();

        $displayedCourseCodes = $this->getDisplayedCourseCodes();

        // Initialize variables to track whether each year level is present in the validations
        $hasYear2 = false;
        $hasYear3 = false;
        $hasYear4 = false;

        foreach ($student as $student) {
            if ($student->studentid === $this->student_no) {
                if ($this->yearlevel === 2 && !$hasYear2) {
                    $hasYear2 = true;
                    $hasYear3 = true;
                    $hasYear4 = true;
                } elseif ($this->yearlevel === 3 && !$hasYear3) {
                    $hasYear3 = true;
                    $hasYear4 = true;
                } elseif ($this->yearlevel === 4 && !$hasYear4) {
                    $hasYear4 = true;
                }
            }
        }

        return view('livewire.study-plan', [
            'courses' => $courses,
            'student' => $student,
            'validations' => $validations,
            'grades' => $grades,
            'hasYear2' => $hasYear2,
            'hasYear3' => $hasYear3,
            'hasYear4' => $hasYear4,
            'dropdownContent2_2' => $this->dropdownContent2_2,
            'dropdownContent2_1' => $this->dropdownContent2_1,
            'dropdownContent3_2' => $this->dropdownContent3_2,
            'dropdownContent3_1' => $this->dropdownContent3_1,
            'dropdownContent4_1' => $this->dropdownContent4_1,
            'dropdownContent4_2' => $this->dropdownContent4_2,
            'tableBodyId' => $this->tableBodyId,
            'totalUnits21' => $this->totalUnits21, 
            'totalUnits32' => $this->totalUnits32, 
            'totalUnits42' => $this->totalUnits42, 
            'totalUnits72' => $this->totalUnits72, 
            'totalUnits62' => $this->totalUnits62, 
            'totalUnits22' => $this->totalUnits22, 
            'displayedCourseCodes' => $displayedCourseCodes,
        ]);
    }

    private function checkGrades($course, $gradeThreshold){
        // Assuming $course has properties 'subject_code' and 'course_title'
        return isset($course->grades) && $course->grades === $gradeThreshold 
            ? $course->subject_code . ' - ' . $course->course_title 
            : '';
    }

    private function updateTotalUnits21()
    {
        // Initialize total units to zero
        $this->totalUnits21 = 0;

        // Loop through each course
        foreach ($this->courses as $course) {
            // Fetch the corresponding class record using parent_class_code
            $class = Classes::where('parent_class_code', $course['subject_code'])->first();

            // Initialize minimum_year_level and semester to default values
            $minimum_year_level = null;
            $semester = null;

            if ($class) {
                $minimum_year_level = $class->minimum_year_level;

                // Fetch the corresponding aysem record using aysem_id
                $aysem = Aysem::find($class->aysem_id);
                if ($aysem) {
                    $semester = $aysem->semester;
                }
            }

            // Sum the units if the course matches the criteria
            if ($minimum_year_level === 2 && $semester === 1) {
                $this->totalUnits21 += $course['units'];
            }
        }
    }
    
    private function updateTotalUnits22()
    {
        // Initialize total units to zero
        $this->totalUnits22 = 0;

        // Loop through each course
        foreach ($this->courses as $course) {
            // Fetch the corresponding class record using parent_class_code
            $class = Classes::where('parent_class_code', $course['subject_code'])->first();

            // Initialize minimum_year_level and semester to default values
            $minimum_year_level = null;
            $semester = null;

            if ($class) {
                $minimum_year_level = $class->minimum_year_level;

                // Fetch the corresponding aysem record using aysem_id
                $aysem = Aysem::find($class->aysem_id);
                if ($aysem) {
                    $semester = $aysem->semester;
                }
            }

            // Sum the units if the course matches the criteria
            if ($minimum_year_level === 2 && $semester === 2) {
                $this->totalUnits22 += $course['units'];
            }
        }
    }

    private function updateTotalUnits32()
    {
        // Initialize total units to zero
        $this->totalUnits32 = 0;

        // Loop through each course
        foreach ($this->courses as $course) {
            // Fetch the corresponding class record using parent_class_code
            $class = Classes::where('parent_class_code', $course['subject_code'])->first();

            // Initialize minimum_year_level and semester to default values
            $minimum_year_level = null;
            $semester = null;

            if ($class) {
                $minimum_year_level = $class->minimum_year_level;

                // Fetch the corresponding aysem record using aysem_id
                $aysem = Aysem::find($class->aysem_id);
                if ($aysem) {
                    $semester = $aysem->semester;
                }
            }

            // Sum the units if the course matches the criteria
            if ($minimum_year_level === 3 && $semester === 1) {
                $this->totalUnits32 += $course['units'];
            }
        }
    }

    private function updateTotalUnits42()
    {
        // Initialize total units to zero
        $this->totalUnits42 = 0;

        // Loop through each course
        foreach ($this->courses as $course) {
            // Fetch the corresponding class record using parent_class_code
            $class = Classes::where('parent_class_code', $course['subject_code'])->first();

            // Initialize minimum_year_level and semester to default values
            $minimum_year_level = null;
            $semester = null;

            if ($class) {
                $minimum_year_level = $class->minimum_year_level;

                // Fetch the corresponding aysem record using aysem_id
                $aysem = Aysem::find($class->aysem_id);
                if ($aysem) {
                    $semester = $aysem->semester;
                }
            }

            // Sum the units if the course matches the criteria
            if ($minimum_year_level === 3 && $semester === 2) {
                $this->totalUnits22 += $course['units'];
            }
        }
    }

    private function updateTotalUnits72()
    {
        // Initialize total units to zero
        $this->totalUnits72 = 0;

        // Loop through each course
        foreach ($this->courses as $course) {
            // Fetch the corresponding class record using parent_class_code
            $class = Classes::where('parent_class_code', $course['subject_code'])->first();

            // Initialize minimum_year_level and semester to default values
            $minimum_year_level = null;
            $semester = null;

            if ($class) {
                $minimum_year_level = $class->minimum_year_level;

                // Fetch the corresponding aysem record using aysem_id
                $aysem = Aysem::find($class->aysem_id);
                if ($aysem) {
                    $semester = $aysem->semester;
                }
            }

            // Sum the units if the course matches the criteria
            if ($minimum_year_level === 4 && $semester === 1) {
                $this->totalUnits72 += $course['units'];
            }
        }
    }

    private function updateTotalUnits62()
    {
        // Initialize total units to zero
        $this->totalUnits62 = 0;

        // Loop through each course
        foreach ($this->courses as $course) {
            // Fetch the corresponding class record using parent_class_code
            $class = Classes::where('parent_class_code', $course['subject_code'])->first();

            // Initialize minimum_year_level and semester to default values
            $minimum_year_level = null;
            $semester = null;

            if ($class) {
                $minimum_year_level = $class->minimum_year_level;

                // Fetch the corresponding aysem record using aysem_id
                $aysem = Aysem::find($class->aysem_id);
                if ($aysem) {
                    $semester = $aysem->semester;
                }
            }

            // Sum the units if the course matches the criteria
            if ($minimum_year_level === 4 && $semester === 2) {
                $this->totalUnits62 += $course['units'];
            }
        }
    }
}
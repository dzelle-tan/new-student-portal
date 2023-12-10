<?php

use App\Models\Student;
use App\Models\StudentRecord;
use Livewire\Volt\Component;

new class extends Component {

    public StudentRecord $record;
    public Student $user;

    public function mount()
    {
        $this->user = Auth::user();

        $this->record = StudentRecord::where('student_id', $this->user->id)
            ->with('fee', 'classes')
            ->latest()
            ->first();
    }
}; ?>

<div>
    <div class="flex items-center justify-between">
        <img src="{{ asset('images/plm-logo-with-header.png') }}" alt="PLM logo" class="h-14">

        <p class="px-4 py-1 text-lg border border-gray-400 rounded-md">Student's Copy</p>
    </div>
    <div class="text-center">
        <h3 class="text-xl">Student Enrollment Record</h3>
        <p class="text-sm">Academic Year 2023-2024 Term 1</p>
    </div>
    <div class="space-y-[-1px] mt-6 text-sm">
        <div class="flex space-x-[-1px]">
            <div class="w-[10rem] border py-1 px-2">
                <p class="text-xs">Student No:</p>
                <p>{{$user->student_no}}</p>
            </div>
            <div class="w-[30rem] border py-1 px-2">
                <p class="text-xs">Student Name:</p>
                <p class="uppercase">{{$user->last_name}}, {{$user->first_name}} {{$user->middle_name}} </p>
            </div>
            <div class="w-[8rem] border py-1 px-2">
                <p class="text-xs">Student Type:</p>
                <p>Old</p>
            </div>
            <div class="w-[8rem] border py-1 px-2">
                <p class="text-xs">Year Level:</p>
                <p>3</p>
            </div>
            <div class="flex-grow px-2 py-1 border">
                <p class="text-xs">Control No:</p>
                <p>111934526789</p>
            </div>
        </div>
        <div class="flex space-x-[-1px]">
            <div class="w-[10rem] border py-1 px-2">
                <p class="text-xs">College:</p>
                <p>CET</p>
            </div>
            <div class="w-[30rem] border py-1 px-2">
                <p class="text-xs">Course:</p>
                <p>BSCS</p>
            </div>
            <div class="w-[12rem] border py-1 px-2">
                <p class="text-xs">Type:</p>
                <p>B</p>
            </div>
            <div class="flex-grow px-2 py-1 border">
                <p class="text-xs">Registration Status:</p>
                <p>Regular</p>
            </div>
        </div>
    </div>
    <div class="flex mt-4 space-x-2">
        <div>
            <table class="text-left border-t border-l border-r w-[55rem]">
                <thead>
                    <tr class="tracking-wider uppercase border-b border-gray-200 text-xxs text-table-header bg-gray-50">
                        <th class="px-4 py-2 font-medium">{{_("Class Code")}}</th>
                        <th class="px-4 py-2 font-medium">{{_("Blk")}}</th>
                        <th class="px-4 py-2 font-medium">{{_("Subject Title")}}</th>
                        <th class="px-4 py-2 font-medium">{{_("Units")}}</th>
                        <th class="px-4 py-2 font-medium">{{_("Days")}}</th>
                        <th class="px-4 py-2 font-medium">{{_("Time")}}</th>
                        <th class="px-4 py-2 font-medium">{{_("Type")}}</th>
                        <th class="px-4 py-2 font-medium">{{_("Room")}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($record->classes as $class)
                        <tr class="text-xs border-b border-gray-200">
                            <td class="px-4 py-3">{{ $class->code }}</td>
                            <td class="px-4 py-3">{{ $class->section }}</td>
                            <td class="px-4 py-3 pr-8">{{ $class->name }}</td>
                            <td class="px-4 py-3 ">{{ $class->units }}</td>
                            <td class="px-4 py-3">{{ substr($class->day, 0, 3) }}</td>
                            <td class="px-4 py-3">{{ date('g:i A', strtotime($class->start_time)) }} {{_("-")}} {{ date('g:i A', strtotime($class->end_time)) }}</td>
                            <td class="px-4 py-3">
                                @if ($class->type == 'face-to-face')
                                    F2F
                                @elseif ($class->type == 'online')
                                    OL
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $class->room }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-between pt-2 text-sm">
                <p>Remarks: This enrollment becomes official until all requirements are complied with.</p>
                <p class="pr-8">Total Units: 20</p>
            </div>
        </div>
        <div class="flex flex-col justify-between flex-grow border text-xxs">
            <div>
                <div class="flex justify-between px-4 py-2 font-medium tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                    <span>Tuition Fees</span><span>18,000.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Tuition Fee</span><span>18,000.00</span>
                </div>
                <div class="flex justify-between px-4 py-2 mt-2 font-medium tracking-wider uppercase border-t border-b border-gray-200 text-table-header bg-gray-50">
                    <span>Miscellaneous Fees</span><span>1,510.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Library Fee</span><span>732.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Athletic Fee w/o PE</span><span>117.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Registration Fee</span><span>74.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Medical/Dental Fee</span><span>293.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Student Welfare</span><span>74.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Cultural Activity</span><span>74.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Guidance Fee</span><span>146.00</span>
                </div>
                <div class="flex justify-between px-4 py-2 mt-2 font-medium tracking-wider uppercase border-t border-b border-gray-200 text-table-header bg-gray-50">
                    <span>Laboratory Fees</span><span>2,400.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Category 3 Laborator</span><span>2,400.00</span>
                </div>
                <div class="flex justify-between px-4 py-2 mt-2 font-medium tracking-wider uppercase border-t border-b border-gray-200 text-table-header bg-gray-50">
                    <span>Other Fees</span><span>246.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Development Fund</span><span>146.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Ang Pamantasan Fee</span><span>50.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Supreme Student Council</span><span>50.00</span>
                </div>
            </div>
            <div class="pt-2 pb-2 mt-2 border-t">
                <div class="flex justify-between px-4">
                    <span>Total Assessment Fee:</span><span>22,156.00</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Previous Payment/s:</span><span>0.00</span>
                </div>
                <div class="flex justify-between px-4 font-bold">
                    <span>Total Amount Due:</span><span>22,156.00</span>
                </div>
            </div>
        </div>
    </div>
    <div class="flex space-x-[-1px] mt-8">
        <div class="w-1/5 border py-0.5 px-2">
            <p class="text-xs">Encoder:</p>
            <p></p>
        </div>
        <div class="w-1/5 border py-0.5 px-2">
            <p class="text-xs">Date:</p>
            <p>{{ now()->format('Y-m-d') }}</p>
        </div>
        <div class="w-1/5 border py-0.5 px-2">
            <p class="text-xs">Reference:</p>
            <p>RA 10931</p>
        </div>
        <div class="w-1/5 border py-0.5 px-2">
            <p class="text-xs">Date and Signature:</p>
            <p></p>
        </div>
        <div class="flex-grow px-2 py-0.5 border">
            <p class="text-xs">Amount Due:</p>
            <p>22,156.00</p>
        </div>
    </div>
        
    
    {{-- <div>
        <div class="row">
            <div class="column">{{_("PAMANTASAN NG LUNGSOD NG MAYNILA")}}</div>
            <div class="column">{{_("STUDENT ENROLLMENT RECORD")}}</div>
            <div class="column">{{_("STUDENT'S COPY")}}</div>
        </div>
        <div class="row">
            <div class="column">{{_("University of the City of Manila")}}<br>
                {{_("Intramuros, Manila")}}
            </div>
            <div class="column">{{$record->semester == '1' ? '1st Semester' : '2nd Semester'}}<br>
                {{_("School Year")}} {{$record->school_year}}
            </div>
        </div>
        <div class="row">
            <div class="column" style="width: 20%">{{_("Student No")}} <br> {{$user->student_no}}</div>
            <div class="column" style="width: 20%">{{_("Student Name")}} <br> {{$user->last_name}}{{(",")}} {{$user->first_name}} {{$user->middle_name}}</div>
            <div class="column" style="width: 20%">{{_("Student Type")}} <br> {{$user->student_type}}</div>
            <div class="column" style="width: 20%">{{_("Year Level")}} <br> {{$user->year_level}}</div>
            <div class="column" style="width: 20%">{{_("Control No.")}} <br> {{$record->control_no}}</div>
        </div>
        <div class="row">
            <div class="column" style="width: 20%">{{_("College")}} <br> {{$user->college}}</div>
            <div class="column" style="width: 20%">{{_("Course")}} <br> {{$user->program_code}}</div>
            <div class="column" style="width: 20%">{{_("Type")}} <br> {{_("To be filled haha")}} </div>
            <div class="column" style="width: 20%">{{_("Registration Status")}} <br> {{$user->registration_status}}</div>
        </div>

        <div class="row">
            <div class="column" style="width:80%;">
                <table>
                    <thead>
                        <tr>
                            <th>{{_("Class Code")}}</th>
                            <th>{{_("Section")}}</th>
                            <th>{{_("Subject Title")}}</th>
                            <th>{{_("Units")}}</th>
                            <th>{{_("Schedule")}}</th>
                            <th>{{_("Room")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($record->classes as $class)
                            <tr class="text-sm border-b border-gray-200">
                                <td class="px-4 py-3">{{ $class->code }}</td>
                                <td class="px-4 py-3">{{ $class->section }}</td>
                                <td class="px-4 py-3 min-w-[200px] max-w-[300px] whitespace-normal">{{ $class->name }}</td>
                                <td class="px-4 py-3 ">{{ $class->units }} </td>
                                <td class="px-4 py-3">{{ $class->day }} {{ $class->start_time }} {{_("-")}} {{ $class->end_time }}</td>
                                <td class="px-4 py-3"> {{ $class->building }} {{ $class->room }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="column" style="width:20%;">
                <table>
                    <thead>
                        <tr>
                            <th>{{_("TUITION FEE")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ __("Tuition Fee (:units units) ", ['units' => $record->fee->tuition_units]) }}</td>
                            <td>{{ $record->fee->tuition_fee }} </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th>{{_("MISCELLANEOUS FEE")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ __("Athletic Fee") }} </td>
                            <td> {{ $record->fee->athletic_fee }} </td>
                        </tr>
                        <tr>
                            <td> {{ __("Cultural Activity") }} </td>
                            <td> {{ $record->fee->cultural_activity }} </td>
                        </tr>
                        <tr>
                            <td> {{ __("Guidance Fee") }} </td>
                            <td> {{ $record->fee->guidance_fee }} </td>
                        </tr>
                        <tr>
                            <td> {{ __("Library Fee") }} </td>
                            <td> {{ $record->fee->library_fee }} </td>
                        </tr>
                        <tr>
                            <td> {{ __("Medical/Dental Fee") }} </td>
                            <td> {{ $record->fee->medical_dental_fee }} </td>
                        </tr>
                        <tr>
                            <td> {{ __("Student Welfare Fee") }} </td>
                            <td> {{ $record->fee->admission_fee }} </td>
                        </tr>
                        <tr>
                            <td> {{ __("Registration Fee") }} </td>
                            <td> {{ $record->fee->registration_fee }} </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th>{{_("LABORATORY FEE")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ __("Category (:units Laboratory) ", ['units' => $record->fee->laboratory_category]) }}</td>
                            <td>{{ $record->fee->laboratory_fee }} </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th>{{_("OTHER FEE")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ __("Development Fund") }} </td>
                            <td> {{ $record->fee->registration_fee }} </td>
                        </tr>
                        <tr>
                            <td> {{ __("Ang Pamantasan Fee") }} </td>
                            <td> {{ $record->fee->ang_pamantasan_fee }} </td>
                        </tr>
                        <tr>
                            <td> {{ __("Supreme Student Council") }} </td>
                            <td> {{ $record->fee->ssc_fee }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="column" style="width: 33.33%">{{_("Remarks This enrollment becomes official until all requirements are complied with.")}}</div>
            <div class="column" style="width: 33.33%">{{_("Total Units")}} <br> {{_("To be filled")}}</div>
        </div>
        <div class="row">
            <div class="column" style="width: 15%">{{_("Encoder")}} <br> {{$user->student_no}}</div>
            <div class="column" style="width: 15%">{{_("Date")}} <br> {{ date('Y-M-d') }}</div>
            <div class="column" style="width: 15%">{{_("Reference")}} <br> {{_("RA 10931")}}</div>
            <div class="column" style="width: 15%">{{_("Date and Signature")}} <br> {{$user->year_level}}</div>
            <div class="column" style="width: 15%">{{_("Amount Due")}} <br> {{_("To be filled")}}</div>
        </div>
    </div> --}}
</div>

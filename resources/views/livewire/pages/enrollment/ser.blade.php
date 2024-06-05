<?php

use App\Models\Student;
use App\Models\StudentRecord;
use App\Models\StudentTerm;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {

    public StudentTerm $record;
    public StudentRecord $fee;
    public Student $user;

    public function mount()
    {
        $this->user = Auth::user();

        $this->record = StudentTerm::where('student_no', $this->user->student_no)
                    ->with([
                        'aysem',
                        'block.classes.course',
                        'block.classes.classSchedules.classMode',
                        'block.classes.classSchedules.room.building'
                    ])
                    ->orderBy('aysem_id', 'desc')
                    ->first();

        $this->fee = StudentRecord::where('student_no', $this->user->student_no)
                    ->orderBy('aysem_id', 'desc')
                    ->first();            
    }
};
?>

<div>
    <div class="flex items-center justify-between">
        <img src="{{ asset('images/plm-logo-with-header.png') }}" alt="PLM logo" class="h-14">

        <p class="px-4 py-1 text-lg border border-gray-400 rounded-md">Student's Copy</p>
    </div>
    <div class="text-center">
        <h3 class="text-xl">Student Enrollment Record</h3>
        <p class="text-sm">Academic Year {{ $record->aysem->academic_year_code }} Term {{ $record->aysem->semester }}</p>
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
                    @foreach ($record->block->classes as $class)
                        @foreach ($class->classSchedules as $schedule)
                            <tr class="text-xs border-b border-gray-200">
                                <td class="px-4 py-3">{{ $class->course->subject_code }}</td>
                                <td class="px-4 py-3">{{ $record->block->section }}</td>
                                <td class="px-4 py-3 pr-8">{{ $class->course->subject_title }}</td>
                                <td class="px-4 py-3">{{ $class->course->units }}</td>
                                <td class="px-4 py-3">{{ substr($schedule->day, 0, 3) }}</td>
                                <td class="px-4 py-3">{{ date('g:i A', strtotime($schedule->start_time)) }} - {{ date('g:i A', strtotime($schedule->end_time)) }}</td>
                                <td class="px-4 py-3">{{ ucfirst($schedule->classMode->mode_type) }}</td>
                                <td class="px-4 py-3">{{ $schedule->room->room_name }} - {{ $schedule->room->building->building_name }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-between pt-2 text-sm">
                <p>Remarks: This enrollment becomes official until all requirements are complied with.</p>
                <p class="pr-8">Total Units: {{ $record->block->classes->sum('course.units') }}</p>
            </div>
        </div>
        <div class="flex flex-col justify-between flex-grow border text-xxs">
            <div>
                <div class="flex justify-between px-4 py-2 font-medium tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                    <span>Tuition Fees</span><span>{{ number_format($fee->tuition_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Tuition Fee</span><span>{{ number_format($fee->tuition_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4 py-2 mt-2 font-medium tracking-wider uppercase border-t border-b border-gray-200 text-table-header bg-gray-50">
                    <span>Miscellaneous Fees</span><span>{{ number_format($fee->athletic_fee + $fee->cultural_activity + $fee->guidance_fee + $fee->library_fee + $fee->medical_dental_fee + $fee->registration_fee + $fee->student_welfare, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Library Fee</span><span>{{ number_format($fee->library_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Athletic Fee w/o PE</span><span>{{ number_format($fee->athletic_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Registration Fee</span><span>{{ number_format($fee->registration_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Medical/Dental Fee</span><span>{{ number_format($fee->medical_dental_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Student Welfare</span><span>{{ number_format($fee->student_welfare, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Cultural Activity</span><span>{{ number_format($fee->cultural_activity, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Guidance Fee</span><span>{{ number_format($fee->guidance_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4 py-2 mt-2 font-medium tracking-wider uppercase border-t border-b border-gray-200 text-table-header bg-gray-50">
                    <span>Laboratory Fees</span><span>{{ number_format($fee->laboratory_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Category 3 Laboratory</span><span>{{ number_format($fee->laboratory_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4 py-2 mt-2 font-medium tracking-wider uppercase border-t border-b border-gray-200 text-table-header bg-gray-50">
                    <span>Other Fees</span><span>{{ number_format($fee->development_fund + $fee->ang_pamantasan_fee + $fee->ssc_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Development Fund</span><span>{{ number_format($fee->development_fund, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Ang Pamantasan Fee</span><span>{{ number_format($fee->ang_pamantasan_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Supreme Student Council</span><span>{{ number_format($fee->ssc_fee, 2) }}</span>
                </div>
            </div>
            <div class="pt-2 pb-2 mt-2 border-t">
                <div class="flex justify-between px-4">
                    <span>Total Assessment Fee:</span><span>{{ number_format($fee->tuition_fee + $fee->athletic_fee + $fee->cultural_activity + $fee->guidance_fee + $fee->library_fee + $fee->medical_dental_fee + $fee->registration_fee + $fee->student_welfare + $fee->laboratory_fee + $fee->development_fund + $fee->ang_pamantasan_fee + $fee->ssc_fee, 2) }}</span>
                </div>
                <div class="flex justify-between px-4">
                    <span>Previous Payment/s:</span><span>0.00</span>
                </div>
                <div class="flex justify-between px-4 font-bold">
                    <span>Total Amount Due:</span><span>{{ number_format($fee->tuition_fee + $fee->athletic_fee + $fee->cultural_activity + $fee->guidance_fee + $fee->library_fee + $fee->medical_dental_fee + $fee->registration_fee + $fee->student_welfare + $fee->laboratory_fee + $fee->development_fund + $fee->ang_pamantasan_fee + $fee->ssc_fee, 2) }}</span>
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
            <p>{{ number_format($fee->tuition_fee + $fee->athletic_fee + $fee->cultural_activity + $fee->guidance_fee + $fee->library_fee + $fee->medical_dental_fee + $fee->registration_fee + $fee->student_welfare + $fee->laboratory_fee + $fee->development_fund + $fee->ang_pamantasan_fee + $fee->ssc_fee, 2) }}</p>
        </div>
    </div>
</div>

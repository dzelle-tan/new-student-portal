<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Enrollment Record</title>

    <style>
        body {
            font-size: 12px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .column {
            float: left;
            width: 33.33%;
            padding: 10px;
            height: 50px;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>
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
                    @foreach ($record->grade as $grade)
                        <tr class="text-sm border-b border-gray-200">
                            <td class="px-4 py-3">{{ $grade->classes->code }}</td>
                            <td class="px-4 py-3">{{ $grade->classes->section }}</td>
                            <td class="px-4 py-3 min-w-[200px] max-w-[300px] whitespace-normal">{{ $grade->classes->name }}</td>
                            <td class="px-4 py-3 ">{{ $grade->classes->units }} </td>
                            <td class="px-4 py-3">{{ $grade->classes->day }} {{ $grade->classes->start_time }} {{_("-")}} {{ $grade->classes->end_time }}</td>
                            <td class="px-4 py-3"> {{ $grade->classes->building }} {{ $grade->classes->room }}</td>
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
</body>
</html>

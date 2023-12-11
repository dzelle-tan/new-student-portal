<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            size: landscape;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
        .text-xl {
            font-size: 1.25rem/* 20px */;
            line-height: 1.75rem/* 28px */;
        }
        .mt-4 {
            margin-top: 1rem;
        }

        .lg\:items-center {
            align-items: center;
        }

        .lg\:w-5\/6 {
            width: 83.333333%;
        }

        .xl\:2\/3 {
            width: 66.666667%;
        }

        .lg\:flex {
            display: flex;
        }

        .lg\:justify-between {
            justify-content: space-between;
        }

        .w-24 {
            width: 6rem;
        }

        .w-full {
            width: 100%;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .overflow-x-auto {
            overflow-x: auto;
        }

        .text-left {
            text-align: left;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .text-xs {
            font-size: 0.75rem;
        }

        .tracking-wider {
            letter-spacing: 0.05em;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .border-b {
            border-bottom-width: 1px;
        }

        .border-gray-200 {
            border-color: #edf2f7;
        }

        .text-table-header {
            color: #1a202c;
        }

        .bg-gray-50 {
            background-color: #f7fafc;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .font-medium {
            font-weight: 500;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .min-w-\[200px\] {
            min-width: 200px;
        }

        .max-w-\[300px\] {
            max-width: 300px;
        }

        .whitespace-normal {
            white-space: normal;
        }
    </style>
</head>
<body>
    <h1 class="text-xl">Class Schedule</h1>
    
    {{-- Student Information --}}
    <div class="mt-4 lg:items-center lg:w-5/6 xl:2/3 lg:flex lg:justify-between">
        <div>
            <div>
                <span class="w-24">{{_("Student No:")}}</span>
                <span>{{ $user->student_no }}</span>
            </div>
            <div>
                <span class="w-24">{{_("Name:")}}</span>
                <span>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</span>
            </div>
        </div>
        <div>
            <div>
                <span class="w-24">{{_("Program:")}}</span>
                <span>{{ $user->degree_program }}</span>
            </div>
            <div>
                <span class="w-24">{{_("A.Y Term:")}} </span>
                <span>{{ $record->school_year }} - Term {{ $record->semester }} </span>
            </div>
        </div>
    </div>

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
                        <td class="px-4 py-3 ">{{ $class->units }} </td>
                        <td class="px-4 py-3">{{ $class->day }} {{ date('g:i A', strtotime($class->start_time)) }} {{_("-")}} {{ date('g:i A', strtotime($class->end_time)) }}</td>
                        <td class="px-4 py-3">{{ ucfirst($class->type) }}</td>
                        <td class="px-4 py-3">{{ $class->room }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <h1>Class Schedule</h1>
    <table>
        <thead>
            <th>Student No</th>
            <th>Name</th>
            <th>Civil Status</th>
            <th>Registration</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->student_no }}</td>
                <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                <td>{{ $user->civil_status }}</td>
                <td>{{ $user->registration }}</td>
            </tr>
        </tbody>
    </table>
    <div class="w-full mt-4 overflow-x-auto">
        <table class="w-full text-left whitespace-nowrap">
            <thead>
                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
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
                    <td class="text-sm border-b border-gray-200">
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
    </div> --}}
</body>
</html>

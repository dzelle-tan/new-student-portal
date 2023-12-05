<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>List of Students</h1>
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
</body>
</html>

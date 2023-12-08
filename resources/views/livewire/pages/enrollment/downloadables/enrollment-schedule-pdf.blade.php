<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Class Schedule</h1>
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
</body>
</html>

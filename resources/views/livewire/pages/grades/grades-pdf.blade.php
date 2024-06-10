<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grades</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        img {
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="">
    <div class="">
        <img src="{{ public_path('images/plm-logo-with-header.png') }}" alt="PLM logo" style="height: 70px;">
    </div>
    {{-- Student Information --}}
    <div class="">
        <div>
            <div>
                <x-info-label class="">{{ _("Student No:") }}</x-info-label>
                <span>{{ $user->student_no }}</span>
            </div>
            <div>
                <x-info-label class="">{{ _("Name:") }}</x-info-label>
                <span>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</span>
            </div>
            <div>
                <x-info-label class="">{{ _("Program:") }}</x-info-label>
                <span>{{ $programTitle }}</span>
            </div>
        </div>
        <div>
            <div>
                <x-info-label class="">{{ _("Student Type:") }}</x-info-label>
                <span>{{ $studentType }}</span>
            </div>
            <div>
                <x-info-label class="">{{ _("Registration Status:") }}</x-info-label>
                <span>{{ $registrationStatus }}</span>
            </div>
        </div>
    </div>

    @foreach ($terms as $term)
    @if ($selectedTerm == 'All' || $term->id == $selectedTerm)
        <h3 class="">{{ $term->aysem->academic_year_code }}, Term {{ $term->aysem->semester }}</h3>
        <div class="">
            <table class="">
                <thead>
                    <tr class="">
                        <th class="">{{ _("Subject Code") }}</th>
                        <th class="">{{ _("Section") }}</th>
                        <th class="">{{ _("Units") }}</th>
                        <th class="">{{ _("Subject Title") }}</th>
                        <th class="">{{ _("Grade") }}</th>
                        <th class="">{{ _("Remarks") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($term->block->classes as $class)
                        @foreach ($class->grades as $grade)
                            <tr class="">
                                <td class="">{{ $class->course->subject_code }}</td>
                                <td class="">{{ $term->block->section }}</td>
                                <td class="">{{ $class->course->units }}</td>
                                <td class="">{{ $class->course->subject_title }}</td>
                                <td class="">{{ $grade->grade }}</td>
                                <td class="">{{ $grade->remarks }}</td>
                            </tr>
                            @php
                                $totalUnits += $class->course->units;
                                $totalGradePoints += $class->course->units * $grade->grade;
                            @endphp
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        @php
            $gwa = $totalUnits > 0 ? number_format($totalGradePoints / $totalUnits, 4) : 0;
        @endphp
        <div class="">
            <p>{{ _("Total Units:") }} <span class="">{{ $totalUnits }}</span></p>
            <p>{{ _("GWA:") }} <span class="">{{ $gwa }}</span></p>
        </div>
        @php
            $totalUnits = 0;  // Reset for next term
            $totalGradePoints = 0;  // Reset for next term
        @endphp
    @endif
@endforeach
</body>
</html>
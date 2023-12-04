<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summary of Fees</title>
</head>
<body>
    <h1>Summary of Fees</h1>
    <div>
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
</body>
</html>

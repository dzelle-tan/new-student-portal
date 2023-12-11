<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summary of Fees</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .receipt {
            width: 300px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
        }
        .receipt div {
            /* border-bottom: 1px dashed #000; */
            padding: 10px 0;
        }
        .receipt div:last-child {
            border: none;
        }
        .receipt span:first-child {
            float: left;
        }
        .receipt span:last-child {
            float: right;
        }
        .receipt .title {
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            border: none;
            padding: 20px 0;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Assessment</h1>
    <div class="receipt">
        <div class="title">Tuition Fees</div>
        <div><span>Tuition Fee</span><span>18,000.00</span></div>
        <div class="title">Miscellaneous Fees</div>
        <div><span>Library Fee</span><span>732.00</span></div>
        <div><span>Athletic Fee w/o PE</span><span>117.00</span></div>
        <div><span>Registration Fee</span><span>74.00</span></div>
        <div><span>Medical/Dental Fee</span><span>293.00</span></div>
        <div><span>Student Welfare</span><span>74.00</span></div>
        <div><span>Cultural Activity</span><span>74.00</span></div>
        <div><span>Guidance Fee</span><span>146.00</span></div>
        <div class="title">Laboratory Fees</div>
        <div><span>Category 3 Laborator</span><span>2,400.00</span></div>
        <div class="title">Other Fees</div>
        <div><span>Development Fund</span><span>146.00</span></div>
        <div><span>Ang Pamantasan Fee</span><span>50.00</span></div>
        <div><span>Supreme Student Council</span><span>50.00</span></div>
        <div class="title">Total</div>
        <div><span>Total Assessment Fee:</span><span>22,156.00</span></div>
        <div><span>Previous Payment/s:</span><span>0.00</span></div>
        <div><span>Total Amount Due:</span><span>22,156.00</span></div>
    </div>
    {{-- <div>
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
    </div> --}}
</body>
</html>

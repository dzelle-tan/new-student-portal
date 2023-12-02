<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

{{-- please make the dummy data more realistic --}}
@php
    $offenses = [
        'Light Offenses' => [
            [
                'sm_no' => '3',
                'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
                'date' => 'Oct 10, 2022',
                'count' => '1st Offense',
                'remarks' => 'Go to the OSDS office',
                'resolution' => 'Warning',
                'status' => 'Resolved',
            ],
            [
                'sm_no' => '4',
                'violation' => 'Unhygienic use of University facilities',
                'date' => 'Sep 16, 2023',
                'count' => '1st Offense',
                'remarks' => 'Go to the OSDS office',
                'resolution' => '5 hours Community/Campus Service',
                'status' => 'Resolving',
            ],
            [
                'sm_no' => '3',
                'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
                'date' => 'Oct 10, 2022',
                'count' => '1st Offense',
                'remarks' => 'Go to the OSDS office',
                'resolution' => 'Warning',
                'status' => 'Unresolved',
            ],
            // More offenses...
        ],
        'Less Grave Offenses' => [
            [
                'sm_no' => '3',
                'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
                'date' => 'Oct 10, 2022',
                'count' => '1st Offense',
                'remarks' => 'Go to the OSDS office',
                'resolution' => 'Warning',
                'status' => 'Resolved',
            ],
            [
                'sm_no' => '4',
                'violation' => 'Unhygienic use of University facilities',
                'date' => 'Sep 16, 2023',
                'count' => '1st Offense',
                'remarks' => 'Go to the OSDS office',
                'resolution' => '5 hours Community/Campus Service',
                'status' => 'Resolving',
            ],
            [
                'sm_no' => '3',
                'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
                'date' => 'Oct 10, 2022',
                'count' => '1st Offense',
                'remarks' => 'Go to the OSDS office',
                'resolution' => 'Warning',
                'status' => 'Unresolved',
            ],
            // More offenses...
        ],
        'Grave Offenses' => [
            [
                'sm_no' => '3',
                'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
                'date' => 'Oct 10, 2022',
                'count' => '1st Offense',
                'remarks' => 'Go to the OSDS office',
                'resolution' => 'Warning',
                'status' => 'Resolved',
            ],
            [
                'sm_no' => '4',
                'violation' => 'Unhygienic use of University facilities',
                'date' => 'Sep 16, 2023',
                'count' => '1st Offense',
                'remarks' => 'Go to the OSDS office',
                'resolution' => '5 hours Community/Campus Service',
                'status' => 'Resolving',
            ],
            [
                'sm_no' => '3',
                'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
                'date' => 'Oct 10, 2022',
                'count' => '1st Offense',
                'remarks' => 'Go to the OSDS office',
                'resolution' => 'Warning',
                'status' => 'Unresolved',
            ],
            // More offenses...
        ],
        // More categories...
    ];
    $statusColors = [
        'Resolved' => 'text-green-700',
        'Resolving' => 'text-yellow-600',
        'Unresolved' => 'text-red-600',
    ];
@endphp

<div class="space-y-3">
    @foreach ($offenses as $offenseType => $offenseList)
        <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <h2 class="font-medium">{{ $offenseType }}</h2>
            <div class="w-full mt-4 overflow-x-auto">
                <table class="w-full text-left whitespace-nowrap">
                    <thead>
                        <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                            <th class="px-4 py-3 font-medium">SM No.</th>
                            <th class="px-4 py-3 font-medium">Violation</th>
                            <th class="px-4 py-3 font-medium">Date</th>
                            <th class="px-4 py-3 font-medium">Count</th>
                            <th class="px-4 py-3 font-medium">Remarks</th>
                            <th class="px-4 py-3 font-medium">Resolution</th>
                            <th class="px-4 py-3 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offenseList as $offense)
                            <tr class="text-sm border-b border-gray-200">
                                <td class="px-4 py-3">{{ $offense['sm_no'] }}</td>
                                <td class="px-4 py-3 min-w-[200px] max-w-[300px] whitespace-normal">{{ $offense['violation'] }}</td>
                                <td class="px-4 py-3">{{ $offense['date'] }}</td>
                                <td class="px-4 py-3">{{ $offense['count'] }}</td>
                                <td class="px-4 py-3">{{ $offense['remarks'] }}</td>
                                <td class="px-4 py-3">{{ $offense['resolution'] }}</td>
                                <td class="px-4 py-3 {{ $statusColors[$offense['status']] ?? 'text-gray-500' }}">{{ $offense['status'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>

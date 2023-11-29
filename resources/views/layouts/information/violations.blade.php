<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Violations') }}
        </h2>
    </x-slot>
    
    <div class="py-12 mx-auto space-y-3 text-gray-900 max-w-7xl sm:px-6 lg:px-8">
        <div class="flex p-6 overflow-hidden text-base bg-white shadow-sm sm:rounded-lg">
            <x-icon name="information-circle" class="flex-shrink-0 w-5 mr-2" /> 
            <div>
                {{ __("If violation is received, you must report to the OSDS office within three days, or it will be officially recorded.") }}
                Please refer to <a href="https://plm.edu.ph/images/downloads/manuals/PLM_Student_Manual_v1.pdf" class="underline text-primary" target="_blank">The PLM Student Manual</a>.           
            </div>
        </div>
        
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
                        'status_color' => 'text-green-700'
                    ],
                    [
                        'sm_no' => '4',
                        'violation' => 'Unhygienic use of University facilities',
                        'date' => 'Sep 16, 2023',
                        'count' => '1st Offense',
                        'remarks' => 'Go to the OSDS office',
                        'resolution' => '5 hours Community/Campus Service',
                        'status' => 'Resolving',
                        'status_color' => 'text-yellow-600'
                    ],
                    [
                        'sm_no' => '3',
                        'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
                        'date' => 'Oct 10, 2022',
                        'count' => '1st Offense',
                        'remarks' => 'Go to the OSDS office',
                        'resolution' => 'Warning',
                        'status' => 'Unresolved',
                        'status_color' => 'text-red-600'
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
                        'status_color' => 'text-green-700'
                    ],
                    [
                        'sm_no' => '4',
                        'violation' => 'Unhygienic use of University facilities',
                        'date' => 'Sep 16, 2023',
                        'count' => '1st Offense',
                        'remarks' => 'Go to the OSDS office',
                        'resolution' => '5 hours Community/Campus Service',
                        'status' => 'Resolving',
                        'status_color' => 'text-yellow-600'
                    ],
                    [
                        'sm_no' => '3',
                        'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
                        'date' => 'Oct 10, 2022',
                        'count' => '1st Offense',
                        'remarks' => 'Go to the OSDS office',
                        'resolution' => 'Warning',
                        'status' => 'Unresolved',
                        'status_color' => 'text-red-600'
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
                        'status_color' => 'text-green-700'
                    ],
                    [
                        'sm_no' => '4',
                        'violation' => 'Unhygienic use of University facilities',
                        'date' => 'Sep 16, 2023',
                        'count' => '1st Offense',
                        'remarks' => 'Go to the OSDS office',
                        'resolution' => '5 hours Community/Campus Service',
                        'status' => 'Resolving',
                        'status_color' => 'text-yellow-600'
                    ],
                    [
                        'sm_no' => '3',
                        'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
                        'date' => 'Oct 10, 2022',
                        'count' => '1st Offense',
                        'remarks' => 'Go to the OSDS office',
                        'resolution' => 'Warning',
                        'status' => 'Unresolved',
                        'status_color' => 'text-red-600'
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

        @foreach ($offenses as $offenseType => $offenseList)
            <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <h2 class="font-medium">{{ $offenseType }}</h2>
                <div class="w-full mt-4 overflow-x-auto">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead>
                            <tr class="text-xs tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
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
</x-app-layout>
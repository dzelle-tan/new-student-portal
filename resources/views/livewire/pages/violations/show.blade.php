<?php

use App\Models\Student;
use App\Models\StudentViolation;
use Illuminate\Support\Collection;

use Livewire\Volt\Component;

new class extends Component {

    public Collection $offenses;
    public Collection $offenseTypes;
    public $statusColors;

    public function mount()
    {
        $this->user = Auth::user();

        $this->offenseTypes = collect();
        $this->offenses = collect([
            [
                'offense_type' => '',
                'violation' => '',
                'date' => '',
                'count' => '',
                'remarks' => '',
                'resolution' => '',
                'type' => '',
                'status' => '',
            ],
        ]);

        $this->statusColors = [
            'Closed' => 'text-green-700',
            'In Progress' => 'text-yellow-600',
            'Unresolved' => 'text-red-600',
        ];

        $this->violation = StudentViolation::where('student_id', $this->user->id)->get();

        if ($this->violation)
        {
            foreach ($this->violation as $violation)
            {
                $this->offenses->push([
                    'offense_type' => $violation->offense_type,
                    'violation' => $violation->violation,
                    'date' => $violation->violation_date,
                    'count' => $violation->count,
                    'remarks' => $violation->resolution_remarks,
                    'resolution' => $violation->resolution,
                    'type' => $violation->type,
                    'status' => $violation->status,
                ]);

                $this->offenseTypes->push($violation->offense_type);
            }

            $this->offenseTypes = $this->offenseTypes->unique();

        }
    }
}; ?>

<div class="space-y-3">
    @if ($offenseTypes->isEmpty())
        <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <h2 class="font-medium">{{_("No Violations. Yey! Keep Being Good")}}</h2>
        </div>
    @else
        @foreach ($offenseTypes as $offenseType)
            <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <h2 class="font-medium">{{ $offenseType }}</h2>
                <div class="w-full mt-4 overflow-x-auto">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead>
                            <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                                <th class="px-4 py-3 font-medium">Type</th>
                                <th class="px-4 py-3 font-medium">Violation</th>
                                <th class="px-4 py-3 font-medium">Date</th>
                                <th class="px-4 py-3 font-medium">Count</th>
                                {{-- <th class="px-4 py-3 font-medium">Remarks</th> --}}
                                <th class="px-4 py-3 font-medium">Resolution</th>
                                <th class="px-4 py-3 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offenses as $offense)
                                <tr class="text-sm border-b border-gray-200">
                                    <td class="px-4 py-3">{{ $offense['type'] }}</td>
                                    <td class="px-4 py-3 min-w-[200px] max-w-[300px] whitespace-normal">{{ $offense['violation'] }}</td>
                                    <td class="px-4 py-3">{{ $offense['date'] }}</td>
                                    <td class="px-4 py-3">{{ $offense['count'] }}</td>
                                    {{-- <td class="px-4 py-3">{{ $offense['remarks'] }}</td> --}}
                                    <td class="px-4 py-3">{{ $offense['resolution'] }}</td>
                                    <td class="px-4 py-3 {{ $statusColors[$offense['status']] ?? 'text-gray-500' }}">{{ $offense['status'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    @endif
</div>

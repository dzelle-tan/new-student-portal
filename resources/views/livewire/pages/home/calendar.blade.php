<?php
use Carbon\Carbon;
use App\Models\Semester;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

use Livewire\Volt\Component;

new class extends Component {

    public $allEvents;
    public $academicYear;
    public $academicYearStart;
    public $academicYearEnd;
    public $eventNames;
    public $now;
    public Collection $terms;

    public function mount()
    {
        $this->user = Auth::user();

        $now = Carbon::now();

        // Retrieve current academic year
        $semester = Semester::where('start_date', '<=', $now)
                    ->where('end_date', '>=', $now)
                    ->first();

        $academicYear = $semester ? $semester->academic_year : null;

         // Feth specified academic year events considering student type and status
        if ($this->user->student_type === 'Graduate')
        {
            if (Carbon::parse($this->user->graduation_date)->year == Carbon::now()->year)
            {
                $this->terms = Semester::where('academic_year', $academicYear)
                        ->where('name', 'LIKE', '%Trimester')
                        ->with('events')
                        ->get();

            }
            else
            {

                $this->terms = Semester::where('academic_year', $academicYear)
                    ->where('name', 'LIKE', '%Trimester')
                    ->with(['events' => function ($query) {
                                $query->whereNull('student_status')
                                ->orWhere('student_status', 'Non-Graduating');
                            }])
                    ->get();
            }
        }
        else
        {
            if (Carbon::parse($this->user->graduation_date)->year == Carbon::now()->year)
            {
                $this->terms = Semester::where('academic_year', $academicYear)
                        ->where('name', 'NOT LIKE', '%Trimester')
                        ->with('events')
                        ->get();

            }
            else {
                $this->terms = Semester::where('academic_year', '2023-2024')
                    ->where('name', 'NOT LIKE', '%Trimester')
                    ->with(['events' => function ($query) {
                                $query->whereNull('student_status')
                                ->orWhere('student_status', 'Non-Graduating');
                            }])
                    ->get();
            }
        }



        // Retrieve events listed in specified academic year for undergraduate programs considering student type and status
        $this->allEvents = $this->terms->flatMap->events->unique('event_name');
        $this->eventNames = $this->allEvents->pluck('event_name');
    }

}; ?>

<div class="h-[30rem]">
    <h3 class="text-lg font-medium">{{__("University Calendar")}}</h3>
    <div class="w-full max-h-full mt-4 overflow-x-auto overflow-y-auto">
        <table class="w-full text-left whitespace-nowrap">
            <thead>

                {{-- Displays term header and dates  --}}
                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                    <th class="px-4 py-3 font-medium">Event</th>
                    @foreach ($terms as $term)
                        <th class="px-4 py-3 font-medium">
                            {{ $term->name }}
                            <p class="text-xs font-normal normal-case">{{ date('m-d-Y', strtotime($term->start_date)) }} - {{ date('m-d-Y', strtotime($term->end_date)) }}</p>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                {{-- Displays event name and their respective dates --}}
                @foreach ($eventNames as $eventName)
                    <tr class="text-sm border-b border-gray-200">
                        <th class="max-w-xs px-4 py-3 overflow-auto font-medium text-gray-800 whitespace-normal">
                            {{ $eventName }}
                        </th>
                        @foreach ($terms as $term)
                            <td class="px-4 py-3">

                                {{-- Checks if event is listed in the current term events --}}
                                @if($term->events->contains('event_name', $eventName))
                                    @php
                                        $event = $term->events->firstWhere('event_name', $eventName);
                                    @endphp
                                    @if ($event->start_date !== null)
                                        @if($event->end_date !== null && (new DateTime($event->start_date))->format('Y') === (new DateTime($event->end_date))->format('Y'))
                                            {{ (new DateTime($event->start_date))->format('M j') }}
                                        @else
                                            {{ (new DateTime($event->start_date))->format('M j, Y') }}
                                        @endif
                                        @if($event->end_date !== null)
                                            - {{ (new DateTime($event->end_date))->format('M j, Y') }}
                                        @endif
                                    @else
                                        {{ __("-") }}
                                    @endif
                                @else
                                    {{ __("-") }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end mt-4 space-x-2">
        <a href="{{ asset('files/University-Calendar2324.pdf') }}" download class="flex px-4 py-2 text-gray-500 bg-gray-200 rounded hover:text-gray-700 hover:bg-gray-300">
            <x-icon name="arrow-down-tray" solid class="w-5 h-5 mr-2" /> {{ __('Download PDF') }}
        </a>
    </div>
</div>

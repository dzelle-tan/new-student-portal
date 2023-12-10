<?php

use App\Models\Semester;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

use Livewire\Volt\Component;

new class extends Component {

    public Collection $semesters;
    public Collection $events;

    public function mount()
    {
        $this->semesters = Semester::where('academic_year', '2023-2024')->get();
        $this->events = Event::whereIn('semester_id', $this->semesters->pluck('id'))->get();
    }

}; ?>

<div class="h-[30rem]">
    <h3 class="text-lg font-medium">{{__("University Calendar")}}</h3>
    <div class="w-full max-h-full mt-4 overflow-x-auto overflow-y-auto">
        <table class="w-full text-left whitespace-nowrap">
            <thead>
                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                    <th class="px-4 py-3 font-medium">Event</th>
                    @foreach ($semesters as $semester)
                        <th class="px-4 py-3 font-medium">
                            {{ $semester->name }}
                            <p class="text-xs font-normal normal-case">{{ date('m-d-Y', strtotime($semester->start_date)) }} - {{ date('m-d-Y', strtotime($semester->end_date)) }}</p>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr class="text-sm border-b border-gray-200">
                        <th class="max-w-xs px-4 py-3 overflow-auto font-medium text-gray-800 whitespace-normal">
                            {{ $event->event_name }}
                        </th>
                        @foreach ($semesters as $semester)
                            <td class="px-4 py-3">
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
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end mt-4">
        <a href="{{ asset('files/University-Calendar2324.pdf') }}" download class="flex px-4 py-2 text-gray-500 bg-gray-200 rounded hover:text-gray-700 hover:bg-gray-300">
            <x-icon name="arrow-down-tray" solid class="w-5 h-5 mr-2" /> {{ __('Download PDF') }}
        </a>
    </div>
</div>

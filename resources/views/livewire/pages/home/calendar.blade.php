<?php

use App\Models\Semester;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as col;
use Livewire\Volt\Component;

new class extends Component {

    public $allEvents;
    public $allEventsNG;
    public $eventNames;
    public $eventNamesNG;
    public Collection $terms;
    public Collection $termsG;
    public Collection $termsNG;

    public function mount()
    {
        // Feth specified academic year
        $this->terms = Semester::where('academic_year', '2023-2024')
                        ->with('events')
                        ->get();

        // Fetch specified academic year for Undergraduate-Graduating
        $this->termsG = Semester::where('academic_year', '2023-2024')
                    ->with(['events' => function ($query) {
                            $query->whereNull('student_status')
                            ->orWhere('student_status', 'Graduating');
                        }])
                    ->get();

        // Fetch specified academic year for Undergraduate-Non-Graduating
        $this->termsNG = Semester::where('academic_year', '2023-2024')
                    ->with(['events' => function ($query) {
                            $query->whereNull('student_status')
                            ->orWhere('student_status', 'Non-Graduating');
                        }])
                    ->get();

        // Retrieve events listed in specified academic year
        $this->allEvents = $this->terms->flatMap->events->unique('event_name');
        $this->allEventsNG = $this->termsNG->flatMap->events->unique('event_name');
        $this->eventNames = $this->allEvents->pluck('event_name');
        $this->eventNamesNG = $this->allEventsNG->pluck('event_name');
    }

    // public function getUnderGTerms()
    // {

    // }
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

    {{-- Modal For Displaying Undergraduate-Grduating Calendar --}}
    <div class="flex justify-end">
        <div class="mr-9">
            <x-pop-up name="Undergraduate-Grad" title="Undergraduate-Grad">
                <x-slot name="body">
                    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <h3 class="text-lg font-medium">{{__("Undergraduate-Grduating Calendar")}}</h3>
                        <table class="w-full text-left whitespace-nowrap">
                            <thead>

                                {{-- Displays term header and dates  --}}
                                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                                    <th class="px-4 py-3 font-medium">Event</th>
                                    @foreach ($termsG as $term)
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
                                        @foreach ($termsG as $term)
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
                </x-slot>
            </x-pop-up>
        </div>
    </div>

    {{-- Modal For Displaying Undergraduate-Non-Grduating Calendar --}}
    <div class="flex justify-end">
        <div class="mr-9">
            <x-pop-up name="Undergraduate-nonGrad" title="Undergraduate-nonGrad">
                <x-slot name="body">
                    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                        <h3 class="text-lg font-medium">{{__("Undergraduate-Non-Grduating Calendar")}}</h3>
                        <table class="w-full text-left whitespace-nowrap">
                            <thead>

                                {{-- Displays term header and dates  --}}
                                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                                    <th class="px-4 py-3 font-medium">Event</th>
                                    @foreach ($termsNG as $term)
                                        <th class="px-4 py-3 font-medium">
                                            {{ $term->name }}
                                            <p class="text-xs font-normal normal-case">{{ date('m-d-Y', strtotime($term->start_date)) }} - {{ date('m-d-Y', strtotime($term->end_date)) }}</p>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>

                                {{-- Displays event name and their respective dates --}}
                                @foreach ($eventNamesNG as $eventName)
                                    <tr class="text-sm border-b border-gray-200">
                                        <th class="max-w-xs px-4 py-3 overflow-auto font-medium text-gray-800 whitespace-normal">
                                            {{ $eventName }}
                                        </th>
                                        @foreach ($termsNG as $term)
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
                </x-slot>
            </x-pop-up>
        </div>
    </div>
    <div class="flex justify-end mt-4 space-x-2">
        <button class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary" x-data x-on:click="$dispatch('open-modal', {name : 'Undergraduate-Grad'})">
            <x-icon name="table-cells" solid class="w-5 h-5 mr-2"/>
            Undergraduate Graduating
        </button>
        <button class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary" x-data x-on:click="$dispatch('open-modal', {name : 'Undergraduate-nonGrad'})">
            <x-icon name="table-cells" solid class="w-5 h-5 mr-2"/>
            Undergraduate Non-Graduating
        </button>
        <a href="{{ asset('files/University-Calendar2324.pdf') }}" download class="flex px-4 py-2 text-gray-500 bg-gray-200 rounded hover:text-gray-700 hover:bg-gray-300">
            <x-icon name="arrow-down-tray" solid class="w-5 h-5 mr-2" /> {{ __('Download PDF') }}
        </a>
    </div>
</div>

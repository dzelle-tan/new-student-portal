<?php

use App\Models\Semester;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as col;
use Livewire\Volt\Component;

new class extends Component {

    public $semestral_allEvents;
    public $semestral_allEventsNG;
    public $semestral_eventNames;
    public $semestral_eventNamesNG;
    public $trimestral_eventNames;
    public $trimestral_eventNamesNG;
    public Collection $semestral_terms;
    public Collection $trimestral_terms;
    public Collection $semestral_termsNG;
    public Collection $trimestral_termsNG;

    public function mount()
    {
        // Feth specified academic year undergraduate programs
        $this->semestral_terms = Semester::where('academic_year', '2023-2024')
                ->where('name', 'NOT LIKE', '%Trimester')
                ->with('events')
                ->get();

        // Feth specified academic year for graduate school
        $this->trimestral_terms = Semester::where('academic_year', '2023-2024')
                ->where('name', 'LIKE', '%Trimester')
                ->with('events')
                ->get();

        // Fetch specified academic year for Undergraduate-Non-Graduating
        $this->semestral_termsNG = Semester::where('academic_year', '2023-2024')
                    ->where('name', 'NOT LIKE', '%Trimester')
                    ->with(['events' => function ($query) {
                                $query->whereNull('student_status')
                                ->orWhere('student_status', 'Non-Graduating');
                            }])
                    ->get();

         // Fetch specified academic year for Graduate School - Non-Graduating
        $this->trimestral_termsNG = Semester::where('academic_year', '2023-2024')
                    ->where('name', 'LIKE', '%Trimester')
                    ->with(['events' => function ($query) {
                                $query->whereNull('student_status')
                                ->orWhere('student_status', 'Non-Graduating');
                            }])
                    ->get();

        // Retrieve events listed in specified academic year for undergraduate programs considering student type and status
        $this->semestral_allEvents = $this->semestral_terms->flatMap->events->unique('event_name');
        $this->semestral_allEventsNG = $this->semestral_termsNG->flatMap->events->unique('event_name');
        $this->semestral_eventNames = $this->semestral_allEvents->pluck('event_name');
        $this->semestral_eventNamesNG = $this->semestral_allEventsNG->pluck('event_name');

        // Retrieve events listed in specified academic year for graduate school considering student type and status
        $this->trimestral_allEvents = $this->trimestral_terms->flatMap->events->unique('event_name');
        $this->trimestral_allEventsNG = $this->trimestral_termsNG->flatMap->events->unique('event_name');
        $this->trimestral_eventNames = $this->trimestral_allEvents->pluck('event_name');
        $this->trimestral_eventNamesNG = $this->trimestral_allEventsNG->pluck('event_name');
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
                    @foreach ($semestral_terms as $term)
                        <th class="px-4 py-3 font-medium">
                            {{ $term->name }}
                            <p class="text-xs font-normal normal-case">{{ date('m-d-Y', strtotime($term->start_date)) }} - {{ date('m-d-Y', strtotime($term->end_date)) }}</p>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                {{-- Displays event name and their respective dates --}}
                @foreach ($semestral_eventNames as $eventName)
                    <tr class="text-sm border-b border-gray-200">
                        <th class="max-w-xs px-4 py-3 overflow-auto font-medium text-gray-800 whitespace-normal">
                            {{ $eventName }}
                        </th>
                        @foreach ($semestral_terms as $term)
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

    {{-- Modal For Displaying Undergraduate-Graduating Calendar --}}
    <div class="flex justify-end">
        <div class="mr-9">
            <x-pop-up name="Undergraduate-Grad" title="Undergraduate-Grad">
                <x-slot name="body">
                    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <h3 class="text-lg font-medium">{{__("Undergraduate-Graduating Calendar")}}</h3>
                        <table class="w-full text-left whitespace-nowrap">
                            <thead>

                                {{-- Displays term header and dates  --}}
                                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                                    <th class="px-4 py-3 font-medium">Event</th>
                                    @foreach ($semestral_terms as $term)
                                        <th class="px-4 py-3 font-medium">
                                            {{ $term->name }}
                                            <p class="text-xs font-normal normal-case">{{ date('m-d-Y', strtotime($term->start_date)) }} - {{ date('m-d-Y', strtotime($term->end_date)) }}</p>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>

                                {{-- Displays event name and their respective dates --}}
                                @foreach ($semestral_eventNames as $eventName)
                                    <tr class="text-sm border-b border-gray-200">
                                        <th class="max-w-xs px-4 py-3 overflow-auto font-medium text-gray-800 whitespace-normal">
                                            {{ $eventName }}
                                        </th>
                                        @foreach ($semestral_terms as $term)
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

    {{-- Modal For Displaying Undergraduate-Non-Graduating Calendar --}}
    <div class="flex justify-end">
        <div class="mr-9">
            <x-pop-up name="Undergraduate-nonGrad" title="Undergraduate-nonGrad">
                <x-slot name="body">
                    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                        <h3 class="text-lg font-medium">{{__("Undergraduate-Non-Graduating Calendar")}}</h3>
                        <table class="w-full text-left whitespace-nowrap">
                            <thead>

                                {{-- Displays term header and dates  --}}
                                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                                    <th class="px-4 py-3 font-medium">Event</th>
                                    @foreach ($semestral_termsNG as $term)
                                        <th class="px-4 py-3 font-medium">
                                            {{ $term->name }}
                                            <p class="text-xs font-normal normal-case">{{ date('m-d-Y', strtotime($term->start_date)) }} - {{ date('m-d-Y', strtotime($term->end_date)) }}</p>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>

                                {{-- Displays event name and their respective dates --}}
                                @foreach ($semestral_eventNamesNG as $eventName)
                                    <tr class="text-sm border-b border-gray-200">
                                        <th class="max-w-xs px-4 py-3 overflow-auto font-medium text-gray-800 whitespace-normal">
                                            {{ $eventName }}
                                        </th>
                                        @foreach ($semestral_termsNG as $term)
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

    {{-- Modal For Displaying Graduate School Graduating Calendar --}}
    <div class="flex justify-end">
        <div class="mr-9">
            <x-pop-up name="Gradudate-Grad" title="Gradudate-Grad">
                <x-slot name="body">
                    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <h3 class="text-lg font-medium">{{__("Graduate School-Graduating Calendar")}}</h3>
                        <table class="w-full text-left whitespace-nowrap">
                            <thead>

                                {{-- Displays term header and dates  --}}
                                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                                    <th class="px-4 py-3 font-medium">Event</th>
                                    @foreach ($trimestral_terms as $term)
                                        <th class="px-4 py-3 font-medium">
                                            {{ $term->name }}
                                            <p class="text-xs font-normal normal-case">{{ date('m-d-Y', strtotime($term->start_date)) }} - {{ date('m-d-Y', strtotime($term->end_date)) }}</p>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>

                                {{-- Displays event name and their respective dates --}}
                                @foreach ($trimestral_eventNames as $eventName)
                                    <tr class="text-sm border-b border-gray-200">
                                        <th class="max-w-xs px-4 py-3 overflow-auto font-medium text-gray-800 whitespace-normal">
                                            {{ $eventName }}
                                        </th>
                                        @foreach ($trimestral_terms as $term)
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

    {{-- Modal For Displaying Graduate School-Non-Graduating Calendar --}}
    <div class="flex justify-end">
        <div class="mr-9">
            <x-pop-up name="Grad-nonGrad" title="Grad-nonGrad">
                <x-slot name="body">
                    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                        <h3 class="text-lg font-medium">{{__("Graduate Non-Graduating Calendar")}}</h3>
                        <table class="w-full text-left whitespace-nowrap">
                            <thead>

                                {{-- Displays term header and dates  --}}
                                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                                    <th class="px-4 py-3 font-medium">Event</th>
                                    @foreach ($trimestral_termsNG as $term)
                                        <th class="px-4 py-3 font-medium">
                                            {{ $term->name }}
                                            <p class="text-xs font-normal normal-case">{{ date('m-d-Y', strtotime($term->start_date)) }} - {{ date('m-d-Y', strtotime($term->end_date)) }}</p>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>

                                {{-- Displays event name and their respective dates --}}
                                @foreach ($trimestral_eventNamesNG as $eventName)
                                    <tr class="text-sm border-b border-gray-200">
                                        <th class="max-w-xs px-4 py-3 overflow-auto font-medium text-gray-800 whitespace-normal">
                                            {{ $eventName }}
                                        </th>
                                        @foreach ($trimestral_termsNG as $term)
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
        <button class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary" x-data x-on:click="$dispatch('open-modal', {name : 'Gradudate-Grad'})">
            <x-icon name="table-cells" solid class="w-5 h-5 mr-2"/>
            Graduate Graduating
        </button>
        <button class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary" x-data x-on:click="$dispatch('open-modal', {name : 'Grad-nonGrad'})">
            <x-icon name="table-cells" solid class="w-5 h-5 mr-2"/>
            Graduate Non-Graduating
        </button>
        <a href="{{ asset('files/University-Calendar2324.pdf') }}" download class="flex px-4 py-2 text-gray-500 bg-gray-200 rounded hover:text-gray-700 hover:bg-gray-300">
            <x-icon name="arrow-down-tray" solid class="w-5 h-5 mr-2" /> {{ __('Download PDF') }}
        </a>
    </div>
</div>

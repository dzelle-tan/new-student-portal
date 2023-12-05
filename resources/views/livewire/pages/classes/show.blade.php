<?php

use App\Models\StudentRecord;

use Illuminate\Support\Collection;
use Livewire\Volt\Component;

new class extends Component {

    public Collection $classes;
    public $daysOfWeek;

    public function mount(): void
    {
        $this->user = Auth::user();


        $this->record = StudentRecord::where('student_id', $this->user->id)
            ->with('grade')
            ->latest()
            ->first();

            $this->classes = collect([
            [
                'time' => '',
                'code' => '',
                'section' => '',
                'subject' => '',
                'room' => '',
                'type' => '',
                'day' => '',
            ],
        ]);

        $this->daysOfWeek = [
            'M' => 'Monday',
            'T' => 'Tuesday',
            'W' => 'Wednesday',
            'H' => 'Thursday',
            'F' => 'Friday',
            'S' => 'Saturday',
        ];

        $this->classDay();
    }

    public function classDay()
    {
        foreach ($this->record->grade as $class)
        {
            $dayString = $class->classes->day;
            $daysArray = str_split($dayString);

            $daysOfWeek = [
                'M' => 'Monday',
                'T' => 'Tuesday',
                'W' => 'Wednesday',
                'H' => 'Thursday',
                'F' => 'Friday',
                'S' => 'Saturday',
            ];

            $days = array_map(function ($day) use ($daysOfWeek) {
                return $daysOfWeek[$day];
            }, $daysArray);

            foreach ($days as $day)
            {
                $this->classes->push([
                    'time' => $class->classes->start_time . ' - ' . $class->classes->end_time,
                    'code' => $class->classes->code,
                    'section' => $class->classes->section,
                    'subject' => $class->classes->name,
                    'room' => $class->classes->room,
                    'type' => $class->classes->type,
                    'day' => $day
                ]);
            }
        }
    }
}; ?>

<div class="grid grid-cols-1 overflow-hidden bg-white shadow-sm sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-6 rounded-md lg:min-h-[38rem]">
    @foreach ($this->daysOfWeek as $day)
        <div class="-mr-px border">
            <div class="px-6 py-4 text-sm font-medium tracking-wider uppercase border-b-2 text-table-header bg-gray-50">
                {{ $day }}
            </div>
            @foreach ($classes as $class)
                @if ($class['day'] == $day)
                    <div class="p-2 {{ $loop->first ? '' : 'pt-0' }}">
                        <x-class-block time="{{ $class['time'] }}" code="{{ $class['code'] }}" section="{{ $class['section'] }}" subject="{{ $class['subject'] }}" room="{{ $class['room'] }}" type="{{ $class['type'] }}"/>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
</div>
    {{-- @foreach ($classes as $class)
        <div class="flex p-6 space-x-2" wire:key="{{ $class->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-gray-800">{{ $class->user->name }}</span>
                        <small class="ml-2 text-sm text-gray-600">{{ $class->created_at->format('j M Y, g:i a') }}</small>
                    </div>
                </div>
                <p class="mt-4 text-lg text-gray-900">{{ $class->name }}</p>
            </div>
        </div>
    @endforeach  --}}



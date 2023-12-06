{{-- <?php

// use function Livewire\Volt\{state};

//

?> --}}

<?php

use App\Models\StudentRecord;

use Illuminate\Support\Collection;
use Livewire\Volt\Component;

new class extends Component {

    public Collection $classes;
    public $daysOfWeek;
    public $flag = true;

    public function mount(): void
    {
        $this->user = Auth::user();

        $this->record = StudentRecord::where('student_id', $this->user->id)
            ->with('grade')
            ->latest()
            ->first();

        $this->classes = collect();

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

            $currentDay = date('l');

            foreach ($days as $day)
            {
                if ($day == $currentDay)
                {
                    $this->classes->push([
                        'time' => date('g:i A', strtotime($class->classes->start_time)) . ' - ' . date('g:i A', strtotime($class->classes->end_time)),
                        'code' => $class->classes->code,
                        'section' => $class->classes->section,
                        'subject' => $class->classes->name,
                        'room' => $class->classes->room,
                        'type' => $class->classes->type,
                        'day' => $day
                    ]);

                    $this->flag = false;
                }
            }
        }
    }
}; ?>

<div>
    <h3 class="text-lg font-medium">{{ __("Today's Schedule")}}</h3>
    <div class="flex mt-1 mb-8 space-x-1 text-sm">
        <x-icon name="calendar-days" solid class="w-5 h-5 text-gray-600"/><p>{{ date('F j, Y, l') }}</p>
    </div>
    <div class="space-y-3 ">
        @foreach ($classes as $class)
                <div class="p-2 {{ $loop->first ? '' : 'pt-0' }}">
                    <x-class-block time="{{ $class['time'] }}" code="{{ $class['code'] }}" section="{{ $class['section'] }}" subject="{{ $class['subject'] }}" room="{{ $class['room'] }}" type="{{ $class['type'] }}"/>
                </div>
        @endforeach
        @if ($flag)
            <div class="p-2">
               Yey! No Classes Today!!!
               <img src="{{ asset('files/dance-moves.gif') }}" alt="Celebration GIF">
            </div>

        @endif
    </div>
    <a href="{{ route('classes') }}" class="flex justify-end mt-10 text-gray-500 underline">See more...</a>
</div>

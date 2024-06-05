<?php

use App\Models\Student;
use App\Models\StudentTerm;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {

    public Collection $classes;
    public $daysOfWeek;

    public function mount(): void
    {
        // Retrieve the authenticated user
        $this->user = Auth::user();

        // Fetches the latest term of the authenticated student
        $latestTerm = StudentTerm::where('student_no', $this->user->student_no)
            ->orderBy('id', 'desc')
            ->with(['block.classes.course', 'block.classes.grades', 'block.classes.classSchedules', 'block.classes.classSchedules.classMode'])
            ->first();

       // Fetch all classes associated with the latest term of the authenticated student for today
       if ($latestTerm) {
            $this->classes = $latestTerm->block->classes->filter(function ($class) {
                return $class->classSchedules->contains(function ($schedule) {
                    return $schedule->day === date('l');
                });
            });
        } else {
            $this->classes = collect();
        }
        
        $this->daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    }

    public function formatTime($time)
    {
        return \Carbon\Carbon::parse($time)->format('g:i A');
    }
};
?>

<div>
    <h3 class="text-lg font-medium">{{ __("Today's Schedule") }}</h3>
    <div class="flex mt-1 mb-8 space-x-1 text-sm">
        <x-icon name="calendar-days" solid class="w-5 h-5 text-gray-600" /><p>{{ date('F j, Y, l') }}</p>
    </div>
    <div class="space-y-3 overflow-auto max-h-[400px]">
        @if (!$classes->isEmpty())
            @foreach ($classes as $class)
                @foreach ($class->classSchedules as $schedule)
                    @if ($schedule->day === date('l'))
                        <div class="w-full p-2 pl-3 space-y-3 border-l-4 rounded-md shadow-sm {{ $schedule->classMode->mode_type === 'Face-to-Face' ? 'bg-indigo-50 border-primary-light-2 text-primary' : 'bg-amber-50 border-secondary-light-2 text-secondary-dark-1' }}">
                            <p>{{ $this->formatTime($schedule->start_time) }} - {{ $this->formatTime($schedule->end_time) }}</p>
                            <p>{{ $class->course->subject_title }}</p>
                        </div>
                    @endif
                @endforeach
            @endforeach
        @else
            <p class="italic text-gray-400">No Classes Today — take the chance to relax, recharge, or catch up.</p>
        @endif
    </div>
</div>
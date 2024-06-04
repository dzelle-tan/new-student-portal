<?php

use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public Student $user;
    public string $schoolYear;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user();

        if ($this->user->graduation_date) {
            $graduationYear = \Carbon\Carbon::parse($this->user->graduation_date)->format('Y');
            $this->schoolYear = 'Batch ' . $graduationYear . '!';
        }
    }
}; ?>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Welcome, PLM Alumni') }} 
            @if(isset($this->schoolYear))
                {{ $this->schoolYear }}
            @endif
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("You may access the alumni portal for all services and information available to PLM graduates.") }}
        </p>
    </header>

    <div>
        <a href="https://alumni.plmerp24.cloud" target="_blank">
            <x-primary-button>{{ __('Go To Alumni Portal') }}</x-primary-button>
        </a>
    </div>
</section>

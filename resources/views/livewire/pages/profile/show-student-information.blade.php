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

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user();
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Student Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("If any information below is incorrect, please contact your respective college's OCS. If all details shown here are correct, you may proceed to the Pre-enlistment.") }}
        </p>
    </header>

    <div class="mt-6 space-y-2">
        <div>
            <x-info-label class="w-36">{{_("Name:")}}</x-info-label>
            <span>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</span>
        </div>
        <div>
            <x-info-label class="w-36">{{_("Student No:")}}</x-info-label>
            <span>{{ $user->student_no }}</span>
        </div>
        <div>
            <x-info-label class="w-36">{{_("Degree Program:")}}</x-info-label>
            <span class="inline-block w-54">{{ $user->degree_program }}</span>
        </div>
        <div>
            <x-info-label class="w-36">{{_("Year Level:")}}</x-info-label>
            <span>{{ $user->year_level }}</span>
        </div>
        <div>
            <x-info-label class="w-36">{{_("Registration Status:")}}</x-info-label>
            <span>{{ $user->registration_status }}</span>
        </div>
        <div>
            <x-info-label class="w-36">{{_("Student Type:")}}</x-info-label>
            <span>{{ $user->student_type }}</span>
        </div>
        <div>
            <x-info-label class="w-36">{{_("Pedigree:")}}</x-info-label>
            <span>{{ $user->pedigree }}</span>
        </div>
        <div>
            <x-info-label class="w-36">{{_("PLM Email:")}}</x-info-label>
            <span>{{ $user->email }}</span>
        </div>
        <div>
            <x-info-label class="w-36">{{_("Personal Email:")}}</x-info-label>
            <span>{{ $user->personal_email }}</span>
        </div>
        <div>
            <x-info-label class="w-36">{{_("Mobile No:")}}</x-info-label>
            <span>{{ $user->mobile_no }}</span>
        </div>
</section>

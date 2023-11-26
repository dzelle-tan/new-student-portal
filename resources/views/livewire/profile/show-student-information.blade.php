<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public User $user;

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
            <x-info-label>{{_("Name:")}}</x-info-label> 
            {{ $user->name }}
        </div>
        <div>
            <x-info-label>{{_("Email:")}}</x-info-label> 
            {{ $user->email }}
        </div>
    </div>
</section>

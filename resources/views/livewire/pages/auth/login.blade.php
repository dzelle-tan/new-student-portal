<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }
}; ?>

<div>
    <h2 class="mt-2 text-2xl font-semibold text-primary">Login</h2>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
         <!-- Student Number -->
        <div class="mt-6">
            <x-input-label for="student_no" :value="__('Student Number')" />
            <x-text-input wire:model="form.student_no" id="student_no" class="block w-full mt-1"
                type="text"
                name="student_no"
                placeholder="xxxxxxxxx"
                required autofocus autocomplete="username" />

            <x-input-error :messages="$errors->get('student_no')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="flex justify-between">
                <x-input-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a class="text-xs rounded-md text-primary-light-1 hover:text-primary hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <x-text-input wire:model="form.password" id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500"
                        type="checkbox"
                        name="remember">

                <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <x-primary-button class="w-full mt-8">
            {{ __('Log in') }}
        </x-primary-button>
    </form>
</div>

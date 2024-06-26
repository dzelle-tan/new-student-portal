<?php

use App\Livewire\Actions\Logout;
use App\Livewire\Forms\LogoutForm;
use Livewire\Volt\Component;

//to be removed when 2FA is fixed
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        
//----- to be removed in the future kapag naayos na 2FA -----
        
        // Get the currently authenticated user
        $user = Auth::user();

        // Set email_verified_at to null and save the user
        // $user->email_verified_at = null;
        $user->save();
//-------------------------------------------------

        $logout();

        $this->redirect('/login', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b-4 md:border-b md:border-gray-100 md:bg-white bg-primary border-secondary">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-4 shrink-0">
                <a href="{{ route('home') }}" wire:navigate>
                    <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
                </a>
                <h1 class="text-xl font-bold text-white md:text-secondary-light-1">PLM Student Portal</h1>
            </div>
                
            <div class="hidden space-x-4 md:flex md:items-center md:ms-6">
                <!-- Calendar -->
                <div class="relative inline-block group">
                    <x-icon name="calendar-days" solid class="transition duration-150 ease-in-out text-slate-700 hover:text-gray-700 focus:outline-none"/>

                    <div class="absolute z-50 hidden w-24 text-center text-black transform -translate-x-1/2 bg-white border rounded-md left-1/2 group-hover:block">
                        <div class="text-sm py-0.5 font-medium text-white bg-red-700 rounded-t-md">
                            {{ date('F') }}
                        </div>
                        <div class="text-3xl">
                            {{ date('j') }}
                        </div>
                        <div class="text-sm">
                            {{ date('l') }}
                        </div>
                    </div>
                </div>
                <!-- Notification -->
                {{-- <div class="relative inline-block ml-3 group">
                    <x-icon name="bell" class="text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"/>
                </div> --}}
                <!-- Settings Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 transition duration-150 ease-in-out bg-white border border-transparent rounded-md text-slate-700 hover:text-gray-700 focus:outline-none">
                            <div x-data="{ name: '{{ auth()->user()->student_no }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Exit Student Portal') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-white transition duration-150 ease-in-out rounded-md hover:bg-[#242a81]">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>

        <div class="py-4 border-t border-[#242a81]">
            <x-responsive-nav-link :href="route('classes')" :active="request()->routeIs('classes')" wire:navigate>
                {{ __('Classes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('grades')" :active="request()->routeIs('grades')" wire:navigate>
                {{ __('Grades') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('student_violations')" :active="request()->routeIs('student_violations')" wire:navigate>
                {{ __('Violations') }}
            </x-responsive-nav-link>
        </div>
        
        <div class="py-4 border-t border-[#242a81]">
            <x-responsive-nav-link :href="route('enrollment')" :active="request()->routeIs('enrollment')" wire:navigate>
                {{ __('Enrollment') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('registrar')" :active="request()->routeIs('registrar')" wire:navigate>
                {{ __('Registrar') }}
            </x-responsive-nav-link>
            {{-- <x-responsive-nav-link :href="route('evaluation')" :active="request()->routeIs('evaluation')" wire:navigate>
                {{ __('Evaluation') }}
            </x-responsive-nav-link> --}}
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-[#242a81]">
            <div class="px-4">
                <div class="text-base font-medium text-slate-200" x-data="{ name: '{{ auth()->user()->student_no }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="text-sm font-medium text-slate-400">{{ auth()->user()->plm_email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Exit Student Portal') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>

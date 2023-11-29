<?php

use App\Livewire\Actions\Logout;
use App\Livewire\Forms\LogoutForm;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="sticky top-0 bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('home') }}" wire:navigate>
                        <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                        <x-icon name="home" class="w-5 h-5 mr-2" solid/> {{ __('Home') }}
                    </x-nav-link>
                    <x-div-nav-link 
                        class="sm:flex sm:items-center sm:ms-6"
                        :active="request()->routeIs('classes') || request()->routeIs('student_violations')"
                    >
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center py-2 text-sm font-medium leading-4 transition duration-150 ease-in-out border border-transparent rounded-md focus:outline-none">
                                    <x-icon name="identification" class="w-5 h-5 mr-2" solid/>
                                    <div x-data="{ name: 'Information' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
        
                                    <div class="ms-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-dropdown-link :href="route('classes')" wire:navigate>
                                    {{ __('Classes') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('profile')" wire:navigate>
                                    {{ __('Grades') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('student_violations')" wire:navigate>
                                    {{ __('Violations') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </x-div-nav-link>
                    <x-div-nav-link class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center py-2 text-sm font-medium leading-4 transition duration-150 ease-in-out border border-transparent rounded-md focus:outline-none">
                                    <x-icon name="building-office-2" class="w-5 h-5 mr-2" solid/>
                                    <div x-data="{ name: 'Services' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
        
                                    <div class="ms-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile')" wire:navigate>
                                    {{ __('Enrollment') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('profile')" wire:navigate>
                                    {{ __('Registrar') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('profile')" wire:navigate>
                                    {{ __('Evaluation') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </x-div-nav-link>
                </div>
            </div>

            <div class="hidden space-x-4 sm:flex sm:items-center sm:ms-6">
                <!-- Calendar -->
                <div class="relative inline-block group">
                    <x-icon name="calendar-days" solid class="text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"/>

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
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
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
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>
        
        <div class="py-4 border-t border-gray-200">
            <x-responsive-nav-link :href="route('classes')" :active="request()->routeIs('classes')" wire:navigate>
                {{ __('Classes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('student_violations')" :active="request()->routeIs('student_violations')" wire:navigate>
                {{ __('Violations') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800" x-data="{ name: '{{ auth()->user()->student_no }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="text-sm font-medium text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>

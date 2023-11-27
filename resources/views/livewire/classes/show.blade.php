<?php

use App\Models\Subject; 
use Illuminate\Database\Eloquent\Collection; 
use Livewire\Volt\Component;

new class extends Component {
    public Collection $classes; 
 
    public function mount(): void
    {
        $this->classes = Subject::with('user')
            ->latest()
            ->get();
    } 
}; ?>

<div class="grid grid-cols-1 overflow-hidden bg-white sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-6 rounded-xl">
    <div class="-mr-px border">
        <div class="px-6 py-4 border-b-2">
            Monday
        </div>
        <div class="p-2">
            <div class="w-full h-full p-2 pl-3 space-y-3 text-white rounded-md bg-secondary ">
                <p>9am - 12pm</p>
                <div>
                    <p>CSC 0134.1 - 2</p>
                    <p>Operating System (Lab)</p>
                </div>
                <p>GV 311</p>
            </div>       
        </div>
    </div>
    <div class="-mr-px border">
        <div class="px-6 py-4 border-b-2">
            Tuesday
        </div>
    </div>
    <div class="-mr-px border">
        <div class="px-6 py-4 border-b-2">
            Wednesday
        </div>
        <div class="p-2">
            <div class="w-full h-full p-2 pl-3 space-y-3 border-l-4 rounded-md border-primary-light-1 bg-indigo-50">
                <p>9am - 12pm</p>
                <div>
                    <p>CSC 0134.1 - 2</p>
                    <p>Operating System (Lab)</p>
                </div>
                <p>GV 311</p>
            </div>       
        </div>
        <div class="p-1">
            <div class="w-full h-full p-2 pl-3 space-y-3 border-l-4 rounded-md border-primary-light-1 bg-indigo-50">
                <p>9am - 12pm</p>
                <div>
                    <p>CSC 0134.1 - 2</p>
                    <p>Operating System (Lab)</p>
                </div>
                <p>GV 311</p>
            </div>       
        </div>
    </div>
    <div class="-mr-px border">
        <div class="px-6 py-4 border-b-2">
            Thursday
        </div>
        <div class="p-2">
            <div class="w-full h-full p-2 pl-3 space-y-3 border-l-4 rounded-md border-primary-light-1 bg-indigo-50">
                <p>9am - 12pm</p>
                <div>
                    <p>CSC 0134.1 - 2</p>
                    <p>Operating System (Lab)</p>
                </div>
                <p>GV 311</p>
            </div>       
        </div>
    </div>
    <div class="-mr-px border">
        <div class="px-6 py-4 border-b-2">
            Friday
        </div>
        <div class="p-2">
            <div class="w-full h-full p-2 pl-3 space-y-3 border-l-4 rounded-md border-primary-light-1 bg-indigo-50">
                <p>9am - 12pm</p>
                <div>
                    <p>CSC 0134.1 - 2</p>
                    <p>Operating System (Lab)</p>
                </div>
                <p>GV 311</p>
            </div>       
        </div>
        <div class="p-1">
            <div class="w-full h-full p-2 pl-3 space-y-3 border-l-4 rounded-md border-primary-light-1 bg-indigo-50">
                <p>9am - 12pm</p>
                <div>
                    <p>CSC 0134.1 - 2</p>
                    <p>Operating System (Lab)</p>
                </div>
                <p>GV 311</p>
            </div>       
        </div>
        <div class="p-2">
            <div class="w-full h-full p-2 pl-3 space-y-3 text-white rounded-md bg-primary">
                <p>9am - 12pm</p>
                <div>
                    <p>CSC 0134.1 - 2</p>
                    <p>Operating System (Lab)</p>
                </div>
                <p>GV 311</p>
            </div>       
        </div>
    </div>
    <div class="-mr-px border">
        <div class="px-6 py-4 border-b-2">
            Saturday
        </div>
    </div>
</div>
{{-- <!-- Table responsive wrapper -->
<div class="overflow-x-auto bg-white rounded-xl">

        <!-- Table -->
        <table class="min-w-full text-sm text-left whitespace-nowrap">
    
        <!-- Table head -->
        <thead class="tracking-wider border-b-2">
            <tr>
                <th scope="col" class="w-1/6 px-6 py-4">
                    Monday
                </th>
                <th scope="col" class="px-6 py-4 border-x">
                    Tuesday
                </th>
                <th scope="col" class="px-6 py-4 border-x">
                    Wednesday
                </th>
                <th scope="col" class="px-6 py-4 border-x">
                    Thursday
                </th>
                <th scope="col" class="px-6 py-4 border-x">
                    Friday
                </th>
                <th scope="col" class="px-6 py-4 border-x">
                    Saturday
                </th>
                <th scope="col" class="px-6 py-4 border-x">
                    Sunday
                </th>
            </tr>
        </thead>
    
        <!-- Table body -->
        <tbody>
    
            <tr class="flex flex-col border-b ">
                <td class="p-1 border-x">
                    <div class="w-full h-full p-2 pl-3 space-y-3 border-l-4 rounded-md border-primary-light-1 bg-indigo-50">
                        <p>9am - 12pm</p>
                        <div>
                            <p>CSC 0134.1 - 2</p>
                            <p>Operating System (Lab)</p>
                        </div>
                        <p>GV 311</p>
                    </div>
                </td>
                <td class="p-1 border-x">
                    <div class="w-full h-full p-2 pl-3 space-y-3 border-l-4 rounded-md border-primary-light-1 bg-indigo-50">
                        <p>9am - 12pm</p>
                        <div>
                            <p>CSC 0134.1 - 2</p>
                            <p>Operating System (Lab)</p>
                        </div>
                        <p>GV 311</p>
                    </div>
                </td>
                <td class="p-1 border-x">
                    <div class="w-full h-full p-2 pl-3 space-y-3 border-l-4 rounded-md border-primary-light-1 bg-indigo-50">
                        <p>9am - 12pm</p>
                        <div>
                            <p>CSC 0134.1 - 2</p>
                            <p>Operating System (Lab)</p>
                        </div>
                        <p>GV 311</p>
                    </div>
                </td>
            </tr>
        </tbody>
    
        </table>
  
</div> --}}
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



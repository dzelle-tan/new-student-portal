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

<!-- Table responsive wrapper -->
<div class="overflow-x-auto bg-white">

        <!-- Table -->
        <table class="min-w-full text-sm text-left whitespace-nowrap">
    
        <!-- Table head -->
        <thead class="tracking-wider border-t border-b-2">
            <tr>
                <th scope="col" class="px-6 py-4 border-x">
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
    
            <tr class="border-b ">
                <td class="px-6 py-4 border-x">
                    <div>
                        
                    </div>
                </td>
                <td class="px-6 py-4 border-x">30</td>
                <td class="px-6 py-4 border-x ">In Stock</td>
            </tr>
    
            <tr class="border-b ">
                <td class="px-6 py-4 border-x ">$89.50</td>
                <td class="px-6 py-4 border-x ">25</td>
                <td class="px-6 py-4 border-x ">In Stock</td>
            </tr>
    
            <tr class="border-b ">
                <td class="px-6 py-4 border-x ">$69.99</td>
                <td class="px-6 py-4 border-x ">40</td>
                <td class="px-6 py-4 border-x ">In Stock</td>
            </tr>
    
            <tr class="border-b ">
                <td class="px-6 py-4 border-x ">$449.99</td>
                <td class="px-6 py-4 border-x ">5</td>
                <td class="px-6 py-4 border-x ">In Stock</td>
            </tr>
    
            <tr class="border-b ">
                <td class="px-6 py-4 border-x ">$24.95</td>
                <td class="px-6 py-4 border-x ">50</td>
                <td class="px-6 py-4 border-x ">In Stock</td>
            </tr>
            <tr class="border-b ">
                <td class="px-6 py-4 border-x ">$24.95</td>
                <td class="px-6 py-4 border-x ">50</td>
                <td class="px-6 py-4 border-x ">In Stock</td>
            </tr>
    
        </tbody>
    
        </table>
  
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



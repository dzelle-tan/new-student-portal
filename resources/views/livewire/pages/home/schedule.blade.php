<?php

use function Livewire\Volt\{state};

//

?>

<div>
    <h3 class="text-lg font-medium">{{ __("Today's Schedule")}}</h3>
    <div class="flex mt-1 mb-8 space-x-1 text-sm">
        <x-icon name="calendar-days" solid class="w-5 h-5 text-gray-600"/><p>{{ date('F j, Y, l') }}</p>
    </div>
    <div class="space-y-3 ">
        <div class="w-full p-2 pl-3 space-y-3 border-l-4 rounded-md shadow-sm bg-indigo-50 border-primary-light-2 text-primary">
            <p>3:00 - 5:00 PM</p>
            <p>Software Engineering (Lec)</p>
        </div>     
        <div class="w-full p-2 pl-3 space-y-3 border-l-4 rounded-md shadow-sm bg-indigo-50 border-primary-light-2 text-primary">
            <p>5:00 - 8:00 PM</p>
            <p>Software Engineering (Lab)</p>
        </div>                   
        <div class="w-full p-2 pl-3 space-y-3 border-l-4 rounded-md shadow-sm bg-indigo-50 border-primary-light-2 text-primary">
            <p>5:00 - 8:00 PM</p>
            <p>Software Engineering (Lab)</p>
        </div>                   
    </div>
    <a href="{{ route('classes') }}" class="flex justify-end mt-10 text-gray-500 underline">See more...</a>
</div>

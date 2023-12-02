<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <h3 class="text-lg font-medium">{{__("University Calendar")}}</h3>
    <div class="w-full mt-4 overflow-x-auto">
        <table class="w-full text-left whitespace-nowrap">
            <thead>
                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                    <th class="px-4 py-3 font-medium">Event</th>
                    <th class="px-4 py-3 font-medium">First Semester</th>
                    <th class="px-4 py-3 font-medium">Second Semester</th>
                    <th class="px-4 py-3 font-medium">Midyear Term</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3"></td>
                    <td class="px-4 py-3"></td>
                    <td class="px-4 py-3"></td>
                    <td class="px-4 py-3"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

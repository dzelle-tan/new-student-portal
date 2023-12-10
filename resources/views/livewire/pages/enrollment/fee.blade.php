<?php

use App\Models\StudentRecord;
use Livewire\Volt\Component;

new class extends Component {

    public $user;
    public $record;

    public function mount()
    {
        $this->user = Auth::user();
        $this->record = StudentRecord::where('student_id', $this->user->id)
            ->with('fee')
            ->latest()
            ->first();
    }
}; ?>


<div class="w-full mt-4 overflow-x-auto md:flex md:space-x-8">
    <div class="space-y-8 md:w-96">
        <table class="w-full text-left whitespace-nowrap">
            <caption class="px-4 py-3 text-xs font-medium tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">{{_("TUITION FEE")}}</caption>
            <tbody>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Tuition Fee (:units units)", ['units' => $record->fee->tuition_units]) }}</td>
                    <td class="px-4 py-3">{{ $record->fee->tuition_fee }}</td>
                </tr>
            </tbody>
        </table>
        
        <table class="w-full text-left whitespace-nowrap">
            <caption class="px-4 py-3 text-xs font-medium tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">{{_("MISCELLANEOUS FEE")}}</caption>
            <tbody>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Athletic Fee") }}</td>
                    <td class="px-4 py-3">{{ $record->fee->athletic_fee }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Cultural Activity") }}</td>
                    <td class="px-4 py-3">{{ $record->fee->cultural_activity }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Guidance Fee") }}</td>
                    <td class="px-4 py-3">{{ $record->fee->guidance_fee }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Library Fee") }}</td>
                    <td class="px-4 py-3">{{ $record->fee->library_fee }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Medical/Dental Fee") }}</td>
                    <td class="px-4 py-3">{{ $record->fee->medical_dental_fee }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Registration Fee") }}</td>
                    <td class="px-4 py-3">{{ $record->fee->registration_fee }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Student Welfare Fee") }}</td>
                    <td class="px-4 py-3">74.00</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="space-y-8 md:w-96">
        <table class="w-full text-left whitespace-nowrap">
            <caption class="px-4 py-3 text-xs font-medium tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">{{_("LABORATORY FEE")}}</caption>
            <tbody>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Category (:units Laboratory)", ['units' => $record->fee->laboratory_category]) }}</td>
                    <td class="px-4 py-3">{{ $record->fee->laboratory_fee }}</td>
                </tr>
            </tbody>
        </table>

        <table class="w-full text-left whitespace-nowrap">
            <caption class="px-4 py-3 text-xs font-medium tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">{{_("OTHER FEE")}}</caption>
            <tbody>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Development Fund") }}</td>
                    <td class="px-4 py-3">{{ $record->fee->registration_fee }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Ang Pamantasan Fee") }}</td>
                    <td class="px-4 py-3">{{ $record->fee->ang_pamantasan_fee }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Supreme Student Council") }}</td>
                    <td class="px-4 py-3">{{ $record->fee->ssc_fee }}</td>
                </tr>
            </tbody>
        </table>
        <div class="p-4 border border-gray-300 rounded-md">
            <p class="mr-2 font-medium">Paying Status:</p>
            <span>Covered by <a href="https://lawphil.net/statutes/repacts/ra2017/ra_10931_2017.html" target="blank" class="hover:underline hover:text-blue-700">CHED Unifast (RA 10931)</a></span>
            <x-icon name="check-circle" class="inline-block w-5 h-5 text-green-500" />
        </div>
    </div>
</div>

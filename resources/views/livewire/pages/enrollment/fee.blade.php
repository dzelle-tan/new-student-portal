<?php

use App\Models\StudentRecord;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {

    public $user;
    public $record;

    public function mount()
    {
        $this->user = Auth::user();
        $this->record = StudentRecord::where('student_no', $this->user->student_no)
            ->orderBy('aysem_id', 'desc')
            ->first();
    }
};
?>

<div class="w-full mt-4 overflow-x-auto md:flex md:space-x-8">
    <div class="space-y-8 md:w-96">
        <table class="w-full text-left whitespace-nowrap">
            <caption class="px-4 py-3 text-xs font-medium tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">{{_("TUITION FEE")}}</caption>
            <tbody>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Tuition Fee (:units units)", ['units' => $record->tuition_units ?? 0]) }}</td>
                    <td class="px-4 py-3">{{ number_format($record->tuition_fee, 2) }}</td>
                </tr>
            </tbody>
        </table>
        
        <table class="w-full text-left whitespace-nowrap">
            <caption class="px-4 py-3 text-xs font-medium tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">{{_("MISCELLANEOUS FEE")}}</caption>
            <tbody>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Athletic Fee") }}</td>
                    <td class="px-4 py-3">{{ number_format($record->athletic_fee, 2) }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Cultural Activity") }}</td>
                    <td class="px-4 py-3">{{ number_format($record->cultural_activity, 2) }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Guidance Fee") }}</td>
                    <td class="px-4 py-3">{{ number_format($record->guidance_fee, 2) }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Library Fee") }}</td>
                    <td class="px-4 py-3">{{ number_format($record->library_fee, 2) }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Medical/Dental Fee") }}</td>
                    <td class="px-4 py-3">{{ number_format($record->medical_dental_fee, 2) }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Registration Fee") }}</td>
                    <td class="px-4 py-3">{{ number_format($record->registration_fee ?? 0, 2) }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Student Welfare Fee") }}</td>
                    <td class="px-4 py-3">{{ number_format($record->student_welfare, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="space-y-8 md:w-96">
        <table class="w-full text-left whitespace-nowrap">
            <caption class="px-4 py-3 text-xs font-medium tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">{{_("LABORATORY FEE")}}</caption>
            <tbody>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Category (:units Laboratory)", ['units' => $record->laboratory_category ?? 0]) }}</td>
                    <td class="px-4 py-3">{{ number_format($record->laboratory_fee, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <table class="w-full text-left whitespace-nowrap">
            <caption class="px-4 py-3 text-xs font-medium tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">{{_("OTHER FEE")}}</caption>
            <tbody>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Development Fund") }}</td>
                    <td class="px-4 py-3">{{ number_format($record->development_fund, 2) }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Ang Pamantasan Fee") }}</td>
                    <td class="px-4 py-3">{{ number_format($record->ang_pamantasan_fee, 2) }}</td>
                </tr>
                <tr class="text-sm border-b border-gray-200">
                    <td class="px-4 py-3">{{ __("Supreme Student Council") }}</td>
                    <td class="px-4 py-3">{{ number_format($record->ssc_fee, 2) }}</td>
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

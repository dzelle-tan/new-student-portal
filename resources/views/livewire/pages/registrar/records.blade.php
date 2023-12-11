<?php
use App\Models\StudentRequest;
use Illuminate\Database\Eloquent\Collection;

use Livewire\Volt\Component;

new class extends Component {

    public Collection $studentRequests;
    public $modalData;
    public $statusColors;

    public function mount(): void
    {
        // Retrieve the authenticated user
        $this->user = Auth::user();
        $this->studentRequests = StudentRequest::where('student_id', $this->user->id)
                                ->with('documents')
                                ->get();

        $this->modalData = $this->studentRequests->first();

        $this->statusColors = [
            'Released' => 'text-green-700',
            'Pending' => 'text-yellow-600',
            'For Claiming' => 'text-red-600',
        ];
    }

    public function showRequestInfo($requestId)
    {
        $this->modalData = StudentRequest::find($requestId);
        $this->dispatch('open-modal', name : 'request_info');
}
}; ?>

<div class="space-y-3">
    <div class="p-6 overflow-x-auto bg-white shadow-sm sm:rounded-lg">

        <table class="w-full text-left whitespace-nowrap">
            <thead>
                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                    <th class="px-4 py-3 font-medium">Document Name</th>
                    <th class="px-4 py-3 font-medium">Quantity</th>
                    <th class="px-4 py-3 font-medium">Receipt No</th>
                    <th class="px-4 py-3 font-medium">Purpose</th>
                    <th class="px-4 py-3 font-medium">Total</th>
                    <th class="px-4 py-3 font-medium">Expected Release Date</th>
                    <th class="px-4 py-3 font-medium">Date Requested</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium">More Info</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentRequests as $request)
                    <tr class="text-sm border-b border-gray-200">
                        @foreach ($request->documents as $document)
                            <td class="px-4 py-3">{{ $document->document_name }}</td>
                            <td class="px-4 py-3">{{ $document->no_of_copies }}</td>
                        @endforeach
                        <td class="px-4 py-3">{{ $request->receipt_no }}</td>
                        <td class="px-4 py-3 min-w-[50px] max-w-[200px] whitespace-normal">{{ $request->purpose }}</td>
                        <td class="px-4 py-3">{{ $request->total }}</td>
                        <td class="px-4 py-3">{{ date('M d, Y', strtotime($request->expected_release)) }}</td>
                        <td class="px-4 py-3">{{ date('M d, Y', strtotime($request->date_requested)) }}</td>
                        <td class="px-4 py-3 {{ $statusColors[$request->status] ?? 'text-gray-500' }}">{{ $request->status }}</td>
                        <td class="px-4 py-3">
                            <button id="button-{{ $request->id }}" wire:click="showRequestInfo({{ $request->id }})">
                                {{_('(i)') }}
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mr-9">
            <x-pop-up name="request_info" title="request_info">
                <x-slot name="body">
                    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                        <table>
                            <thead>
                                <th class="px-4 py-3 font-medium">Document Name</th>
                                <th class="px-4 py-3 font-medium">Amount</th>
                                <th class="px-4 py-3 font-medium">No. of Copies</th>
                            </thead>
                            <tbody>
                                <tr class="text-sm border-b border-gray-200">
                                @foreach ($modalData->documents as $document)
                                    <td class="px-4 py-3">{{ $document->document_name }}</td>
                                    <td class="px-4 py-3">{{ $document->amount }}</td>
                                    <td class="px-4 py-3">{{ $document->no_of_copies }}</td>
                                @endforeach
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Mode of Payment</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->mode }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Purpose</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->purpose }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Receipt No</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->receipt_no }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Registrar Name</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->registrar_name }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Total</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->total }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Total</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->total }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Date of Payment</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->date_of_payment }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Expected Release Date</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->expected_release }}</td>
                                </tr>
                                @if ($modalData->date_received != null)
                                    <tr class="text-sm">
                                        <td class="px-4 py-3 font-medium">Date Received</td>
                                        <td class="px-4 py-3 font-medium">{{ $modalData->date_received }}</td>
                                    </tr>
                                @endif
                                <tr class="text-sm border-b border-gray-200">
                                    <td class="px-4 py-3 font-medium">Date Requested</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->date_requested }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </x-slot>
            </x-pop-up>
        </div>
    </div>
</div>

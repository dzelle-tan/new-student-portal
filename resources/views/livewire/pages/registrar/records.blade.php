<?php
use App\Models\StudentRequest;
use App\Models\DocumentType;
use Illuminate\Database\Eloquent\Collection;

use Livewire\Volt\Component;

new class extends Component {

    public Collection $studentRequests;
    public $modalData;
    public $statusColors;
    public bool $showTable = false;

    public function mount(): void
    {
        // Retrieve the authenticated user
        $this->user = Auth::user();
        $this->studentRequests = StudentRequest::where('student_no', $this->user->student_no)
                                ->with(['documents', 'studentRequestStatus', 'studentRequestMode'])
                                ->get();

        $this->modalData = $this->studentRequests->first();

        $this->statusColors = [
            'Ready' => 'text-green-700',
            'Pending' => 'text-yellow-600',
            'Claimed' => 'text-red-600',
        ];
    }

    public function showRequestInfo($requestId)
    {
        $this->modalData = StudentRequest::with(['documents', 'studentRequestStatus', 'studentRequestMode'])->find($requestId);
        $this->dispatch('open-modal', name : 'request_info');
        $this->showTable = true;
    }
    public function hideTable(): void
    {
        $this->showTable = false;
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
                </tr>
            </thead>
            <tbody>
            @foreach ($studentRequests as $request)
                @foreach ($request->documents as $index => $document)
                    <tr class="text-sm {{ $index === count($request->documents) - 1 ? 'border-b border-gray-200' : '' }} cursor-pointer" title="Click to see full request details" wire:click="showRequestInfo({{ $request->id }})">
                        <td class="px-4 py-3">{{ $document->documentType->document_name }}</td>
                        <td class="px-4 py-3">{{ $document->no_of_copies }}</td>
                        @if ($index === 0)
                            <td class="px-4 py-3">{{ $request->receipt_no }}</td>
                            <td class="px-4 py-3 min-w-[50px] max-w-[200px] whitespace-normal">{{ $request->purpose }}</td>
                            <td class="px-4 py-3">₱{{ $request->total }}</td>
                            <td class="px-4 py-3">{{ date('M d, Y', strtotime($request->expected_release)) }}</td>
                            <td class="px-4 py-3">{{ date('M d, Y', strtotime($request->date_requested)) }}</td>
                            <td class="px-4 py-3 {{ $statusColors[$request->studentRequestStatus->status] ?? 'text-gray-500' }}">{{ $request->studentRequestStatus->status }}</td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
        {{-- Table of Fees --}}
        <div x-data="{ $showTable: false }">
            <!-- Modal -->
            <div x-show="@this.showTable" class="fixed inset-0 z-10 flex items-center justify-center">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                <!-- Modal panel -->
                <div class="relative w-full max-w-screen-md m-4 overflow-hidden bg-white rounded-lg shadow-xl" x-transition:enter="transition ease-out duration-300 transform opacity-0 scale-95" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200 transform opacity-100 scale-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-cloak @click.away="@this.set('showTable', false)">
                    {{-- Header --}}
                    <div class="px-6 py-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Document Details</h3>
                    </div>
                    {{-- Body --}}
                    <div class="max-w-screen-md p-6 overflow-y-auto prose" style="max-height: 70vh; background-color: #fff; border: 1px solid #e2e8f0; border-radius: 0.375rem; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);">
                        <table>
                            <thead class="text-left bg-slate-100">
                                <th class="px-4 py-3 font-medium">Document Name</th>
                                <th class="px-4 py-3 font-medium">No. of Copies</th>
                                <th class="px-4 py-3 font-medium">Amount</th>
                            </thead>
                            <tbody>
                            @foreach ($modalData->documents as $document)
                                <tr class="text-sm border-b border-gray-200">
                                    <td class="px-4 py-3 border-l border-r">{{ $document->documentType->document_name }}</td>
                                    <td class="px-4 py-3 border-l border-r">{{ $document->no_of_copies }}</td>
                                    <td class="px-4 py-3 border-l border-r">₱{{ $document->no_of_copies * $document->documentType->price }}</td>
                                </tr>
                            @endforeach
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Mode of Payment:</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->studentRequestMode->mode }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Purpose:</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->purpose }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Receipt No:</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->receipt_no }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Registrar Name:</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->registrar_name ?? '-' }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Total:</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->total }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Date of Payment:</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->date_of_payment }}</td>
                                </tr>
                                <tr class="text-sm" >
                                    <td class="px-4 py-3 font-medium">Expected Release Date:</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->expected_release }}</td>
                                </tr>
                                @if ($modalData->date_received != null)
                                    <tr class="text-sm">
                                        <td class="px-4 py-3 font-medium">Date Received:</td>
                                        <td class="px-4 py-3 font-medium">{{ $modalData->date_received }}</td>
                                    </tr>
                                @endif
                                <tr class="text-sm">
                                    <td class="px-4 py-3 font-medium">Date Requested:</td>
                                    <td class="px-4 py-3 font-medium">{{ $modalData->date_requested }}</td>
                                </tr>
                            </tbody>
                        </table>    
                    </div>
                    {{-- Footer --}}
                    <div class="flex flex-row justify-end gap-4 p-4 px-4 py-3 bg-gray-50 sm:px-6 align-items">
                        <button type="button" wire:click="hideTable" class="inline-flex justify-center px-4 py-2 text-base font-medium text-white bg-[#4049b1] border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> Close </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

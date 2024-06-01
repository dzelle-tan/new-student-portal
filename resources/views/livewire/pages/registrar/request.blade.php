<?php

use App\Models\DocumentInfo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public $file;
    public $mode = "";
    public $purpose = "";
    public $total = 0;
    public $total_steps = 3;
    public $inputs;
    public $step = 1;
    public $selectedDocument;
    public Collection $documentsInfo;
    public $selectedTerm = "";

    public function mount(): void
    {
        $this->documentsInfo = DocumentInfo::all();

        $this->fill([
            'inputs' => collect([
                [
                    'amount' => 0,
                    'document_info_id' => 0,
                    'document_name' => "",
                    'no_of_copies' => 1,
                    'id' => uniqid(),
                ],
            ]),
        ]);
    }

    public function add()
    {
        $this->validate([
            'inputs.*.document_info_id'=>'required|numeric|min:1|distinct',
            'inputs.*.no_of_copies'=>'required|numeric|min:1',
        ], [
            'inputs.*.document_info_id.required'=>'Select a document first',
            'inputs.*.document_info_id.min'=>'Select a document first',
            'inputs.*.document_info_id.distinct'=>'The same document should not be selected more than once. Increase quantity instead.',
            'inputs.*.no_of_copies.required'=>'The Number of Copies field is required',
            'inputs.*.no_of_copies.numeric'=>'The Number of Copies field must be a number',
            'inputs.*.no_of_copies.min'=>'The Number of Copies field must be at least 1',
        ]);

        $this->inputs = $this->inputs->add([
            'no_of_copies' => 1,
            'document_info_id' => 0,
            'id' => uniqid(),
        ]);
    }

    public function remove($key): void
    {
        $this->inputs->pull($key);
    }

    public function incrementStep()
    {
        $this->validateForm();

            $total = 0;

            $this->inputs = $this->inputs->map(function ($input) use (&$total) {
                $documentDetails = collect($this->documentsInfo)->firstWhere('id', $input['document_info_id']);
                $input['amount'] = $input['no_of_copies'] * $documentDetails->price;
                $input['document_name'] = $documentDetails->document;
                $total += $input['amount'];

                return $input;
            });

            $this->total = $total;
            $this->step ++;
    }

    public function decrementStep()
    {
            $this->step --;
    }

    public function save()
    {
        $this->validateForm();

        $currentYear = date("Y");
        $randomNumber = mt_rand(10000, 99999);
        $receiptNumber = $currentYear . $randomNumber;
        
        $request = auth()->user()->studentRequests()->create([
            'mode' => $this->mode,
            'purpose' => $this->purpose,
            'receipt_no' => $receiptNumber,
            'status' => 'Pending', // Default status
            'total' => $this->total,
            'date_requested' => now(),
            'expected_release' => date('Y-m-d', strtotime('+15 days')),
        ]);

        foreach($this->inputs as $input)
        {
            $request->documents()->create([

                $documentDetails = collect($this->documentsInfo)->firstWhere('id', $input['document_info_id']),
                'amount' => $input['amount'],
                'document_name' => $documentDetails->document,
                'no_of_copies' => $input['no_of_copies'],

            ]);
        }

        $this->step ++;
    }


    public function validateForm()
    {
        if($this->step == 1)
        {
            $this->validate([
                'purpose' => 'required',
                'inputs.*.document_info_id'=>'required|numeric|min:1|distinct',
                'inputs.*.no_of_copies'=>'required|numeric|min:1',
            ], [
                'purpose'=>'Purpose field is required',
                'inputs.*.document_info_id.required'=>'The document name field is required',
                'inputs.*.document_info_id.min'=>'The document name field is required',
                'inputs.*.document_info_id.distinct'=>'The same document should not be selected more than once',
                'inputs.*.no_of_copies.required'=>'The Number of Copies field is required',
                'inputs.*.no_of_copies.numeric'=>'The Number of Copies field must be a number',
                'inputs.*.no_of_copies.min'=>'The Number of Copies field must be at least 1',
            ]);
        }
        elseif($this->step == 2)
        {
            $this->validate([
                'mode'=>'required',
                'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:20480',
            ], [
                'mode.required' => 'The mode of payment field is required',
                'file.required' => 'The file field is required',
                'file.file' => 'The file must be a file',
                'file.mimes' => 'The file must be a file of type: pdf, jpg, jpeg, png',
                'file.max' => 'The file may not be greater than 20MB',
            ]);

            $this->file->store('public\registrar');
            session()->flash('status', 'Document successfully uploaded.');
        }
    }
    public function updateSelectedTerm($value): void
    {
        $this->selectedTerm = $value;
    }

}; ?>

<div>
    {{-- Page/Step Indicator --}}
    <x-progress-bar :step="$step" :descriptions="['Request Form', 'Payment', 'Request Sent!']"/>

    {{-- Main Content --}}
    <div class="p-10 overflow-hidden text-gray-900 bg-white shadow-sm sm:rounded-lg min-h-[38rem] flex justify-center">
        @if($step == 1)
            <div class="w-[40rem] -ml-9">
                <div>
                    <div class="flex items-start justify-between mb-10">
                        <h2 class="text-2xl font-semibold text-gray-700 pl-9">Request Form</h2>
                        <div class="flex space-x-2">
                            <a href="{{ asset('files/OUR-Request-Form.pdf') }}" download class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary">
                                <x-icon name="arrow-down-tray" class="w-5 h-5 mr-2"/>
                                Download
                            </a>
                            {{-- Table of Fees --}}
                            <div x-data="{ showTable: false }">
                                <button class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary" @click="showTable = true">
                                    <x-icon name="table-cells" class="w-5 h-5 mr-2"/>
                                    Table of Fees
                                </button>
                            
                                <!-- Privacy Policy Modal -->
                                <div x-show="showTable" class="fixed inset-0 z-10 flex items-center justify-center">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    <!-- Modal panel -->
                                    <div class="relative w-full max-w-screen-md m-4 overflow-hidden bg-white rounded-lg shadow-xl" x-transition:enter="transition ease-out duration-300 transform opacity-0 scale-95" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200 transform opacity-100 scale-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-cloak @click.away="showTable = false">
                                        {{-- Header --}}
                                        <div class="px-6 py-4">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Table of Fees</h3>
                                        </div>
                                        {{-- Body --}}
                                        <div class="max-w-screen-md p-6 overflow-y-auto prose" style="max-height: 70vh; background-color: #fff; border: 1px solid #e2e8f0; border-radius: 0.375rem; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);">
                                            
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase border-r border-gray-200">
                                                            Document Name
                                                        </th>
                                                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                            Price
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    @foreach ($documentsInfo as $document)
                                                        <tr>
                                                            <td class="px-6 py-4 border-r border-gray-200 whitespace-nowrap">
                                                                <div class="text-sm text-gray-900">{{ $document->document }}</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="text-sm text-gray-500">₱{{ $document->price }}</div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                        {{-- Footer --}}
                                        <div class="flex flex-row justify-end gap-4 p-4 px-4 py-3 bg-gray-50 sm:px-6 align-items">
                                            <button @click="showTable = false" type="button" class="inline-flex justify-center px-4 py-2 text-base font-medium text-white bg-[#4049b1] border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> Close </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <label class="ml-9">Request For</label>
                    @foreach($inputs as $key=>$value)
                        <div class="flex">
                            @if(!$loop->first)
                                <div wire:key="remove-button{{ $key }}">
                                    <button wire:click="remove({{$key}})" class="w-full">
                                        <x-icon name="minus-circle" class="w-5 h-5 mt-3 mr-4 text-gray-500 hover:text-red-700"/>
                                    </button>
                                </div>
                            @endif
                            <div class="mb-2 mr-2">
                                <select class="py-2 overflow-auto w-[28rem] form-control overflow-ellipsis {{ $loop->first ? 'ml-9' : '' }} border-gray-300 rounded-md" wire:model="inputs.{{$key}}.document_info_id">
                                    <option hidden value = "">--- Select a Document ---</option>
                                    @foreach ($documentsInfo as $document)
                                        <option value = "{{ $document->id }}">{{ $document->document }}</option>
                                    @endforeach
                                </select>

                                <x-input-error :messages="$errors->get('inputs.'.$key.'.document_info_id')" class="{{ $loop->first ? 'ml-9' : '' }}" />
                            </div>
                            <div>
                                <x-text-input wire:model="inputs.{{$key}}.no_of_copies" type="number" placeholder="No. of Copies" class="w-[8.9rem]"/>
                                <x-input-error :messages="$errors->get('inputs.'.$key.'.no_of_copies')" class="" />
                            </div>
                        </div>
                    @endforeach
                    <div wire:key="add-button-{{ $key }}">
                        <button wire:click="add" class="flex items-center justify-center text-gray-500 bg-gray-200 rounded w-[37.4rem] ml-9 hover:text-gray-700 hover:bg-gray-300 py-1.5">
                            <x-icon name="plus-circle" class="w-5 h-5 mr-3"/>
                            Add Document
                        </button>
                    </div>
                    <div class="flex flex-col mt-2 ml-9">
                        <label class="mt-8" for="purpose">Purpose of Request</label>
                        <textarea wire:model="purpose" type="text" id="purpose" class="w-[37.4rem] rounded border-gray-400 h-40"></textarea>
                        <x-input-error :messages="$errors->get('purpose')" class="" />
                    </div>
                    <div class="flex justify-end w-[39.5rem] mt-12">
                        <button wire:key="increment-button" wire:click="incrementStep" class="flex items-center mt-8 font-medium underline transition-all duration-100 text-md w-50 text-primary hover:text-secondary hover:scale-110">
                            Next
                            <x-icon name="arrow-long-right" class="w-5 h-5 ml-2"/>
                        </button>
                    </div>
                </div>
                <div class="mr-9">
                    <x-pop-up name="TOF" title="Table of Fees">
                        <x-slot name="body">
                            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                                Table of Fees
                            </div>
                        </x-slot>
                    </x-pop-up>
                </div>
            </div>
        @elseif($step == 2)
            <div class="ml-9 w-[37.4rem]">
                <h2 class="text-2xl font-semibold text-gray-700">Payment</h2>
                <div class="w-full p-2 px-4 mt-4 overflow-x-auto border border-gray-200 rounded shadow">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead>
                            <tr class="text-xs tracking-wider uppercase border-b border-gray-300 border-dashed text-table-header">
                                <th class="px-4 py-3 font-medium">{{_("Document")}}</th>
                                <th class="px-4 py-3 font-medium">{{_("Quantity")}}</th>
                                <th class="px-4 py-3 font-medium">{{_("Amount")}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inputs as $key=>$value)
                                <tr class="text-sm">
                                    <td class="px-4 py-2 max-w-[300px] whitespace-normal">{{ $value['document_name'] }}</td>
                                    <td class="px-4 py-2">{{ $value['no_of_copies'] }}</td>
                                    <td class="px-4 py-2">{{ $value['amount'] }}</td>
                                </tr>
                                @endforeach
                                <tr class="text-sm border-t border-gray-300 border-dashed">
                                    <td class="px-4 py-2 max-w-[300px] whitespace-normal"></td>
                                    <td class="px-4 py-2 text-right">{{_("Total:")}}</td>
                                    <td class="px-4 py-2 font-medium">{{ $total }}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">
                    <label for="paymentMode" class="block text-sm text-gray-700">Mode of Payment</label>
                    <select id="paymentMode" class="w-full border-gray-300 rounded-md form-control" wire:model="mode" wire:change="updateSelectedTerm($event.target.value)">
                        <option hidden value="">--- Select Mode of Payment ---</option>
                        <option value="Landbank">Landbank</option>
                        <option value="University Cashier">University Cashier</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                    </select>
                    <x-input-error :messages="$errors->get('mode')" class="mt-2" />
                </div>
                @if ($selectedTerm == 'Landbank')
                    <div class="mt-4 text-sm">
                        <p>Proceed to any branch of Landbank of the Philippines, secure a deposit slip and fill out the following details:</p>
                        <ul class="pl-6 list-disc">
                            <li>Account Name: Pamantasan ng Lungsod ng Maynila</li>
                            <li>Current Account # 2472-1006-56</li>
                            <li>The total amount to be paid</li>
                        </ul>
                    </div>
                @endif
                {{-- <form wire:submit="validateForm">
                    <label for="proof" class="block text-sm text-gray-700">Upload proof of payment</label>
                    <input wire:model="file" type="file" id="proof"/>
                    <x-input-error :messages="$errors->get('file')" class="mt-2" />
                    </form> --}}
                <p class="block mt-6 text-sm text-gray-700">Proof of payment</p>
                <form class="flex items-center justify-center w-full" wire:submit="validateForm">
                    <label for="proof" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-34 bg-gray-50 hover:bg-gray-100 ">
                        @if ($file)
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <x-icon name="cloud-arrow-up" class="w-8 h-8 mb-4 text-green-500"/>
                                <p class="mb-2 text-sm text-green-500 ">File uploaded successfully!</p>
                                <p class="mb-2 text-sm text-gray-500 ">{{ $file->getClientOriginalName() }}</p>
                                <button type="button" wire:click="$set('file', null)" class="px-4 py-2 mt-2 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">Remove File</button>
                            </div>
                        @else
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <x-icon name="cloud-arrow-up" class="w-8 h-8 mb-4 text-gray-500"/>
                                <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 ">PDF, JPG, JPEG, or PNG (MAX. 20MB)</p>
                            </div>
                        @endif
                        <input wire:model="file" type="file" id="proof" class="hidden" />
                    </label>
                </form>
                <x-input-error :messages="$errors->get('file')" class="mt-2" />
                <div class="flex justify-between mt-12">
                    <button wire:click="decrementStep" class="flex items-center font-medium underline transition-all duration-100 text-md w-50 text-primary hover:text-secondary hover:scale-110">
                        <x-icon name="arrow-long-left" class="w-5 h-5 mr-2"/>
                        Back
                    </button>
                    <button wire:click="save" class="flex items-center font-medium underline transition-all duration-100 text-md w-50 text-primary hover:text-green-500 hover:scale-110">
                        Submit
                        <x-icon name="check-circle" class="w-5 h-5 ml-2"/>
                    </button>
                </div>
            </div>
        @elseif($step == 3)
            <div class="w-[40rem] ml-9">
                <h2 class="flex items-center text-2xl font-medium text-gray-800">
                    {{__("Request Sent!")}}
                    <x-icon name="check-circle" class="w-6 h-6 ml-2 text-green-500"/>
                </h2>
                <p>
                    Kindly wait 5-10 days to process your request. You may go to request records to keep track of your requests. Thank you for your patience.
                    <x-icon name="face-smile" class="inline w-5 h-5 text-gray-700"/>
                </p>
                <p class="mt-10 text-lg font-medium">Reminders</p>
                <ul class="pl-6 list-disc">
                    <li>For follow-ups, you may go to the registrar’s office or email <a href="mailto:registrar@plm.edu.ph" class="text-primary">registrar@plm.edu.ph</a> after 15 working days.</li>
                    <li>For payment concerns, you may email <a href="mailto:payonline@plm.edu.ph" class="text-primary">payonline@plm.edu.ph.</a></li>
                </ul>
            </div>
        @endif
    </div>
    {{-- @if($step > 1 and $step < $total_steps)
        <div class="ml-9">
            <x-primary-button wire:click="decrementStep" class="w-20 mt-8">Back</x-primary-button>
        </div>
    @endif --}}
</div>

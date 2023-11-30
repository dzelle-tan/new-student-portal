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
    public $current_step = 1;
    public $selectedDocument;
    public Collection $documentsInfo;

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

        if ($this->current_step+1 == 2)
        {

            $total = 0;

            $this->inputs = $this->inputs->map(function ($input) use (&$total) {
                $documentDetails = collect($this->documentsInfo)->firstWhere('id', $input['document_info_id']);
                $input['amount'] = $input['no_of_copies'] * $documentDetails->price;
                $input['document_name'] = $documentDetails->document;
                $total += $input['amount'];

                return $input;
            });

            $this->total = $total;
        }

        if ($this->current_step < $this->total_steps)
        {
            $this->current_step ++;
        }
    }

    public function decrementStep()
    {
        if ($this->current_step > 1)
        {
            $this->current_step --;
        }

    }

    public function save()
    {
        $this->validateForm();

        $request = auth()->user()->studentRequests()->create([
            'purpose' => $this->purpose,
            'mode' => $this->mode,
            'total' => $this->total,
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

        $this->current_step ++;
        $this->js("alert('request saved')");
    }


    public function validateForm()
    {
        if($this->current_step == 1)
        {
            $this->validate([
                'purpose' => 'required',
                'inputs.*.document_info_id'=>'required|numeric|min:1',
                'inputs.*.no_of_copies'=>'required|numeric|min:1',
            ], [
                'purpose'=>'Purpose field is required',
                'inputs.*.document_info_id.required'=>'The document name field is required',
                'inputs.*.document_info_id.min'=>'The document name field is required',
                'inputs.*.no_of_copies.required'=>'The Number of Copies field is required',
                'inputs.*.no_of_copies.numeric'=>'The Number of Copies field must be a number',
                'inputs.*.no_of_copies.min'=>'The Number of Copies field must be at least 1',
            ]);
        }
        elseif($this->current_step == 2)
        {
            $this->validate([
                'mode'=>'required',
                'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:20480',
            ], [
                'file.required' => 'The file field is required',
                'file.file' => 'The file must be a file',
                'file.mimes' => 'The file must be a file of type: pdf, jpg, jpeg, png',
                'file.max' => 'The file may not be greater than 20MB',
            ]);

            $this->file->store('public\registrar');
            session()->flash('status', 'Document successfully uploaded.');
        }
    }
}; ?>

<div>
    <div>
        @if($current_step == 1)

            <livewire:pages.registrar.infos/>
            <div>
                Request For
                <div>
                    @foreach($inputs as $key=>$value)
                    @if(!$loop->first)
                        <div wire:key="remove-button{{ $key }}">
                            <x-secondary-button wire:click="remove({{$key}})" class="w-full mt-8">Remove</x-secondary-button>
                        </div>
                    @endif
                        <div>
                            <select class="form-control" wire:model="inputs.{{$key}}.document_info_id">
                                @foreach ($documentsInfo as $document)
                                    <option hidden value = "">--- Select a Document ---</option>
                                    <option option value = "{{ $document->id }}">{{ $document->document }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('inputs.'.$key.'.document_info_id')" class="mt-2" />
                        </div>
                            <div>
                                <x-text-input wire:model="inputs.{{$key}}.no_of_copies" type="text" placeholder="No. of Copies"/>
                                <x-input-error :messages="$errors->get('inputs.'.$key.'.no_of_copies')" class="mt-2" />
                            </div>
                        <div wire:key="add-button-{{ $key }}">
                            <x-secondary-button wire:click="add" class="w-full">Add Document</x-secondary-button>
                        </div>
                    @endforeach
                </div>
                    <x-input-label class="mt-8" for="purpose" :value="__('Purpose')" />
                    <x-text-input wire:model="purpose" type="text" id="purpose" />
                    <x-input-error :messages="$errors->get('purpose')" class="mt-2" />

            </div>
            <div>
                <x-primary-button wire:key="increment-button" wire:click="incrementStep" class="w-20 mt-8">Next</x-primary-button>
            </div>
        @elseif($current_step == 2)

            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Document</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inputs as $key=>$value)
                        {{-- @php
                            dd($value);
                        @endphp --}}
                            <tr>
                                <td>{{ $value['document_name'] }} </td>
                                <td>{{ $value['no_of_copies'] }}</td>
                                <td>{{ $value['amount'] }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Total</td>
                            <td>{{ $total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div>
                <x-info-label>Mode of Payment</x-info-label>
            </div>
            <div>
                <select class="form-control" wire:model="mode">
                        <option hidden value = "">--- Select Mode of Payment ---</option>
                        <option value = "Landbank">Landbank</option>
                        <option value = "University Cashier">University Cashier</option>
                        <option value = "Bank Transfer">Bank Transfer</option>
                </select>
            </div>
            <div>
                <p class="mt-12">Proceed to any branch of Landbank of the Philippines, secure a deposit slip and fill out the following details:</p>
                <p>Account Name: Pamantasan ng Lungsod ng Maynila</p>
                <p>Current Account # 2472-1006-56</p>
                <p>The total amount to be paid</p>
            </div>
            <form wire:submit="validateForm">
                <x-input-label class="form-label" :value="__('File')"/>
                <input wire:model="file" type="file" />
                <x-input-error :messages="$errors->get('file')" class="mt-2" />
            </form>
            <div>
                <x-primary-button wire:click="save" class="w-20 mt-8">Save</x-primary-button>
            </div>
        @elseif($current_step == 3)
            <div>
                YEY!!!
            </div>
        @endif
    </div>
    @if($current_step > 1 and $current_step < $total_steps)
        <div>
            <x-primary-button wire:click="decrementStep" class="w-20 mt-8">Back</x-primary-button>
        </div>
    @endif
</div>

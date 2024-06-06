<div>
    <form wire:submit.prevent="saveNewProgram" class="max-w-lg mx-auto">
        <div class="form-group">
            <label for="selectProgram" class="font-bold">Choose a Program:</label>
            <select wire:model="selectedProgram" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="selectProgram" name="selectedProgram" {{ $isDisabled ? 'disabled' : '' }}>
                <option value="">Select a Program</option>
                @foreach($programs as $program)
                    <option value="{{ $program }}">{{ $program }}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer flex justify-between mt-4">
            <button type="button" class="btn btn-secondary bg-gray-500 text-white px-4 py-2 rounded-md" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded-md" {{ $isDisabled ? 'disabled' : '' }}>Save changes</button>
        </div>
        @if ($message)
            <div class="alert alert-success mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ $message }}
            </div>
        @endif
    </form>
</div>

<div>
    <div x-data="{ dropdownOpenAdd: false, dropdownOpenDrop: false }">
        <div>
            <h1 class="text-black text-2xl font-bold mb-4">Add/Drop Classes</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reason" id="changeClassSchedule"
                            value="The class schedule was changed by the college." wire:model="reason">
                        <label class="form-check-label" for="changeClassSchedule" style="color: black;">
                            The class schedule was changed by the college.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reason" id="subjectsNotIncluded"
                            value="The following subject(s) was not included in my SER." wire:model="reason">
                        <label class="form-check-label" for="subjectsNotIncluded" style="color: black;">
                            The following subject(s) was not included in my SER.
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reason" id="changeStudentSchedule"
                            value="I want to change my schedule." wire:model="reason">
                        <label class="form-check-label" for="changeStudentSchedule" style="color: black;">
                            I want to change my schedule.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reason" id="notProperlyAdvised"
                            value="I was not advised properly by the college adviser." wire:model="reason">
                        <label class="form-check-label" for="notProperlyAdvised" style="color: black;">
                            I was not advised properly by the college adviser.
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="reason" id="others" value="others"
                        wire:model="reason">
                    <label class="form-check-label" for="others" style="color: black;">
                        Others:
                    </label>
                    <input type="text" class="form-control mt-2" wire:model="otherReasons" id="otherReasons"
                        placeholder="Please specify" :disabled="$wire.reason !== 'others'">
                    @error('otherReasons') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            @error('reason') <span class="text-danger">{{ $message }}</span> @enderror

            <h1 class="text-black text-2xl font-bold mt-8 mb-4">Added Classes</h1>
            <!-- Add Class Dropdown -->
            <div class="relative mb-4" style="left: 85%">
                <button type="button" @click="dropdownOpenAdd = !dropdownOpenAdd"
                    class="dropdown-toggle px-4 py-2 bg-gray-200 border border-gray-300 rounded-md"
                    style="width:15%; position:auto;">
                    <span>Add Class</span>
                </button>
                <div x-show="dropdownOpenAdd" @click.outside="dropdownOpenAdd = false"
                    class="dropdown-menu absolute mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto"
                    aria-labelledby="dropdownMenuButton">
                    @foreach($dropdownContent as $class)
                        <a wire:click.prevent="addClass('{{ $class['subject_code'] }}')" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100"
                            href="#">{{ $class['subject_code'] }} - {{ $class['course_name'] }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Added Classes Table -->
            <div class="card mt-4">
                <div class="card-body bg-gray-100 overflow-x-auto">
                    <table class="table bg-white w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-black px-4 py-2">Subject Code</th>
                                <th class="text-black px-4 py-2">Course Name</th>
                                <th class="text-black px-4 py-2">Units</th>
                                <th class="text-black px-4 py-2">Days/Time</th>
                                <th class="text-black px-4 py-2">Room</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($addedClasses as $class)
                                <tr>
                                    <td class="text-black px-4 py-2">{{ $class['subject_code'] }}</td>
                                    <td class="text-black px-4 py-2">{{ $class['course_name'] }}</td>
                                    <td class="text-black px-4 py-2">{{ $class['units'] }}</td>
                                    <td class="text-black px-4 py-2">{{ $class['days_time'] }}</td>
                                    <td class="text-black px-4 py-2">{{ $class['room'] }}</td>
                                    <td class="px-4 py-2">
                                        <button wire:click="removeClass('{{ $class['subject_code'] }}', 'added')"
                                            class="btn btn-danger btn-sm">X</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <h1 class="text-black text-2xl font-bold mt-8 mb-4">Dropped Classes</h1>
            <!-- Drop Class Dropdown -->
            <div class="relative mb-4" style="left: 85%; margin-top: 10px;">
                <button type="button" @click="dropdownOpenDrop = !dropdownOpenDrop"
                    class="dropdown-toggle px-4 py-2 bg-gray-200 border border-gray-300 rounded-md"
                    style="width:15%; position:auto;">
                    <span>Drop Class</span>
                </button>
                <div x-show="dropdownOpenDrop" @click.outside="dropdownOpenDrop = false"
                    class="dropdown-menu absolute mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto"
                    aria-labelledby="dropdownMenuButtonDrop">
                    @foreach($dropdownContent as $class)
                        <a wire:click.prevent="dropClass('{{ $class['subject_code'] }}')" class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100"
                            href="#">{{ $class['subject_code'] }} - {{ $class['course_name'] }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Dropped Classes Table -->
            <div class="card mt-4">
                <div class="card-body bg-gray-100 overflow-x-auto">
                    <table class="table bg-white w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-black px-4 py-2">Subject Code</th>
                                <th class="text-black px-4 py-2">Course Name</th>
                                <th class="text-black px-4 py-2">Units</th>
                                <th class="text-black px-4 py-2">Days/Time</th>
                                <th class="text-black px-4 py-2">Room</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($droppedClasses as $class)
                                <tr>
                                    <td class="text-black px-4 py-2">{{ $class['subject_code'] }}</td>
                                    <td class="text-black px-4 py-2">{{ $class['course_name'] }}</td>
                                    <td class="text-black px-4 py-2">{{ $class['units'] }}</td>
                                    <td class="text-black px-4 py-2">{{ $class['days_time'] }}</td>
                                    <td class="text-black px-4 py-2">{{ $class['room'] }}</td>
                                    <td class="px-4 py-2">
                                        <button wire:click="removeClass('{{ $class['subject_code'] }}', 'dropped')"
                                            class="btn btn-danger btn-sm">X</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer flex justify-end mt-4">
            <button @click="showAddDropModal = false" class="mr-4 px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
            <!-- Save Changes Button -->
            <button class="mr-1 px-4 py-2 bg-blue-600 text-white rounded-md"
                @click="showAddDropConfirmSaveModal = true">Save</button>
                </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div x-show="showAddDropConfirmSaveModal"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10" x-cloak>
        <div class="bg-white p-6 rounded-md w-full max-w-md">
            <div class="modal-header flex justify-between items-center border-b pb-2">
                <h2 class="text-xl font-semibold">Confirm Changes</h2>
                <button @click="showAddDropConfirmSaveModal = false" class="text-gray-600 hover:text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="modal-body mt-4">
                Are you sure you want to save these changes?
            </div>
            <div class="modal-footer flex justify-end mt-4">
                <button  class="mr-4 px-4 py-2 bg-gray-300 rounded-md"
                    @click="showAddDropConfirmSaveModal = false">Cancel</button>
                <button  class="px-4 py-2 bg-blue-600 text-white rounded-md"
                    @click="showAddDropConfirmSaveModal = false; showToast2 = true; setTimeout(() => { showToast2 = false; }, 3000); $wire.saveChanges();">
                    Save Changes</button>
            </div>
        </div>
        <!-- Toast Notification -->
        <div x-show="showToast2" x-transition
            class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-4 px-6 py-4 bg-green-500 text-white rounded-md shadow-md z-50"
            x-cloak>
            Add drop request has been successfully saved.
        </div>
    </div>
</div>

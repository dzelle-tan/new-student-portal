<div x-data="{ showPrivacyPolicy: false }">
    <div class="w-full h-full p-2 pl-3 space-y-3 border-l-4 rounded-md shadow-sm {{ $type === 'face-to-face' ? 'bg-indigo-50 border-primary-light-2 text-primary' : 'bg-amber-50 border-secondary-light-2 text-secondary-dark-1' }}" @click="showPrivacyPolicy = true">
        <p>{{ $time }}</p>
        <div>
            <p>{{ $code }} - {{ $section }}</p>
            <p>{{ $subject }}</p>
        </div>
        <p>{{ $room }}</p>
    </div>

    <!-- Privacy Policy Modal -->
    <div x-show="showPrivacyPolicy" class="fixed inset-0 z-10 flex items-center justify-center">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        <!-- Modal panel -->
        <div class="relative w-full max-w-screen-md m-4 overflow-hidden bg-white rounded-lg shadow-xl" x-transition:enter="transition ease-out duration-300 transform opacity-0 scale-95" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200 transform opacity-100 scale-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-cloak>
            {{-- Header --}}
            <div class="px-6 py-4">
                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $time }}</h3>
            </div>
            {{-- Body --}}
            <div class="max-w-screen-md p-6 overflow-y-auto prose" style="max-height: 70vh; background-color: #fff; border: 1px solid #e2e8f0; border-radius: 0.375rem; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);">
                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $code }}</h3>
                <h2 class="mb-2 text-2xl font-bold">{{ $subject }}</h2>
                <p class="mt-4">In the Operating System (Lab) class, students explore key concepts and hands-on applications of operating systems, covering system processes, memory management, and file systems. Through practical exercises, they gain skills to design and optimize OS, preparing for real-world computer science challenges.</p>
                
                {{-- <h3 class="mb-2 text-lg font-semibold">Details:</h3> --}}
                <div class="m-4 ml-0">
                    <p><span class="font-medium">Credits:</span> 1</p>
                    <p><span class="font-medium">Section:</span> {{ $section }}</p>
                    <p><span class="font-medium">Where:</span> Gusaling Villuegas 311</p>
                    <p><span class="font-medium">Faculty:</span> Prof. Raymund Dioses</p>
                    {{-- <div class="flex items-center">
                        <img class="w-10 h-10 mr-4 rounded-full" src="/images/dioses.jpg" alt="Avatar of User">
                        <div class="text-sm">
                            <p class="leading-none text-gray-900">Raymund Dioses</p>
                            <p class="text-gray-600">rdioses@plm.edu.ph</p>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- Footer --}}
            <div class="flex flex-row justify-end gap-4 p-4 px-4 py-3 bg-gray-50 sm:px-6 align-items">
                <button @click="showPrivacyPolicy = false" type="button" class="inline-flex justify-center px-4 py-2 text-base font-medium text-white bg-[#4049b1] border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> Close </button>
            </div>
        </div>
    </div>
</div>
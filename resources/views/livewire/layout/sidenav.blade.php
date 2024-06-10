<aside class="h-full p-4">
    <ul class="space-y-2 list-none h-[46rem]">
        <a href="{{ route('home') }}" wire:navigate class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-primary-light-1">
            <x-icon name="home" class="w-5 h-5" solid/>
            <span class="flex-1 font-semibold text-left ms-3 rtl:text-right whitespace-nowrap">Home</span>
        </a>
        <li x-data="{ open: true }">
            <button @click="open = !open" type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-primary-light-1">
                <x-icon name="identification" class="w-5 h-5" solid/>
                <span class="flex-1 font-semibold text-left ms-3 rtl:text-right whitespace-nowrap">Information</span>
                <x-icon name="chevron-right" class="w-5 h-5" x-show="!open" solid/>
                <x-icon name="chevron-down" class="w-5 h-5" x-show="open" solid/>
            </button>
            <ul x-show="open" class="py-2 space-y-2">
                <li>
                    <a href="{{ route('classes') }}" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-primary-light-1">Classes</a>
                </li>
                <li>
                    <a href="{{ route('grades') }}" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-primary-light-1">Grades</a>
                </li>
                <li>
                    <a href="{{ route('student_violations') }}" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-primary-light-1">Violations</a>
                </li>
            </ul>
        </li>     
        <li x-data="{ open: true }">
            <button @click="open = !open" type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-primary-light-1">
                <x-icon name="building-office-2" class="w-5 h-5" solid/>
                <span class="flex-1 font-semibold text-left ms-3 rtl:text-right whitespace-nowrap">Services</span>
                <x-icon name="chevron-right" class="w-5 h-5" x-show="!open" solid/>
                <x-icon name="chevron-down" class="w-5 h-5" x-show="open" solid/>
            </button>
            <ul x-show="open" class="py-2 space-y-2">
                <li>
                    <a href="{{ route('enrollment') }}" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-primary-light-1">Enrollment</a>
                </li>
                <li>
                    <a href="{{ route('registrar') }}" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-primary-light-1">Registrar</a>
                </li>
            </ul>
        </li>     
    </ul>
    <a href="#" class="flex w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg ems-center mtflex group hover:bg-gray-100 dark:text-white dark:hover:bg-primary-light-1">
        <x-icon name="arrow-uturn-left" class="w-5 h-5"/>
        <span class="flex-1 text-left ms-3 rtl:text-right whitespace-nowrap">Back to ERP Portal</span>
    </a>
</aside>
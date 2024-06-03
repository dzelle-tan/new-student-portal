<div>
    <div x-data="{ dropdownOpen1: false, dropdownOpen2: false }">
        <div id="2nd-year-tables">
            <h1 class="text-black text-2xl font-bold mb-4">2nd Year 1st Semester</h1>
            <div class="relative mb-4">
                <button type="button" @click="dropdownOpen1 = !dropdownOpen1"
                    class="dropdown-toggle px-4 py-2 bg-gray-200 border border-gray-300 rounded-md"
                    style="width:15%; position:auto;">
                    <span>Add Class</span>
                </button>
                <div x-show="dropdownOpen1" @click.outside="dropdownOpen1 = false"
                    class="dropdown-menu absolute mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto"
                    aria-labelledby="dropdownMenuButton">
                    @foreach($dropdownContent2_1 as $course)
                        @if(is_object($course))
                            <a wire:click.prevent="moveRowFromDropdownToTable('{{ $course->course_code }}', 'tableBody')"
                                class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                href="#">{{ $course->course_code }} - {{ $course->course_name }}</a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body bg-gray-100 overflow-x-auto">
                    <table class="table bg-white w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-black px-4 py-2">Course Code</th>
                                <th class="text-black px-4 py-2">Course Name</th>
                                <th class="text-black px-4 py-2">Units</th>
                                <th class="text-black px-4 py-2">Pre(Co)-Requisites</th>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($courses as $course)
                                                        @php
                                                            $preRequisiteGrade = $this->getPrerequisiteGrade($course->pre_requisites);
                                                            $grade = $this->getCourseGrade($course->course_code);
                                                            $preRequisites = explode(',', $course->pre_requisites);
                                                            $preReqCheck = '';
                                                            if ($preRequisiteGrade !== 5) {
                                                                foreach ($preRequisites as $preReq) {
                                                                    if (strpos($preReq, 'Standing') !== false || $preReq === '') {
                                                                        continue;
                                                                    }
                                                                    if (!in_array(trim($preReq), $displayedCourseCodes)) {
                                                                        $preReqCheck = 'Pre-requisite not found';
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        @if (
                                                                ($course->year_lvl === 2 && $course->sem === 1) ||
                                                                ($course->year_lvl === 1 && $course->sem === 1 && $course->grades === 5)
                                                            )
                                                                                    @if ($preRequisiteGrade !== 5)
                                                                                        <tr id="row_{{ $course->id }}">
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_code }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_name }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->units }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->pre_requisites }}</td>
                                                                                            <td class="text-red-500 px-4 py-2">{{ $preReqCheck }}</td>
                                                                                            <td class="px-4 py-2">
                                                                                                <button
                                                                                                    wire:click="moveRowToDropdown({{ $course->id }}, 'tableBody', '{{ $tableBodyId }}')"
                                                                                                    class="btn btn-danger btn-sm">X</button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                        @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                <span id="totalUnits21">
                    {{ $totalUnits21 }}
                    @if ($totalUnits21 < 10)
                        <span
                            class="inline-block px-3 py-1 text-sm font-semibold text-green-700 bg-green-200 rounded-full">Underload</span>
                    @elseif ($totalUnits21 >= 10 && $totalUnits21 <= 13)
                        <span
                            class="inline-block px-3 py-1 text-sm font-semibold text-blue-700 bg-blue-200 rounded-full">Normal
                            Load</span>
                    @else
                        <span
                            class="inline-block px-3 py-1 text-sm font-semibold text-red-700 bg-red-200 rounded-full">Overload</span>
                    @endif
                </span>
            </div>

            <h1 class="text-black text-2xl font-bold mt-8 mb-4">2nd Year 2nd Semester</h1>
            <div class="relative mb-4">
                <button type="button" @click="dropdownOpen2 = !dropdownOpen2"
                    class="dropdown-toggle px-4 py-2 bg-gray-200 border border-gray-300 rounded-md"
                    style="width:15%; position:auto;">
                    <span>Add Class</span>
                </button>
                <div x-show="dropdownOpen2" @click.outside="dropdownOpen2 = false"
                    class="dropdown-menu absolute mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto"
                    aria-labelledby="dropdownMenuButton">
                    @foreach($dropdownContent2_2 as $course)
                        @if(is_object($course))
                            <a wire:click.prevent="moveRowFromDropdownToTable('{{ $course->course_code }}', 'tableBody22')"
                                class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                href="#">{{ $course->course_code }} - {{ $course->course_name }}</a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body bg-gray-100 overflow-x-auto ">
                    <table class="table bg-white w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-black px-4 py-2">Course Code</th>
                                <th class="text-black px-4 py-2">Course Name</th>
                                <th class="text-black px-4 py-2">Units</th>
                                <th class="text-black px-4 py-2">Pre(Co)-Requisites</th>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody22">
                            @foreach ($courses as $course)
                                                        @php
                                                            $preRequisiteGrade = $this->getPrerequisiteGrade($course->pre_requisites);
                                                            $grade = $this->getCourseGrade($course->course_code);
                                                            $preRequisites = explode(',', $course->pre_requisites);
                                                            $preReqCheck = '';
                                                            if ($preRequisiteGrade !== 5) {
                                                                foreach ($preRequisites as $preReq) {
                                                                    if (strpos($preReq, 'Standing') !== false || $preReq === '') {
                                                                        continue;
                                                                    }
                                                                    if (!in_array(trim($preReq), $displayedCourseCodes)) {
                                                                        $preReqCheck = 'Pre-requisite not found';
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        @if (
                                                                ($course->year_lvl === 2 && $course->sem === 2) ||
                                                                ($course->year_lvl === 1 && $course->sem === 2 && $course->grades === 5)
                                                            )
                                                                                    @if ($preRequisiteGrade !== 5)
                                                                                        <tr id="row_{{ $course->id }}">
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_code }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_name }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->units }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->pre_requisites }}</td>
                                                                                            <td class="text-red-500 px-4 py-2">{{ $preReqCheck }}</td>
                                                                                            <td class="px-4 py-2">
                                                                                                <button
                                                                                                    wire:click="moveRowToDropdown({{ $course->id }}, 'tableBody22', '{{ $tableBodyId }}')"
                                                                                                    class="btn btn-danger btn-sm">X</button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                        @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                <span id="totalUnits22">
                    {{ $totalUnits22 }}
                    @if ($totalUnits22 < 10)
                        <span
                            class="inline-block px-3 py-1 text-sm font-semibold text-green-700 bg-green-200 rounded-full">Underload</span>
                    @elseif ($totalUnits22 >= 10 && $totalUnits22 <= 13)
                        <span
                            class="inline-block px-3 py-1 text-sm font-semibold text-blue-700 bg-blue-200 rounded-full">Normal
                            Load</span>
                    @else
                        <span
                            class="inline-block px-3 py-1 text-sm font-semibold text-red-700 bg-red-200 rounded-full">Overload</span>
                    @endif
                </span>
            </div>
        </div>
    </div>


    <div x-data="{ dropdownOpen1: false, dropdownOpen2: false }">
        <div id="3rd-year-tables">
            <h1 class="text-black text-2xl font-bold mb-4">3rd Year 1st Semester</h1>
            <div class="relative mb-4">
                <button type="button" @click="dropdownOpen1 = !dropdownOpen1"
                    class="dropdown-toggle px-4 py-2 bg-gray-200 border border-gray-300 rounded-md"
                    style="width:15%; position:auto;">
                    <span>Add Class</span>
                </button>
                <div x-show="dropdownOpen1" @click.outside="dropdownOpen1 = false"
                    class="dropdown-menu absolute mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto"
                    aria-labelledby="dropdownMenuButton">
                    @foreach($dropdownContent3_1 as $course)
                        @if(is_object($course))
                            <a wire:click.prevent="moveRowFromDropdownToTable('{{ $course->course_code }}', 'tableBody32')"
                                class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                href="#">{{ $course->course_code }} - {{ $course->course_name }}</a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body bg-gray-100 overflow-x-auto ">
                    <table class="table bg-white w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-black px-4 py-2">Course Code</th>
                                <th class="text-black px-4 py-2">Course Name</th>
                                <th class="text-black px-4 py-2">Units</th>
                                <th class="text-black px-4 py-2">Pre(Co)-Requisites</th>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody32">
                            @foreach ($courses as $course)
                                                        @php
                                                            $preRequisiteGrade = $this->getPrerequisiteGrade($course->pre_requisites);
                                                            $grade = $this->getCourseGrade($course->course_code);
                                                            $preRequisites = explode(',', $course->pre_requisites);
                                                            $preReqCheck = '';
                                                            if ($preRequisiteGrade !== 5) {
                                                                foreach ($preRequisites as $preReq) {
                                                                    if (strpos($preReq, 'Standing') !== false || $preReq === '') {
                                                                        continue;
                                                                    }
                                                                    if (!in_array(trim($preReq), $displayedCourseCodes)) {
                                                                        $preReqCheck = 'Pre-requisite not found';
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        @if (
                                                                ($course->year_lvl === 3 && $course->sem === 1) ||
                                                                ($course->year_lvl === 2 && $course->sem === 1 && $course->grades === 5)
                                                            )
                                                                                    @if ($preRequisiteGrade !== 5)
                                                                                        <tr id="row_{{ $course->id }}">
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_code }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_name }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->units }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->pre_requisites }}</td>
                                                                                            <td class="text-red-500 px-4 py-2">{{ $preReqCheck }}</td>
                                                                                            <td class="px-4 py-2">
                                                                                                <button
                                                                                                    wire:click="moveRowToDropdown({{ $course->id }}, 'tableBody32', '{{ $tableBodyId }}')"
                                                                                                    class="btn btn-danger btn-sm">X</button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                        @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <span id="totalUnits32">
                {{ $totalUnits32 }}
                @if ($totalUnits32 < 10)
                    <span class="badge badge-success">Underload</span>
                @elseif ($totalUnits32 >= 10 && $totalUnits32 <= 13)
                    <span class="badge badge-primary">Normal Load</span>
                @else
                    <span class="badge badge-danger">Overload</span>
                @endif
            </span>

            <h1 class="text-black text-2xl font-bold mt-8 mb-4">3rd Year 2nd Semester</h1>
            <div class="relative mb-4">
                <button type="button" @click="dropdownOpen2 = !dropdownOpen2"
                    class="dropdown-toggle px-4 py-2 bg-gray-200 border border-gray-300 rounded-md"
                    style="width:15%; position:auto;">
                    <span>Add Class</span>
                </button>
                <div x-show="dropdownOpen2" @click.outside="dropdownOpen2 = false"
                    class="dropdown-menu absolute mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto"
                    aria-labelledby="dropdownMenuButton">
                    @foreach($dropdownContent3_2 as $course)
                        @if(is_object($course))
                            <a wire:click.prevent="moveRowFromDropdownToTable('{{ $course->course_code }}', 'tableBody42')"
                                class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                href="#">{{ $course->course_code }} - {{ $course->course_name }}</a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body bg-gray-100 overflow-x-auto ">
                    <table class="table bg-white w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-black px-4 py-2">Course Code</th>
                                <th class="text-black px-4 py-2">Course Name</th>
                                <th class="text-black px-4 py-2">Units</th>
                                <th class="text-black px-4 py-2">Pre(Co)-Requisites</th>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody42">
                            @foreach ($courses as $course)
                                                        @php
                                                            $preRequisiteGrade = $this->getPrerequisiteGrade($course->pre_requisites);
                                                            $grade = $this->getCourseGrade($course->course_code);
                                                            $preRequisites = explode(',', $course->pre_requisites);
                                                            $preReqCheck = '';
                                                            if ($preRequisiteGrade !== 5) {
                                                                foreach ($preRequisites as $preReq) {
                                                                    if (strpos($preReq, 'Standing') !== false || $preReq === '') {
                                                                        continue;
                                                                    }
                                                                    if (!in_array(trim($preReq), $displayedCourseCodes)) {
                                                                        $preReqCheck = 'Pre-requisite not found';
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        @if (
                                                                ($course->year_lvl === 3 && $course->sem === 2) ||
                                                                ($course->year_lvl === 2 && $course->sem === 2 && $grade === 5)
                                                            )
                                                                                    @if ($preRequisiteGrade !== 5)
                                                                                        <tr id="row_{{ $course->id }}">
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_code }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_name }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->units }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->pre_requisites }}</td>
                                                                                            <td class="text-red-500 px-4 py-2">{{ $preReqCheck }}</td>
                                                                                            <td class="px-4 py-2">
                                                                                                <button
                                                                                                    wire:click="moveRowToDropdown({{ $course->id }}, 'tableBody42', '{{ $tableBodyId }}')"
                                                                                                    class="btn btn-danger btn-sm">X</button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                        @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <span id="totalUnits42">
                {{ $totalUnits42 }}
                @if ($totalUnits42 < 10)
                    <span class="badge badge-success">Underload</span>
                @elseif ($totalUnits42 >= 10 && $totalUnits42 <= 13)
                    <span class="badge badge-primary">Normal Load</span>
                @else
                    <span class="badge badge-danger">Overload</span>
                @endif
            </span>
        </div>
    </div>

    <div x-data="{ dropdownOpen1: false, dropdownOpen2: false }">
        <div id="4th-year-tables">
            <h1 class="text-black text-2xl font-bold mb-4">4th Year 1st Semester</h1>
            <div class="relative mb-4">
                <button type="button" @click="dropdownOpen1 = !dropdownOpen1"
                    class="dropdown-toggle px-4 py-2 bg-gray-200 border border-gray-300 rounded-md"
                    style="width:15%; position:auto;">
                    <span>Add Class</span>
                </button>
                <div x-show="dropdownOpen1" @click.outside="dropdownOpen1 = false"
                    class="dropdown-menu absolute mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto"
                    aria-labelledby="dropdownMenuButton">
                    @foreach($dropdownContent4_1 as $course)
                        @if(is_object($course))
                            <a wire:click.prevent="moveRowFromDropdownToTable('{{ $course->course_code }}', 'tableBody72')"
                                class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                href="#">{{ $course->course_code }} - {{ $course->course_name }}</a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body bg-gray-100 overflow-x-auto ">
                    <table class="table bg-white w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-black px-4 py-2">Course Code</th>
                                <th class="text-black px-4 py-2">Course Name</th>
                                <th class="text-black px-4 py-2">Units</th>
                                <th class="text-black px-4 py-2">Pre(Co)-Requisites</th>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody72">
                            @foreach ($courses as $course)
                                                        @php
                                                            $preRequisiteGrade = $this->getPrerequisiteGrade($course->pre_requisites);
                                                            $grade = $this->getCourseGrade($course->course_code);
                                                            $preRequisites = explode(',', $course->pre_requisites);
                                                            $preReqCheck = '';
                                                            if ($preRequisiteGrade !== 5) {
                                                                foreach ($preRequisites as $preReq) {
                                                                    if (strpos($preReq, 'Standing') !== false || $preReq === '') {
                                                                        continue;
                                                                    }
                                                                    if (!in_array(trim($preReq), $displayedCourseCodes)) {
                                                                        $preReqCheck = 'Pre-requisite not found';
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        @if (
                                                                ($course->year_lvl === 4 && $course->sem === 1) ||
                                                                ($course->year_lvl === 3 && $course->sem === 1 && $preRequisiteGrade === 5)
                                                            )
                                                                                    @if ($preRequisiteGrade !== 5 || $preRequisiteGrade === 5)
                                                                                        <tr id="row_{{ $course->id }}">
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_code }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_name }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->units }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->pre_requisites }}</td>
                                                                                            <td class="text-red-500 px-4 py-2">{{ $preReqCheck }}</td>
                                                                                            <td class="px-4 py-2">
                                                                                                <button
                                                                                                    wire:click="moveRowToDropdown({{ $course->id }}, 'tableBody72', '{{ $tableBodyId }}')"
                                                                                                    class="btn btn-danger btn-sm">X</button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                        @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <span id="totalUnits72">
                {{ $totalUnits72 }}
                @if ($totalUnits72 < 10)
                    <span class="badge badge-success">Underload</span>
                @elseif ($totalUnits72 >= 10 && $totalUnits72 <= 13)
                    <span class="badge badge-primary">Normal Load</span>
                @else
                    <span class="badge badge-danger">Overload</span>
                @endif
            </span>

            <h1 class="text-black text-2xl font-bold mt-8 mb-4">4th Year 2nd Semester</h1>
            <div class="relative mb-4">
                <button type="button" @click="dropdownOpen2 = !dropdownOpen2"
                    class="dropdown-toggle px-4 py-2 bg-gray-200 border border-gray-300 rounded-md"
                    style="width:15%; position:auto;">
                    <span>Add Class</span>
                </button>
                <div x-show="dropdownOpen2" @click.outside="dropdownOpen2 = false"
                    class="dropdown-menu absolute mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg max-h-48 overflow-y-auto"
                    aria-labelledby="dropdownMenuButton">
                    @foreach($dropdownContent4_2 as $course)
                        @if(is_object($course))
                            <a wire:click.prevent="moveRowFromDropdownToTable('{{ $course->course_code }}', 'tableBody62')"
                                class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                href="#">{{ $course->course_code }} - {{ $course->course_name }}</a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body bg-gray-100 overflow-x-auto ">
                    <table class="table bg-white w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-black px-4 py-2">Course Code</th>
                                <th class="text-black px-4 py-2">Course Name</th>
                                <th class="text-black px-4 py-2">Units</th>
                                <th class="text-black px-4 py-2">Pre(Co)-Requisites</th>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody62">
                            @foreach ($courses as $course)
                                                        @php
                                                            $preRequisiteGrade = $this->getPrerequisiteGrade($course->pre_requisites);
                                                            $grade = $this->getCourseGrade($course->course_code);
                                                            $preRequisites = explode(',', $course->pre_requisites);
                                                            $preReqCheck = '';
                                                            if ($preRequisiteGrade !== 5) {
                                                                foreach ($preRequisites as $preReq) {
                                                                    if (strpos($preReq, 'Standing') !== false || $preReq === '') {
                                                                        continue;
                                                                    }
                                                                    if (!in_array(trim($preReq), $displayedCourseCodes)) {
                                                                        $preReqCheck = 'Pre-requisite not found';
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        @if (
                                                                ($course->year_lvl === 4 && $course->sem === 2) ||
                                                                ($course->year_lvl === 3 && $course->sem === 2 && $preRequisiteGrade === 5) ||
                                                                ($course->year_lvl === 3 && $course->sem === 2 && $course->grades === 5) ||
                                                                ($course->year_lvl === 2 && $course->sem === 2 && $grade === 5)
                                                            )
                                                                                    @if ($preRequisiteGrade !== 5 || $preRequisiteGrade === 5)
                                                                                        <tr id="row_{{ $course->id }}">
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_code }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->course_name }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->units }}</td>
                                                                                            <td class="text-black px-4 py-2">{{ $course->pre_requisites }}</td>
                                                                                            <td class="text-red-500 px-4 py-2">{{ $preReqCheck }}</td>
                                                                                            <td class="px-4 py-2">
                                                                                                <button
                                                                                                    wire:click="moveRowToDropdown({{ $course->id }}, 'tableBody62', '{{ $tableBodyId }}')"
                                                                                                    class="btn btn-danger btn-sm">X</button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                        @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <span id="totalUnits62">
                {{ $totalUnits62 }}
                @if ($totalUnits62 < 10)
                    <span class="badge badge-success">Underload</span>
                @elseif ($totalUnits62 >= 10 && $totalUnits62 <= 13)
                    <span class="badge badge-primary">Normal Load</span>
                @else
                    <span class="badge badge-danger">Overload</span>
                @endif
            </span>
        </div>
    </div>

    <br>
    <div class="modal-footer flex justify-end mt-4">
        <button @click="showModal = false" class="mr-4 px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
        <button @click="showConfirmSaveModal = true" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save</button>
    </div>

    <!-- Confirmation Save Modal -->
    <div x-show="showConfirmSaveModal"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
        <div class="bg-white p-6 rounded-md w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Confirm Save</h2>
            <p class="mb-4">Are you sure you want to save changes to your study plan?</p>
            <div class="flex justify-end">
                <button @click="showConfirmSaveModal = false"
                    class="mr-4 px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
                <button
                    @click="showConfirmSaveModal = false; showToast = true; setTimeout(() => { showToast = false; showModal = false; }, 3000); $wire.pushCourseCodes();"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md">Confirm</button>

            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div x-show="showToast" x-transition
        class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-4 px-6 py-4 bg-green-500 text-white rounded-md shadow-md z-50"
        x-cloak>
        Study plan has been successfully saved. You can now proceed to submission of documents.
    </div>
</div>
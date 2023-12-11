@props(['name', 'title'])

<div x-data="{ show : false , name : '{{ $name }}' }"
    x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)"
    x-on:close-modal.window="show = false"
    x-on:keydown.escape.window="show = false"

    style="display:none;"

    class="fixed inset-0 z-50" x-transition.duration>
    {{-- Gray Background --}}
    <div x-on:click="show = false" class="fixed inset-0 bg-gray-700 opacity-90"></div>

    {{-- Modal Body --}}
    <div class="fixed inset-0 max-w-6xl m-auto overflow-y-auto bg-white rounded" style="max-height:500px">
        <div>
            <x-secondary-button x-on:click="$dispatch('close-modal')" class="absolute top-0 right-0 mt-4 mr-4">X</x-secondary-button>
        </div>
        <div>{{$body}}</div>
    </div>
</div>

<div class="w-full h-full p-2 pl-3 space-y-3 text-white rounded-md {{ $type === 'face-to-face' ? 'bg-primary' : 'bg-secondary' }}"">
    <p>{{ $time }}</p>
    <div>
        <p>{{ $code }} - {{ $section }}</p>
        <p>{{ $subject }}</p>
    </div>
    <p>{{ $room }}</p>
</div>
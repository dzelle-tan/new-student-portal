<div class="w-full h-full p-2 pl-3 space-y-3 border-l-4 rounded-md shadow-sm {{ $type === 'face-to-face' ? 'bg-indigo-50 border-primary-light-2 text-primary' : 'bg-amber-50 border-secondary-light-2 text-secondary-dark-1' }}">
    <p>{{ $time }}</p>
    <div>
        <p>{{ $code }} - {{ $section }}</p>
        <p>{{ $subject }}</p>
    </div>
    <p>{{ $room }}</p>
</div>
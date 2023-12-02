<?php

use Livewire\Volt\Component;
use Illuminate\Foundation\Inspiring;

new class extends Component {
    //
}; ?>
@php
    $quote = strip_tags(Inspiring::quote());
    $parts = explode(" — ", $quote);
    if (count($parts) >= 2) {
        list($quoteText, $author) = $parts;
    } else {
        $quoteText = $quote;
        $author = 'Unknown';
    }
@endphp
<div>
    <h3 class="mb-4 text-lg font-medium">{{ __("Quote of the Day")}}</h3>
    <p>{{ $quoteText }}</p>
    <p class="mt-4 text-gray-500">— {{ $author }}</p>
</div>

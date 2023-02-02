@props(['name'])

@php
    
    $backBtn = 'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700  hover:bg-gray-600 bg-gray-700 rounded text-white px-4  py-1 text-xs sm:text-sm ';
    
@endphp


<button {{ $attributes->merge(['class' => $backBtn]) }}>
    {{ $name }}
</button>


{{-- can use switch state for many btn --}}

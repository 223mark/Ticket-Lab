@php
    $class = 'w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700';
    
@endphp
<input {{ $attributes->merge(['class' => $class]) }} />

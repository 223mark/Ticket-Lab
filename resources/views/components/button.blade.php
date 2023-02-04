@props(['name'])

@php
    $defaultBtn = 'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-700  hover:bg-teal-600 bg-teal-600 rounded text-white px-4  py-2 text-xs sm:text-sm ';
    $backBtn = 'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700  hover:bg-gray-600 bg-gray-700 rounded text-white px-4  py-1 text-xs sm:text-sm ';
    
    $updateBtn = 'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700  hover:bg-green-600 bg-green-700 rounded text-white px-4  py-2 text-xs sm:text-sm ';
    
    $addBtn = 'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700  hover:bg-indigo-600 bg-indigo-700 rounded text-white px-4  py-2 text-xs sm:text-sm ';
    
    $cancelBtn = 'focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 text-gray-600  hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm ';
    
    $deleteBtn = 'focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-red-400 ml-3 bg-red-500 text-white  hover:border-red-400 hover:bg-red-300 border rounded px-8 py-2 text-sm ';
    
@endphp


@switch($name)
    @case('Back')
        <button {{ $attributes->merge(['class' => $backBtn]) }}>
            {{ $name }}
        </button>
    @break

    @case('Update')
        <button {{ $attributes->merge(['class' => $updateBtn]) }}>
            {{ $name }}
        </button>
    @break

    @case('Cancel')
        <button {{ $attributes->merge(['class' => $cancelBtn]) }}>
            {{ $name }}
        </button>
    @break

    @case('Add')
        <button {{ $attributes->merge(['class' => $addBtn]) }}>
            {{ $name }}
        </button>
    @break

    @case('Delete')
        <button {{ $attributes->merge(['class' => $deleteBtn]) }}>
            {{ $name }}
        </button>
    @break

    @default
        <button {{ $attributes->merge(['class' => $defaultBtn]) }}>
            {{ $name }}
        </button>
@endswitch

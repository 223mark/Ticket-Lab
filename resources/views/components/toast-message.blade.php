@php
    $addToastClass = 'text-white font-semibold text-center bg-green-500 px-6 py-2 captalize rounded';
    $deleteToastClass = 'text-white font-semibold text-center bg-red-500 px-6 py-2 captalize rounded';
    $updatedClass = 'text-white font-semibold text-center bg-indigo-500 px-6 py-2 captalize rounded';
@endphp



<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
    class="   w-68  fixed top-5 left-1/2 transform -translate-x-1/2 z-50">
    <div class="flex justify-between items-center">

        @switch($slot)
            @case('add')
                <p {{ $attributes->merge(['class' => $addToastClass]) }}>
                    {{ Session::get('addMessage') }}
                </p>
            @break

            @case('delete')
                <p {{ $attributes->merge(['class' => $deleteToastClass]) }}>
                    {{ Session::get('deleteMessage') }}
                </p>
            @break

            @case('update')
                <p {{ $attributes->merge(['class' => $updatedClass]) }}>
                    {{ Session::get('updateMessage') }}
                </p>
            @break

            @default
                <p {{ $attributes->merge(['class' => $deleteToastClass]) }}>
                    {{ Session::get('unvalidMessage') }}
                </p>
        @endswitch
    </div>

</div>

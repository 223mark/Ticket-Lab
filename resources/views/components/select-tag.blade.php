@props(['data', 'filterText'])

@php
    $class = 'w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700';
@endphp

@if ($filterText == 'location')
    <select {{ $attributes->merge(['class' => $class]) }}>
        <option value="">Choose Location</option>
        @foreach ($data as $l)
            <option value="{{ $l->location }}">{{ $l->location }}</option>
        @endforeach
    </select>
@endif

@if ($filterText == 'operator')
    <select {{ $attributes->merge(['class' => $class, 'name' => 'operatorId']) }}>
        <option value="">Choose Operator</option>
        @foreach ($data as $op)
            <option value="{{ $op->id }}">{{ $op->operator_name }}</option>
        @endforeach
    </select>
@endif

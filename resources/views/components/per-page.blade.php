@php
    $value = [2, 5, 10, 15, 20];
@endphp

<select name="perPage" class=" py-1 border-2 focus:border-indigo-500 ">
    <option value="">per page</option>
    @foreach ($value as $v)
        <option value="{{ $v }}">{{ $v }}</option>
    @endforeach

</select>
<x-button name="Set"></x-button>

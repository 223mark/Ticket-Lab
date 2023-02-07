@props(['data'])
<select id="sortingByOperator">
    <option value="all">All Operators</option>
    @foreach ($data as $data)
        <option value="{{ $data->id }}">{{ $data->operator_name }}</option>
    @endforeach

</select>

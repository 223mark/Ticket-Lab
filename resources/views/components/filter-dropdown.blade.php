@props(['data'])
<select id="sortingByOperator">
    <option value="">Select Operator</option>
    @foreach ($data as $data)
        <option value="{{ $data->id }}">{{ $data->operator_name }}</option>
    @endforeach

</select>

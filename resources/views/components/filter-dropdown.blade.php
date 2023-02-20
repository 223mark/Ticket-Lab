@props(['data'])
<select id="sortingByOperator"
    class="w-full rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">
    <option value="all">All Operators</option>
    @foreach ($data as $data)
        <option value="{{ $data->id }}">{{ $data->operator_name }}</option>
    @endforeach

</select>

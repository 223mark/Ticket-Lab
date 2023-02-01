<x-add-modal-layout>
    <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('buses#store') }}" enctype="multipart/form-data"
        method="POST">
        @csrf
        <div class=" flex flex-wrap justify-between gap-2 ">
            <div class="w-full md:w-2/5 ">
                <label class="block mb-2 text-md font-semibold text-indigo-500" for="busNumber">
                    The Operators
                </label>
                <select name="operatorId"
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700">
                    <option value="">Choose Operator</option>
                    @foreach ($operators as $operator)
                        <option value="{{ $operator->id }}">{{ $operator->operator_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full md:w-2/5 ">
                <label class="block mb-2 text-md font-semibold text-indigo-500" for="busNumber">
                    Bus Number
                </label>
                <input
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                    id="busNumber" type="text" name="busNumber" value="{{ old('busNumber') }}"
                    placeholder="Enter Bus Number" />
            </div>
            <div class="w-full md:w-2/5 ">
                <label class="block mb-2 text-md font-semibold text-indigo-500" for="operator_name">
                    Status
                </label>
                <input
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                    id="operator_name" type="text"name="status" value="{{ old('operatorName') }}"
                    placeholder="Operator Name" />
            </div>
            <div class="w-full md:w-2/5 ">
                <label class="block mb-2 text-md font-semibold text-indigo-500" for="driverName">
                    Drvier Name
                </label>
                <input
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                    id="driverName" type="text" name="driverName" value="{{ old('driverName') }}"
                    placeholder="Enter Driver Name" />
            </div>
            <div class=" w-full md:w-2/5 ">
                <label class="block mb-2 text-md font-semibold text-indigo-500" for="operator_name">
                    Bus Seat Total
                </label>
                <select name="totalSeat" id=""
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700">
                    <option value="">Choose Bus Seat</option>
                    <option value="24">24 / TwentyFour</option>
                    <option value="30">30 / TwentyFour</option>
                </select>
            </div>
            <div class=" w-full md:w-2/5 ">
                <label for="address" class="block mb-2 text-md font-semibold text-indigo-500">Bus Image</label>
                <input type="file" name="img" id=""
                    class="w-full p-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700">
            </div>
            <div class="flex items-center justify-start w-full">
                <button
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Add</button>
                <button
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm modalHandler"
                    onclick="modalHandler()">Cancel</button>
            </div>

        </div>
    </form>
</x-add-modal-layout>

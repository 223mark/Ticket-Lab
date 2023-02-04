<x-main-layout title="Create Tickets">
    <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('tickets#store') }}" enctype="multipart/form-data"
        method="POST">
        @csrf
        <div class=" flex flex-wrap justify-between gap-2 ">

            <div class="w-full md:w-2/5 ">
                <x-input-label labelName="Total Ticket" />

                <select name="totalTicket" id=""
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700">
                    <option value="">Choose Amount</option>
                    <option value="24">24 / TwentyFour</option>
                    <option value="30">30 / TwentyFour</option>
                </select>
            </div>
            <div class="w-full md:w-2/5 hidden ">
                <x-input-label labelName="Route Id" />
                <x-input-tag name="routeId" value="{{ $routeId }}" />

            </div>
            <div class="w-full md:w-2/5 ">

                <x-input-label labelName="Related Operator" />

                <x-select-tag :data=$operators filterText="operator" />

            </div>

            <div class="w-full ">
                <x-input-label labelName="Pick Date" />

                <x-input-tag type="date" name="date" value="{{ old('date') }}" />

            </div>

            <div class="flex items-center justify-start w-full">
                <button
                    class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                    type="submit">Add</button>
                <a href="{{ route('busRoutes#index') }}">
                    <button
                        class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                        type="button">Cancel</button>
                </a>
            </div>

        </div>
    </form>



</x-main-layout>

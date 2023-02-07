<x-main-layout title="Routes/Edit">

    <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('busRoutes#update', $route->id) }}" method="POST">
        @csrf
        <div class=" flex flex-wrap justify-between gap-2 ">
            <div class="w-full md:w-2/5 ">
                <x-input-label labelName="From Where" />
                <x-select-tag :data=$location filterText="location" name="fromWhere" />

            </div>
            <div class="w-full md:w-2/5 ">
                <x-input-label labelName="To Where" />
                <x-select-tag :data=$location filterText="location" name="toWhere" />
            </div>
            <div class=" w-full md:w-2/5 ">
                <x-input-label labelName="Price" />
                <x-input-tag type="text" name="price" value="{{ $route->price }}" />

            </div>
            <div class="w-full md:w-2/5 ">
                <x-input-label labelName="Class" />

                <select name="class" id=""
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700 capitalize">
                    <option value="{{ $route->class }}" selected>{{ $route->class }}</option>
                    <option value="normal">Normal Ticket</option>
                    <option value="vip">VIP Ticket</option>
                    <option value="vvip">VVIP Ticket</option>
                </select>

            </div>
            <div class="w-full md:w-2/5 ">
                <x-input-label labelName="Departure Time" />
                <x-input-tag type="text" name="departureTime" value="{{ $route->departure_time }}" />

            </div>
            <div class="w-full md:w-2/5 ">
                <x-input-label labelName="Arrive Time" />
                <x-input-tag type="text" name="arriveTime" value="{{ $route->departure_time }}" />

            </div>


            <div class="flex items-center justify-start space-x-4 w-full mt-2 md:mt-4">

                <x-button name="Add" type="submit" />
                <a href="{{ route('busRoutes#index') }}">
                    <x-button name="Cancel" onclick="modalHandler()" type="button" />

                </a>
                <a href="">
                    <x-button name="Delete" onclick="confirm()" type="button" />

                </a>

            </div>


        </div>
    </form>
</x-main-layout>

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
                <x-jet-input-error for="totalTicket" />

            </div>

            <div class="w-full md:w-2/5 hidden ">
                <x-input-label labelName="Route Id" />
                <x-input-tag name="routeId" value="{{ $routeId }}" />

            </div>
            <div class="w-full md:w-2/5 ">

                <x-input-label labelName="Related Operator" />
                <x-select-tag :data=$operators filterText="operator" />
                <x-jet-input-error for="operatorId" />


            </div>

            <div class=" w-full md:w-2/5 ">

                <x-input-label labelName="Price" />
                <x-input-tag type="text" name="price" value="{{ old('price') }}" placeholder="Enter Price" />
                <x-jet-input-error for="price" />

            </div>

            <div class="w-full  md:w-2/5 ">
                <x-input-label labelName="Class Of Ticket" />
                <select name="ticketClass" id=""
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700">
                    <option value="">Choose Ticket Class</option>
                    <option value="normal">Normal Ticket</option>
                    <option value="vip">VIP Ticket</option>
                    <option value="vvip">VVIP Ticket</option>
                </select>
                <x-jet-input-error for="class" />

            </div>


            <div class="flex items-center justify-start w-full">

                <x-button name="Add" type="submit" />
                <a href="{{ route('busRoutes#index') }}">

                    <x-button name="Cancel" type="button" />
                </a>
            </div>
            <div class="mt-5">
                <span class="text-gray-600 font-medium font-sm">Need to create new operator?</span>
                <a href="{{ route('operators#index') }}" class="text-indigo-600 font-semibold font-xs
                ">
                    click here
                </a>
            </div>

        </div>
    </form>



</x-main-layout>

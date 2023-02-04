 <x-add-modal-layout>
     <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('busRoutes#store') }}" enctype="multipart/form-data"
         method="POST">
         @csrf
         <div class=" flex flex-wrap justify-between gap-2 ">
             <div class="w-full md:w-2/5 ">
                 <x-input-label labelName="From Where" />
                 <x-select-tag :data=$locations filterText="location" name="fromWhere" />

             </div>
             <div class="w-full md:w-2/5 ">
                 <x-input-label labelName="To Where" />

                 <x-select-tag :data=$locations filterText="location" name="toWhere" />
             </div>

             <div class="w-full md:w-2/5 ">
                 <x-input-label labelName="Class Of Ticket" />

                 <select name="class" id=""
                     class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700">
                     <option value="">Choose Ticket Class</option>
                     <option value="normal">Normal Ticket</option>
                     <option value="vip">VIP Ticket</option>
                     <option value="vvip">VVIP Ticket</option>
                 </select>
             </div>

             <div class=" w-full md:w-2/5 ">
                 <x-input-label labelName="Price" />

                 <x-input-tag type="number" name="price" value="{{ old('price') }}" placeholder="Enter Price" />

             </div>
             <div class=" w-full md:w-2/5 ">
                 <x-input-label labelName="Departure Time" />

                 <x-input-tag type="text" name="departureTime" value="{{ old('departureTime') }}"
                     placeholder="Enter Departure Time" />

             </div>
             <div class=" w-full md:w-2/5 ">
                 <x-input-label labelName="Arrival Time" />

                 <x-input-tag type="text" name="arriveTime" value="{{ old('arriveTime') }}"
                     placeholder="Enter Arrival Time" />

             </div>



             <div class="flex items-center justify-start w-full">
                 <x-button name="Add" type="submit" />
                 <x-button name="Cancel" onclick="modalHandler()" type="button" />

             </div>

         </div>
         <div class="flex justify-center items-center mt-4">

             <span class="ml-2 py-4 text-sm"> Want to creat new location
                 <a href="{{ route('locations#index') }}" class="text-sm ml-2 text-blue-500 font-semibold">Click
                     here</a></span>

     </form>

     </div>
 </x-add-modal-layout>

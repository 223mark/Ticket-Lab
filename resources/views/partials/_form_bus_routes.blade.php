 <x-add-modal-layout>
     <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('busRoutes#store') }}" enctype="multipart/form-data"
         method="POST">
         @csrf
         <div class=" flex flex-wrap justify-between gap-2 ">
             <div class="w-full md:w-2/5 ">
                 <x-input-label labelName="From Where" />
                 <x-select-tag :data=$locations filterText="location" name="fromWhere" />
                 <x-jet-input-error for="fromWhere" />


             </div>
             <div class="w-full md:w-2/5 ">
                 <x-input-label labelName="To Where" />
                 <x-select-tag :data=$locations filterText="location" name="toWhere" />
                 <x-jet-input-error for="toWhere" />

             </div>
             @if (Session::has('message'))
                 <div class="w-full text-center ">
                     <p class="text-red-500 font-medium py-2 text-xs">{{ Session::get('message') }}</p>

                 </div>
             @endif

             <div class=" w-full md:w-2/5 ">
                 <x-input-label labelName="Departure Time" />

                 <x-input-tag type="text" name="departureTime" value="{{ old('departureTime') }}"
                     placeholder="Enter Departure Time" />
                 <x-jet-input-error for="departureTime" />


             </div>
             <div class=" w-full md:w-2/5 ">
                 <x-input-label labelName="Arrival Time" />

                 <x-input-tag type="text" name="arriveTime" value="{{ old('arriveTime') }}"
                     placeholder="Enter Arrival Time" />
                 <x-jet-input-error for="arriveTime" />

             </div>
             <div class="w-full  ">
                 <x-input-label labelName="Class Of Ticket" />
                 <select name="class" id=""
                     class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700">
                     <option value="">Choose Ticket Class</option>
                     <option value="normal">Normal Ticket</option>
                     <option value="vip">VIP Ticket</option>
                     <option value="vvip">VVIP Ticket</option>
                 </select>
                 <x-jet-input-error for="class" />

             </div>

             <div class="flex items-center justify-start w-full mt-2">
                 <div class="w-1/3 flex flex-row items-center">
                     <label for="revers" class="text-green-400 font-medium text-sm">Reverse Route</label>
                     <input type="checkbox" name="reverse" class="ml-4" id="reverse">
                 </div>
                 <div class="w-2/3 ">
                     <x-button name="Add" type="submit" class="w-full" />
                 </div>


             </div>

         </div>
         <div class="flex justify-center items-center mt-4">

             <span class="ml-2 py-4 text-sm"> Want to creat new location
                 <a href="{{ route('locations#index') }}" class="text-sm ml-2 text-blue-500 font-semibold">Click
                     here</a></span>

     </form>

     </div>
 </x-add-modal-layout>

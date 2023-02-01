 <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('buses#update', $data->id) }}" enctype="multipart/form-data"
     method="POST">
     @csrf
     <div class=" flex flex-wrap justify-between gap-2 ">
         <div class="w-full md:w-2/5 ">
             <label class="block mb-2 text-md font-semibold text-indigo-500" for="busNumber">
                 The Operators
             </label>
             <select name="operatorId">
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
                 id="busNumber" type="text" name="busNumber" value="{{ $data->bus_number }}"
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
                 id="driverName" type="text" name="driverName" value="{{ $data->driver_name }}"
                 placeholder="Enter Driver Name" />
         </div>
         <div class=" w-full ">
             <label class="block mb-2 text-md font-semibold text-indigo-500" for="operator_name">
                 Image
             </label>
             <input
                 class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                 id="operator_name" type="file" name="img" />
         </div>
         <div class="flex items-center justify-start w-full">
             <button
                 class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Update</button>
             <a href="{{ route('buses#index') }}"
                 class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 text-gray-600  hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm ">
                 Cancel
             </a>

         </div>

     </div>
 </form>

 <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('tickets#store') }}" enctype="multipart/form-data"
     method="POST">
     @csrf
     <div class=" flex flex-wrap justify-between gap-2 ">
         <div class="w-full md:w-2/5 ">
             <label class="block mb-2 text-md font-semibold text-indigo-500" for="operator_name">
                 From Where
             </label>
             <select name="fromWhere" id=""
                 class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700">
                 <option value="">Choose From Location</option>
                 <option value="{{ $data->from_where }}" selected>{{ $data->from_where }}</option>
                 @foreach ($locations as $l)
                     <option value="{{ $l->location }}">{{ $l->location }}</option>
                 @endforeach
             </select>
         </div>
         <div class="w-full md:w-2/5 ">
             <label class="block mb-2 text-md font-semibold text-indigo-500" for="operator_name">
                 To Where
             </label>
             <select name="toWhere" id=""
                 class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700">
                 <option value="">Choose From Location</option>
                 <option value="{{ $data->to_where }}" selected>{{ $data->to_where }}</option>
                 @foreach ($locations as $l)
                     <option value="{{ $l->location }}">{{ $l->location }}</option>
                 @endforeach
             </select>
         </div>
         <div class=" w-full md:w-2/5 ">
             <label class="block mb-2 text-md font-semibold text-indigo-500" for="price">
                 Price
             </label>
             <input
                 class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                 id="price" type="number" name="price" value="{{ $data->price }}" placeholder="Enter Price" />
         </div>
         <div class="w-full md:w-2/5 ">
             <label class="block mb-2 text-md font-semibold text-indigo-500" for="date">
                 Date
             </label>
             <input
                 class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                 id="date" type="date" name="date" value="{{ $data->date }}" />
         </div>
         <div class="w-full md:w-2/5 ">
             <label class="block mb-2 text-md font-semibold text-indigo-500" for="status">
                 Status
             </label>
             <input
                 class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                 id="status" type="text" name="status" value="{{ $data->status }}" placeholder="Enter Status" />
         </div>
         <div class="w-full md:w-2/5 ">
             <label class="block mb-2 text-md font-semibold text-indigo-500" for="status">
                 Seat Number
             </label>
             <input
                 class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"
                 id="status" type="text" name="status" value="{{ $data->seat_number }}" disabled />
         </div>
         <div class="flex items-center justify-start space-x-4 w-full mt-2 md:mt-4">
             <button
                 class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                 type="submit">Add</button>
             <a href="{{ route('tickets#index') }}">
                 <button
                     class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100  text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm "
                     type="button">Cancel</button>
             </a>
             <a href="{{ route('tickets#destory', $data->id) }}">
                 <button
                     class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-700   hover:bg-red-600 bg-red-700 rounded text-white px-8 py-2 text-sm"
                     type="button">Delete</button>
             </a>

         </div>


     </div>
 </form>

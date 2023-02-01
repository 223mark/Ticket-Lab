 <x-add-modal-layout>
     <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('locations#store') }}" enctype="multipart/form-data"
         method="POST">
         @csrf
         <div class=" flex flex-wrap justify-between gap-2 ">
             <div class=" w-full ">
                 <x-input-label labelName="Location" />
                 <x-input-tag type="text" name="location" value="{{ old('location') }}" placeholder="Location Name" />

             </div>
             <div class="flex items-center justify-start w-full">
                 <button
                     class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm"
                     type="submit">Add</button>
                 <button
                     class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm modalHandler"
                     onclick="modalHandler()" type="button">Cancel</button>
             </div>

         </div>
     </form>
 </x-add-modal-layout>

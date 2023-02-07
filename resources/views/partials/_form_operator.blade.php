 <x-add-modal-layout>
     <form class="p-2 my-2  rounded md:my-2 md:px-4   " action="{{ route('operators#store') }}"
         enctype="multipart/form-data" method="POST">
         @csrf
         <div class=" flex flex-wrap justify-between gap-2 ">
             <div class="w-full md:w-2/5 ">
                 <x-input-label labelName="Operator Name" />

                 <x-input-tag placeholder="Enter Operator Name" type="text" name="operatorName"
                     value="{{ old('operatorName') }}" />
                 <x-jet-input-error for="operatorName" />



             </div>
             <div class="w-full md:w-2/5 ">
                 <x-input-label labelName="Phone 1" />
                 <x-input-tag placeholder="Enter Phone Number" type="number" name="phoneOne"
                     value="{{ old('phoneOne') }}" />
                 <x-jet-input-error for="phoneOne" />

             </div>

             <div class=" w-full md:w-2/5 ">
                 <x-input-label labelName="Phone 2" />
                 <x-input-tag type="number" name="phoneTwo" value="{{ old('phoneTwo') }}"
                     placeholder="Enter Phone Number" />
                 <x-jet-input-error for="phoneTwo" />


             </div>
             <div class="w-full md:w-2/5 ">
                 <x-input-label labelName="Email" />
                 <x-input-tag placeholder="Enter Operator Email" type="email" name="email"
                     value="{{ old('email') }}" />
                 <x-jet-input-error for="email" />

             </div>
             <div class=" w-full">
                 <x-input-label labelName="Operator Image" />
                 <x-input-tag type="file" name="img" />

             </div>
             <div class=" w-full ">
                 <x-input-label labelName="Description" />

                 <textarea name="description" id="" cols="30" rows="5"
                     class="w-full px-4 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:border focus:border-indigo-700"> {{ old('destricption') }}</textarea>
                 <x-jet-input-error for="description" />

             </div>


             <div class="flex items-center justify-start w-full">
                 <x-button name="Add" type="submit" class="w-full" />
                 {{-- <a href="{{ route('operators#index') }}" >
                     <x-button name="Cancel" onclick="modalHandler()" />
                 </a> --}}

             </div>

         </div>
     </form>

 </x-add-modal-layout>

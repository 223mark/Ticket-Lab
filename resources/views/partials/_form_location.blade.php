 <x-add-modal-layout>
     <form class="px-8 pt-6 pb-8 mb-4  rounded" action="{{ route('locations#store') }}" enctype="multipart/form-data"
         method="POST">
         @csrf
         <div class=" flex flex-wrap justify-between gap-2 ">
             <div class=" w-full ">
                 <x-input-label labelName="Location" />
                 <x-input-tag type="text" name="location" value="{{ old('location') }}" placeholder="Location Name" />
                 <x-jet-input-error for="location" />


             </div>
             <div class=" w-full">

                 <x-button name="Add" type="submit" class="w-full" />


             </div>

         </div>
     </form>
 </x-add-modal-layout>

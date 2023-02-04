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

                 <x-button name="Add" type="submit" />
                 <x-button name="Cancel" onclick="modalHandler()" type="button" />

             </div>

         </div>
     </form>
 </x-add-modal-layout>

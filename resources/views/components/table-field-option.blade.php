 @switch($slot)
     @case('edit')
         <i class="fa-regular fa-pen-to-square text-lg text-indigo-800"></i>
     @break

     @case('delete')
         <i class="fa-solid fa-trash text-lg text-red-500"></i>
     @break

     @case('detail')
         <i class="fa-solid fa-eye text-lg text-green-500"></i>
     @break

     @default
 @endswitch

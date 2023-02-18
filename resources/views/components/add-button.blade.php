@props(['btn_name'])
<div class="flex justify-end mt-4 mr-0 md:mr-4 mb-2  md:mt-0">
    <div id="button">
        <button
            class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 mx-auto transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-4 sm:px-8 py-2 text-xs sm:text-sm modalHandler"
            onclick="modalHandler(true)">{{ $btn_name }}</button>
    </div>
</div>

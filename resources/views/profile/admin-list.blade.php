<x-main-layout title="Admin/Lists">

    {{-- flash message --}}
    @if (Session::has('deleteMessage'))
        <x-toast-message>delete</x-toast-message>
    @endif

    <div class="mb-2">
        <a href="{{ route('profile#index') }}" class="">
            <x-button name="Back" />
        </a>
    </div>
    <div class="overflow-auto shadow rounded-lg mb-32">
        <table class="w-full  border-collapse bg-white text-left text-sm text-gray-500 border shadow-lg ">
            {{-- table header --}}
            <x-table-header>adminlist</x-table-header>


            <tbody class="divide-y divide-gray-100 border-t border-gray-100">

                @forelse ($admins as $data)
                    <tr class="hover:bg-gray-200">
                        <td class="px-2 whitespace-nowrap">
                            <img class="w-full h-20 hover:bg-gray-200"
                                src="{{ $data->img ? asset('img/adminImage/' . $data->img) : asset('img/codelab.png') }}"
                                alt="admin image" />

                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $data->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $data->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($data->phone == null)
                                <span class="text-gray-600 font-semibold text-xl"> --- </span>
                            @else
                                {{ $data->phone }}
                            @endif

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $data->created_at->format('Y-m-d') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{-- <a href="{{ route('admins#destory', $data->id) }}">
                                <x-table-field-option>delete</x-table-field-option>
                            </a> --}}
                        </td>

                    </tr>
                @empty
                    <tr class="hover:bg-gray-200">
                        <x-no-data-status item="other admins" />
                    </tr>
                @endif

            </tbody>

        </table>
    </div>
    <div class="my-4 md:my-6">
        {{ $admins->links() }}
    </div>
</x-main-layout>

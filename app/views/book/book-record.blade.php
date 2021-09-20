<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100 border-none border-t border-l border-r">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Book name/ISBN
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Authors/Publisher
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Pages
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Release Date
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($data as $book)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="">
                                            <div class="font-medium text-gray-900">
                                                {{ ucwords($book['name']) }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                ISBN: {{ $book['isbn'] }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $authors = array_map('ucwords', $book["authors"])
                                    @endphp
                                    <div class="text-sm text-gray-900">{{ implode( ', ', $authors)}}</div>
                                    <div class="text-sm text-gray-500">{{ $book["publisher"] }} - {{ $book['country'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                      {{ $book["number_of_pages"] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ \Illuminate\Support\Carbon::parse($book["release_date"])->format('dS M, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                    <a href="{{ route('book.edit', ['book_id' => $book['id']]) }}" class="border border-blue-700 rounded px-4 py-1 text-blue-600 hover:text-white hover:bg-blue-700">Edit</a>
                                    <a href="#" class="border border-red-700 rounded px-4 py-1 text-red-600 hover:text-white hover:bg-red-700">Delete</a>
                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <x-modals.dialog-modal max-width="sm">
        <x-slot name="title">Delete Book</x-slot>
        <x-slot name="content">
            Are you sure you want to delete ?
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-modals.dialog-modal>
</div>

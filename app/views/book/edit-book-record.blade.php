<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

        <form wire:submit.prevent="editRecord" class="space-y-8 divide-y divide-gray-200 max-w-2xl mb-6 relative pb-4 pr-4">
            <div class="space-y-8 divide-y divide-gray-200">

                <div class="pt-8">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Book Information
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            All fields are required.
                        </p>
                    </div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <x-form.label for="name">
                                Name
                            </x-form.label>
                            <div class="mt-1">
                                <x-form.input wire:model.lazy="name" id="name" />
                                <x-form.input-error for="name" />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.label for="isbn">
                                ISBN
                            </x-form.label>
                            <div class="mt-1">
                                <x-form.input wire:model.lazy="isbn" id="isbn" />
                                <x-form.input-error for="isbn" />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.label for="authors">
                                Authors
                            </x-form.label>
                            <div class="mt-1">
                                <x-form.input wire:model.lazy="authors" id="authors" />
                                <x-form.input-error for="authors" />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.label for="publisher">
                                Publisher
                            </x-form.label>
                            <div class="mt-1">
                                <x-form.input wire:model.lazy="publisher" id="publisher" />
                                <x-form.input-error for="publisher" />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.label for="country">
                                Country
                            </x-form.label>
                            <div class="mt-1">
                                <x-form.input wire:model.lazy="country" id="country" />
                                <x-form.input-error for="country" />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.label for="noOfPages">
                                Total pages
                            </x-form.label>
                            <div class="mt-1">
                                <x-form.input wire:model.lazy="number_of_pages" id="noOfPages" />
                                <x-form.input-error for="number_of_pages" />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.label for="release_date">
                                Release date
                            </x-form.label>
                            <div class="mt-1">
                                <x-date-picker wire:model.lazy="release_date" default="{{ $release_date }}" />
                                <x-form.input-error for="release_date" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <a href="{{ route('home') }}" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </a>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
            <x-livewire-loading wire:target="editRecord" class="opacity-50" />

        </form>

</div>

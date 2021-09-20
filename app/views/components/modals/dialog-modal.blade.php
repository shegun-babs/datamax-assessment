@props(['id' => null, 'maxWidth' => null])

<x-modals.modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="bg-white pb-4 sm:p-6 sm:pb-4 text-left">
        @if ( !empty($title) )
            <div class="text-lg border-b px-4 py-3 font-semibold sm:text-left">
                {{ $title }}
            </div>
        @endif

        <div class="px-6 py-4 sm:text-left" style="max-height:80vh;overflow-y:auto;">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-3 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-modals.modal>

@props([
    'disabled' => false,
])
<input type="text"
       {{ $disabled ? 'disabled' : '' }}
           {{ $attributes->merge(["class" => "shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"]) }} />

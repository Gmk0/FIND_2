@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center w-full text-base font-semibold
transition-colors duration-150 text-gray-800 hover:text-gray-800
dark:hover:text-gray-200'
: 'inline-flex items-center text-gray-800 w-full text-base font-semibold
transition-colors duration-150 hover:text-gray-800
dark:hover:text-gray-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
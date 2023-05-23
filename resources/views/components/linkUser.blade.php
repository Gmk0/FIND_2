@props(['active'])

@php
$classes = ($active ?? false)
? 'flex text-gray-700 hover:text-primary-700 gap-1 text-primary-700 dark:text-primary-500 dark:hover:text-white'
: 'flex text-gray-700 hover:text-primary-700 gap-1 dark:text-gray-400 dark:hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
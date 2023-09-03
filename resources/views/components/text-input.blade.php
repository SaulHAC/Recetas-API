@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-lime-500 focus:ring-indigo-500 shadow-sm']) !!}>
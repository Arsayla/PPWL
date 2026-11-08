@props([
    'label',
    'value',
    'color' => 'text-blue-600',
])

<div class="admin-stat">
    <span>{{ $label }}</span>
    <strong class="{{ $color }}">{{ $value }}</strong>
</div>




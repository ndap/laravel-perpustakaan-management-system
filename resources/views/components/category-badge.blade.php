@props([
    'category',
    'clickable' => false,
])

@if($clickable)
    <a 
        href="{{ route('dashboard', ['category' => $category->id]) }}" 
        {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-1 bg-gradient-to-r from-primary-50 to-emerald-50 text-primary-700 text-sm font-medium rounded-full border border-primary-200 hover:bg-primary-100 transition-colors']) }}
    >
        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
        </svg>
        {{ $category->category_name }}
    </a>
@else
    <span {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-1 bg-gradient-to-r from-primary-50 to-emerald-50 text-primary-700 text-sm font-medium rounded-full border border-primary-200']) }}>
        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
        </svg>
        {{ $category->category_name }}
    </span>
@endif

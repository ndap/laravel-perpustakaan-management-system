@props([
    'user',
    'size' => 'md', // sm, md, lg
])

@php
    $sizeClasses = [
        'sm' => 'w-8 h-8 text-xs',
        'md' => 'w-10 h-10 text-sm',
        'lg' => 'w-16 h-16 text-xl',
    ];
    
    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['md'];
    $userName = $user->full_name ?? $user->username;
    $userInitial = strtoupper(substr($userName, 0, 1));
    $hasPhoto = !empty($user->photo_profile);
@endphp

@if($hasPhoto)
    {{-- Display actual user profile photo --}}
    <div {{ $attributes->merge(['class' => $sizeClass . ' rounded-full overflow-hidden bg-gray-200 flex-shrink-0 border-2 border-white shadow-sm']) }}>
        <img 
            src="{{ asset('storage/' . $user->photo_profile) }}" 
            alt="{{ $userName }}"
            class="w-full h-full object-cover"
            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full bg-gradient-to-br from-primary-500 to-emerald-600 flex items-center justify-center text-white font-bold\'>{{ $userInitial }}</div>';"
        >
    </div>
@else
    {{-- Display default avatar with user initials --}}
    <div {{ $attributes->merge(['class' => $sizeClass . ' rounded-full bg-gradient-to-br from-primary-500 to-emerald-600 flex items-center justify-center text-white font-bold flex-shrink-0 shadow-sm']) }}>
        {{ $userInitial }}
    </div>
@endif

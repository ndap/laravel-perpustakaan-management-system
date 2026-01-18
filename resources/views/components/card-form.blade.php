@props(['action', 'method' => 'POST', 'title'])

<div class="bg-white rounded-lg shadow-sm p-6 mb-6">
    <div class="mb-4 text-center">
        <h2 class="text-xl font-bold text-gray-900">{{ $title }}</h2>
    </div>

    <form action="{{ $action }}" method="{{ $method }}">
        @csrf
        
        <div class="space-y-4">
            {{ $slot }}
        </div>

        <div class="mt-6 flex justify-end">
            {{ $footer ?? '' }}
        </div>
    </form>
</div>

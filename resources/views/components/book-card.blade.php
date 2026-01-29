@props([
    'book',
    'showCategories' => false,
])

<a href="{{ route('home.bookDetail', $book) }}" {{ $attributes->merge(['class' => 'group block']) }}>
    <div class="bg-gray-50 rounded-xl p-4 hover:bg-primary-50 transition-all duration-300 border border-gray-100 hover:border-primary-200 hover:shadow-md h-full flex flex-col">
        {{-- Book Cover --}}
        <div class="aspect-[2/3] bg-gradient-to-br from-primary-100 to-emerald-100 rounded-lg overflow-hidden mb-3 flex-shrink-0">
            @if($book->image)
                <img 
                    src="{{ Storage::url($book->image) }}" 
                    alt="{{ $book->title }}" 
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                >
            @else
                <div class="w-full h-full flex items-center justify-center">
                    <svg class="w-10 h-10 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
            @endif
        </div>
        
        {{-- Book Info --}}
        <div class="flex-grow flex flex-col">
            <h4 class="font-semibold text-gray-900 text-sm line-clamp-2 group-hover:text-primary-700 transition-colors mb-1">
                {{ $book->title }}
            </h4>
            <p class="text-xs text-gray-500 mb-2">{{ $book->author }}</p>
            
            {{-- Categories (optional) --}}
            @if($showCategories && $book->categories && $book->categories->count() > 0)
                <div class="flex flex-wrap gap-1 mt-auto pt-2 border-t border-gray-200">
                    @foreach($book->categories->take(2) as $category)
                        <span class="text-xs px-2 py-0.5 bg-primary-100 text-primary-700 rounded-full">
                            {{ $category->name }}
                        </span>
                    @endforeach
                    @if($book->categories->count() > 2)
                        <span class="text-xs px-2 py-0.5 bg-gray-100 text-gray-600 rounded-full">
                            +{{ $book->categories->count() - 2 }}
                        </span>
                    @endif
                </div>
            @endif
            
            {{-- Stock indicator --}}
            @if(isset($book->stock))
                <div class="mt-2 pt-2 border-t border-gray-200">
                    @if($book->stock > 0)
                        <span class="text-xs text-green-600 font-medium flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tersedia
                        </span>
                    @else
                        <span class="text-xs text-red-600 font-medium flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Stok Habis
                        </span>
                    @endif
                </div>
            @endif
        </div>
    </div>
</a>

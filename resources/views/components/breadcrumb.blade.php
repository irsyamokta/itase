@props(['links' => []]) 
<nav class="flex justify-end" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        @foreach ($links as $link)
            @if (!$loop->last)
                <li class="inline-flex items-center">
                    <a href="{{ $link['url'] }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-secondary">
                        {{ $link['label'] }}
                    </a>
                </li>
            @else
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">{{ $link['label'] }}</span>
                    </div>
                </li>
            @endif
        @endforeach
    </ol>
</nav>

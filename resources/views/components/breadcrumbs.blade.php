@props(['items' => []])

<nav aria-label="مسار التنقل" class="mx-auto max-w-site px-4 pt-6 sm:px-6">
    <ol class="flex flex-wrap items-center gap-x-2 gap-y-1 text-sm text-brand-muted">
        <li>
            <a href="{{ route('home') }}" class="transition duration-fast hover:text-brand-emerald">الرئيسية</a>
        </li>
        @foreach ($items as $item)
            <li aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
            </li>
            <li>
                @if (! empty($item['url']))
                    <a href="{{ $item['url'] }}" class="transition duration-fast hover:text-brand-emerald">
                        {{ $item['label'] }}
                    </a>
                @else
                    <span aria-current="page" class="font-medium text-brand-emerald">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>

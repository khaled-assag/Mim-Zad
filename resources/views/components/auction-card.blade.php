@props(['a'])

@php
    $statusMeta = match ($a['status']) {
        'active' => ['label' => 'جاري', 'class' => '!border-brand-emerald !bg-brand-emerald !text-brand-navy'],
        'upcoming' => ['label' => 'قادم', 'class' => '!border-brand-emerald/60 !bg-transparent text-brand-emerald'],
        default => ['label' => 'منتهٍ', 'class' => '!border-white/25 !bg-transparent text-brand-muted'],
    };
    $url = url('/auctions/'.$a['slug']);
@endphp

<article class="mz-card group overflow-hidden transition-transform duration-base hover:-translate-y-1 hover:shadow-card-hover">
    <a href="{{ $url }}" class="block" aria-label="{{ $a['title'] }}">
        <div class="relative h-44 overflow-hidden sm:h-48">
            <img src="{{ asset($a['images'][0]) }}" alt="صورة توضيحية — {{ $a['title'] }}"
                 class="h-full w-full object-cover transition duration-base group-hover:scale-[1.03]" loading="lazy">
            <span class="mz-badge absolute right-3 top-3 backdrop-blur {{ $statusMeta['class'] }}">{{ $statusMeta['label'] }}</span>
            @if ($a['agent']['verified'])
                <span class="mz-badge absolute left-3 top-3 !border-white/30 bg-brand-navy/70 !text-brand-ivory backdrop-blur"
                      title="مصدر موثق">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5">
                        <path d="M20 13c0 5-3.5 7.5-7.7 8.9a.9.9 0 0 1-.6 0C7.5 20.5 4 18 4 13V6a1 1 0 0 1 .7-1c3.6-.9 6-2 7.3-3a.9.9 0 0 1 1 0c1.3 1 3.7 2.1 7.3 3a1 1 0 0 1 .7 1Z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                    موثق
                </span>
            @endif
        </div>

        <div class="space-y-3 p-5">
            <div class="flex items-center gap-2 text-xs text-brand-muted">
                <span class="rounded-pill border border-brand-emerald/40 px-2.5 py-0.5 text-brand-emerald">{{ $a['category']['name'] }}</span>
                <span>{{ $a['type'] }}</span>
            </div>

            <h3 class="text-lg font-bold leading-8 text-brand-white transition duration-fast group-hover:text-brand-emerald">
                {{ $a['title'] }}
            </h3>

            <p class="flex items-center gap-1.5 text-sm text-brand-muted">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 text-brand-emerald">
                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>
                </svg>
                {{ $a['city'] }} · {{ $a['district'] }}
            </p>

            <div class="flex items-baseline gap-2 border-t border-white/10 pt-3">
                <span class="text-xs text-brand-muted">السعر الافتتاحي</span>
                <span class="text-xl font-bold text-brand-emerald">{{ number_format($a['price_start']) }}</span>
                <span class="text-xs text-brand-muted">ر.س</span>
            </div>

            <div class="flex flex-wrap items-center justify-between gap-3 border-t border-white/10 pt-3">
                <div class="flex items-center gap-2 text-xs text-brand-muted">
                    <span class="flex h-7 w-7 items-center justify-center rounded-pill bg-brand-surface-soft text-[11px] font-bold text-brand-emerald">{{ $a['agent']['initials'] }}</span>
                    {{ $a['agent']['name'] }}
                </div>
                @if ($a['status'] === 'active')
                    <x-countdown :ends-at-iso="$a['ends_at_iso']"/>
                @elseif ($a['status'] === 'upcoming')
                    <span class="text-xs text-brand-muted">يبدأ: {{ $a['starts_at_human'] }}</span>
                @else
                    <span class="text-xs text-brand-muted">{{ $a['ended_note'] ?? 'انتهى المزاد' }}</span>
                @endif
            </div>
        </div>
    </a>
</article>

@props(['banners'])

@php
    $count = count($banners);
@endphp

@if ($count > 0)
    <section class="mx-auto max-w-site px-4 pt-6 sm:px-6" aria-label="إعلانات المنصة">
        <div x-data="{
                current: 0,
                count: {{ $count }},
                timer: null,
                reduced: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
                start() { if (this.reduced) return; this.stop(); this.timer = setInterval(() => this.next(), 6000); },
                stop() { if (this.timer) clearInterval(this.timer); },
                next() { this.current = (this.current + 1) % this.count; },
                prev() { this.current = (this.current - 1 + this.count) % this.count; },
                go(i) { this.current = i; },
                touchStartX: null,
                swipeStart(e) { this.touchStartX = e.changedTouches[0].clientX; this.stop(); },
                swipeEnd(e) {
                    if (this.touchStartX === null) return;
                    const dx = e.changedTouches[0].clientX - this.touchStartX;
                    if (Math.abs(dx) > 45) { dx > 0 ? this.prev() : this.next(); }
                    this.touchStartX = null;
                    this.start();
                }
             }"
             x-init="start()"
             @mouseenter="stop()"
             @mouseleave="start()"
             @touchstart.passive="swipeStart($event)"
             @touchend.passive="swipeEnd($event)"
             role="region"
             aria-roledescription="سلايدر إعلانات"
             class="group/slider relative overflow-hidden rounded-card border border-brand-emerald/30 bg-brand-surface shadow-card">

            <div class="relative h-[230px] sm:h-[320px] lg:h-[400px]">
                @foreach ($banners as $i => $banner)
                    <a href="{{ $banner['cta_url'] }}"
                       x-show="current === {{ $i }}"
                       x-cloak
                       x-transition:enter="transition duration-base ease-out"
                       x-transition:enter-start="opacity-0 scale-[1.02]"
                       x-transition:enter-end="opacity-100 scale-100"
                       x-transition:leave="transition duration-fast ease-in absolute inset-0"
                       x-transition:leave-end="opacity-0"
                       @if ($i === 0) style="display:block" @endif
                       class="absolute inset-0 block"
                       :aria-hidden="(current !== {{ $i }}).toString()"
                       tabindex="-1">
                        <img src="{{ asset($banner['image_path']) }}"
                             alt="{{ $banner['title'] }}"
                             class="h-full w-full object-cover" loading="{{ $i === 0 ? 'eager' : 'lazy' }}">
                        <span class="absolute inset-0 bg-gradient-to-l from-brand-navy/90 via-brand-navy/55 to-transparent"
                              aria-hidden="true"></span>

                        <span class="absolute inset-y-0 right-0 flex max-w-xl flex-col justify-center gap-3 p-7 sm:p-12">
                            <span class="mz-badge w-fit !border-brand-emerald !bg-brand-emerald !text-brand-navy">
                                {{ $banner['badge'] }}
                            </span>
                            <span class="text-2xl font-black leading-snug text-brand-white sm:text-3xl lg:text-4xl">
                                {{ $banner['title'] }}
                            </span>
                            <span class="hidden text-sm leading-7 text-brand-muted sm:block sm:text-base">
                                {{ $banner['description'] }}
                            </span>
                            <span class="mz-button-primary mt-2 w-fit !px-5 !py-2.5 text-sm pointer-events-none">
                                {{ $banner['cta_text'] }}
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="h-4 w-4 rotate-180">
                                    <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                                </svg>
                            </span>
                        </span>
                    </a>
                @endforeach
            </div>

            <button @click="prev(); start()" type="button"
                    aria-label="الإعلان السابق"
                    class="absolute right-3 top-1/2 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-pill border border-white/25 bg-brand-navy/60 text-brand-white backdrop-blur transition duration-fast hover:border-brand-emerald hover:text-brand-emerald focus-visible:border-brand-emerald">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                    <path d="m9 18 6-6-6-6"/>
                </svg>
            </button>
            <button @click="next(); start()" type="button"
                    aria-label="الإعلان التالي"
                    class="absolute left-3 top-1/2 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-pill border border-white/25 bg-brand-navy/60 text-brand-white backdrop-blur transition duration-fast hover:border-brand-emerald hover:text-brand-emerald focus-visible:border-brand-emerald">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
            </button>

            <div class="absolute bottom-4 left-1/2 z-10 flex -translate-x-1/2 items-center gap-2 rounded-pill bg-brand-navy/55 px-3 py-2 backdrop-blur"
                 role="tablist" aria-label="اختيار الإعلان">
                @foreach ($banners as $i => $banner)
                    <button type="button" @click="go({{ $i }}); start()" role="tab"
                            aria-label="الإعلان {{ $i + 1 }}"
                            :aria-selected="(current === {{ $i }}).toString()"
                            class="h-2 rounded-pill transition-all duration-base"
                            :class="current === {{ $i }} ? 'w-7 bg-brand-emerald' : 'w-2 bg-white/40 hover:bg-white/70'"></button>
                @endforeach
            </div>
        </div>
    </section>
@endif

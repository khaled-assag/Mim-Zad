<header class="sticky top-0 z-40 border-b border-brand-emerald/25 bg-brand-navy/95 backdrop-blur"
        x-data="{ open: false }">
    <div class="mx-auto flex h-20 max-w-site items-center justify-between gap-4 px-4 sm:px-6">

        <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-3 p-2" aria-label="مزاد — الرئيسية">
            <img src="{{ asset('brand/mim-zad-logo-white.svg') }}" alt="مزاد | Mim_Zad" class="h-12 w-auto min-w-[120px]">
        </a>

        <nav class="hidden items-center gap-7 text-sm font-medium lg:flex" aria-label="التنقل الرئيسي">
            <a href="{{ route('home') }}"
               class="transition duration-fast hover:text-brand-emerald {{ request()->routeIs('home') ? 'text-brand-emerald' : 'text-brand-ivory' }}">
                الرئيسية
            </a>
            <a href="{{ url('/auctions') }}"
               class="transition duration-fast hover:text-brand-emerald {{ request()->routeIs('auctions.*') ? 'text-brand-emerald' : 'text-brand-ivory' }}">
                المزادات
            </a>
            <a href="{{ url('/about') }}"
               class="transition duration-fast hover:text-brand-emerald {{ request()->routeIs('about') ? 'text-brand-emerald' : 'text-brand-ivory' }}">
                عن المنصة
            </a>
            <a href="{{ url('/contact') }}"
               class="transition duration-fast hover:text-brand-emerald {{ request()->routeIs('contact.*') ? 'text-brand-emerald' : 'text-brand-ivory' }}">
                تواصل معنا
            </a>
            <a href="{{ url('/submit-auction') }}" class="mz-button-primary !px-5 !py-2.5 text-sm">
                ارفع مزادك
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 rotate-180">
                    <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                </svg>
            </a>
        </nav>

        <button @click="open = !open" class="inline-flex h-11 w-11 items-center justify-center rounded-btn border border-brand-emerald/40 text-brand-ivory transition duration-fast hover:border-brand-emerald lg:hidden"
                :aria-expanded="open.toString()" aria-controls="mobile-menu" aria-label="قائمة التنقل">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-6 w-6">
                <path d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-6 w-6">
                <path d="M18 6 6 18M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <nav id="mobile-menu" x-show="open" x-cloak x-transition.duration.250ms
         class="border-t border-brand-emerald/15 bg-brand-surface px-4 py-4 lg:hidden" aria-label="قائمة الجوال">
        <ul class="flex flex-col gap-1 text-sm font-medium">
            <li><a @click="open=false" href="{{ route('home') }}" class="block rounded-card px-3 py-3 transition duration-fast hover:bg-brand-surface-soft">الرئيسية</a></li>
            <li><a @click="open=false" href="{{ url('/auctions') }}" class="block rounded-card px-3 py-3 transition duration-fast hover:bg-brand-surface-soft">المزادات</a></li>
            <li><a @click="open=false" href="{{ url('/about') }}" class="block rounded-card px-3 py-3 transition duration-fast hover:bg-brand-surface-soft">عن المنصة</a></li>
            <li><a @click="open=false" href="{{ url('/contact') }}" class="block rounded-card px-3 py-3 transition duration-fast hover:bg-brand-surface-soft">تواصل معنا</a></li>
            <li class="mt-2">
                <a @click="open=false" href="{{ url('/submit-auction') }}" class="mz-button-primary w-full">ارفع مزادك</a>
            </li>
        </ul>
    </nav>
</header>

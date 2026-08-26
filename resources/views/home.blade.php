<x-app-layout title="الرئيسية">
    {{-- 0) سلايدر الإعلانات (BannerProvider — يُدار لاحقاً من لوحة التحكم) --}}
    <x-banner-slider :banners="$banners"/>

    {{-- 1) الهيرو --}}
    <section class="relative overflow-hidden border-b border-brand-emerald/20 bg-brand-navy">
        <svg class="pointer-events-none absolute -left-24 top-1/2 h-[420px] w-[420px] -translate-y-1/2 opacity-[0.07]"
             viewBox="0 0 200 200" fill="none" stroke="#1AB59C" stroke-width="1.5" aria-hidden="true">
            <rect x="10" y="90" width="40" height="100"/>
            <rect x="60" y="50" width="40" height="140"/>
            <rect x="110" y="110" width="40" height="80"/>
            <path d="M0 190h200M70 30l10-14 10 14M80 16v18M130 80h40M150 60v40"/>
            <circle cx="160" cy="45" r="12"/><path d="m169 54 14 14"/>
        </svg>

        <div class="mx-auto max-w-site px-4 py-20 sm:px-6 lg:py-28">
            <div class="max-w-3xl">
                <span class="mz-badge !border-brand-emerald/60 text-brand-emerald">المرجع الأول للمزادات العقارية في السعودية</span>

                <h1 class="mt-6 text-4xl font-black leading-[1.35] text-brand-white sm:text-5xl sm:leading-[1.3]">
                    كل المزادات العقارية،
                    <span class="text-brand-emerald">في مكان واحد</span>
                </h1>

                <p class="mt-5 max-w-xl text-lg leading-9 text-brand-muted">
                    نجمع فرص المزادات العقارية من مصادرها المعتمدة، ننظمها لتقارن بثقة، ونوجهك مباشرة إلى الجهة
                    المنظمة لإتمام عمليةك.
                </p>

                <form action="{{ url('/auctions') }}" method="GET" role="search"
                      class="mt-8 flex max-w-xl flex-col gap-3 sm:flex-row">
                    <label for="home-search" class="sr-only">ابحث عن مزاد</label>
                    <div class="relative flex-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             class="pointer-events-none absolute right-4 top-1/2 h-5 w-5 -translate-y-1/2 text-brand-muted">
                            <circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/>
                        </svg>
                        <input id="home-search" type="search" name="q" value="{{ request('q') }}"
                               placeholder="ابحث باسم المزاد أو كوده أو مدينته…"
                               class="mz-input !pr-12 placeholder:text-sm"/>
                    </div>
                    <button type="submit" class="mz-button-primary shrink-0">ابحث الآن</button>
                </form>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ url('/auctions') }}" class="mz-button-secondary">
                        تصفح كل المزادات
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="h-4 w-4 rotate-180"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                    <a href="{{ url('/submit-auction') }}" class="mz-button-secondary">ارفع مزادك</a>
                </div>
            </div>
        </div>
    </section>

    {{-- 2) إحصائيات علنية من getStats() --}}
    <section class="border-b border-white/10 bg-brand-surface/60" aria-label="إحصائيات المنصة">
        <div class="mx-auto grid max-w-site grid-cols-2 gap-px overflow-hidden px-4 py-8 sm:px-6 md:grid-cols-4">
            <div class="p-4 text-center">
                <p class="text-3xl font-black text-brand-emerald">{{ $stats['auctions_total'] }}</p>
                <p class="mt-1 text-sm text-brand-muted">مزاد معروض</p>
            </div>
            <div class="p-4 text-center">
                <p class="text-3xl font-black text-brand-emerald">{{ $stats['active'] }}</p>
                <p class="mt-1 text-sm text-brand-muted">مزاد جارٍ الآن</p>
            </div>
            <div class="p-4 text-center">
                <p class="text-3xl font-black text-brand-emerald">{{ $stats['upcoming'] }}</p>
                <p class="mt-1 text-sm text-brand-muted">مزاد قادم قريباً</p>
            </div>
            <div class="p-4 text-center">
                <p class="text-3xl font-black text-brand-emerald">{{ number_format($stats['start_value_total']) }}</p>
                <p class="mt-1 text-sm text-brand-muted">إجمالي قيم الافتتاح (ر.س)</p>
            </div>
        </div>
    </section>

    {{-- 3) التصنيفات من getCategories() --}}
    <section class="mx-auto max-w-site px-4 pt-14 sm:px-6" aria-label="تصنيفات المزادات">
        <div class="flex items-end justify-between gap-4">
            <h2 class="text-2xl font-bold text-brand-white">تصفّح حسب التصنيف</h2>
        </div>
        <div class="mt-6 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">
            @foreach ($categories as $category)
                <a href="{{ url('/categories/'.$category['slug']) }}"
                   class="group rounded-card border border-brand-emerald/25 bg-brand-surface p-5 text-center transition duration-base hover:border-brand-emerald hover:shadow-card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"
                         class="mx-auto h-8 w-8 text-brand-emerald">
                        <path d="M6 21V9a6 6 0 0 1 12 0v12"/><path d="M3 21h18"/><path d="M9 13h.01M15 13h.01"/>
                    </svg>
                    <h3 class="mt-3 font-bold text-brand-white transition duration-fast group-hover:text-brand-emerald">
                        {{ $category['name'] }}
                    </h3>
                    <p class="mt-1 text-xs text-brand-muted">{{ $category['count'] }} مزاد</p>
                </a>
            @endforeach
        </div>
    </section>

    {{-- 4) آخر المزادات النشطة من getActiveAuctions() --}}
    <section class="mx-auto max-w-site px-4 pt-16 sm:px-6" aria-label="آخر المزادات النشطة">
        <div class="flex items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-brand-white">آخر المزادات النشطة</h2>
                <p class="mt-1 text-sm text-brand-muted">مزادات جارية يمكنك المشاركة أو متابعة عدّادها الآن.</p>
            </div>
            <a href="{{ url('/auctions') }}"
               class="shrink-0 text-sm font-bold text-brand-emerald transition duration-fast hover:brightness-125">
                عرض الكل ←
            </a>
        </div>

        <div class="mt-6 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @forelse ($activeAuctions as $auction)
                <x-auction-card :a="$auction"/>
            @empty
                <div class="col-span-full rounded-card border border-dashed border-brand-emerald/40 bg-brand-surface p-10 text-center text-brand-muted">
                    لا توجد مزادات نشطة حالياً — تابعنا قريباً.
                </div>
            @endforelse
        </div>
    </section>

    {{-- 5) المصادر المعتمدة --}}
    <section class="mt-16 border-y border-white/10 bg-brand-surface/40" aria-label="المصادر المعتمدة">
        <div class="mx-auto max-w-site px-4 py-12 sm:px-6">
            <div class="grid items-center gap-8 md:grid-cols-2">
                <div>
                    <h2 class="text-2xl font-bold text-brand-white">مصادر موثقة وشفافة</h2>
                    <p class="mt-3 leading-8 text-brand-muted">
                        نعرض على كل مزاد مصدره وحالة توثيقه، ونوجهك إلى الجهة المنظمة الأصلية لإتمام الإجراءات.
                        دور مزاد هو الاكتشاف والتنظيم والتوجيه — البيع والتنظيم يبقى بيد الجهات المعتمدة.
                    </p>
                    <p class="mt-3 text-sm text-brand-muted">
                        عدد المصادر المتاحة حالياً: <span class="font-bold text-brand-emerald">{{ $stats['sources_total'] }}</span>
                    </p>
                </div>
                <ul class="space-y-3">
                    @foreach (['مزادات خاصة معروضة على المنصة', 'مصادر مجمعة عبر البورصة العقارية', 'إسناد رسمي من جهات حكومية'] as $source)
                        <li class="flex items-center gap-3 rounded-card border border-brand-emerald/25 bg-brand-navy p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="h-5 w-5 shrink-0 text-brand-emerald">
                                <path d="M20 13c0 5-3.5 7.5-7.7 8.9a.9.9 0 0 1-.6 0C7.5 20.5 4 18 4 13V6a1 1 0 0 1 .7-1c3.6-.9 6-2 7.3-3a.9.9 0 0 1 1 0c1.3 1 3.7 2.1 7.3 3a1 1 0 0 1 .7 1Z"/><path d="m9 12 2 2 4-4"/>
                            </svg>
                            <span class="text-sm font-medium text-brand-ivory">{{ $source }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- 6) CTA رفع مزاد --}}
    <section class="mx-auto max-w-site px-4 py-16 sm:px-6" aria-label="ارفع مزادك">
        <div class="rounded-card border border-brand-emerald/40 bg-gradient-to-l from-brand-surface to-brand-navy p-10 text-center shadow-card">
            <h2 class="text-2xl font-bold text-brand-white sm:text-3xl">عندك مزاد عقاري؟</h2>
            <p class="mx-auto mt-3 max-w-xl leading-8 text-brand-muted">
                سجّل مزادك ليصل إلى الباحثين عن الفرص في كل مناطق المملكة، مع عرض واضح لمصدره وتفاصيله.
            </p>
            <a href="{{ url('/submit-auction') }}" class="mz-button-primary mt-6">
                ارفع مزادك الآن
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="h-4 w-4 rotate-180"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>
    </section>
</x-app-layout>

<footer class="mt-16 border-t border-brand-emerald/25 bg-brand-surface">
    <div class="mx-auto grid max-w-site gap-10 px-4 py-14 sm:px-6 md:grid-cols-3">

        <div>
            <img src="{{ asset('brand/mim-zad-logo-white.svg') }}" alt="مزاد | Mim_Zad" class="h-16 w-auto">
            <p class="mt-4 max-w-xs text-sm leading-7 text-brand-muted">
                منصة رقمية سعودية تجمع المزادات العقارية في مكان واحد، وتنظم الفرص وتوجهك مباشرة إلى الجهة المنظمة
                المعتمدة لإتمام العملية. مزاد منصة اكتشاف وتوجيه، وليست جهة بيع أو جهة تنظيم للمزاد.
            </p>
        </div>

        <div>
            <h3 class="text-base font-bold text-brand-white">تواصل معنا</h3>
            <ul class="mt-4 space-y-3 text-sm">
                <li class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                         class="h-5 w-5 shrink-0 text-brand-emerald">
                        <path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 2 .7 2.9a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.9.6 2.9.7a2 2 0 0 1 1.7 2Z"/>
                    </svg>
                    <span dir="ltr" class="text-brand-ivory">+966 92 000 0000</span>
                </li>
                <li class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                         class="h-5 w-5 shrink-0 text-brand-emerald">
                        <rect x="2" y="4" width="20" height="16" rx="2"/>
                        <path d="m22 7-10 6L2 7"/>
                    </svg>
                    <a href="mailto:info@mimzad.sa" class="transition duration-fast hover:text-brand-emerald"
                       dir="ltr">info@mimzad.sa</a>
                </li>
                <li class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                         class="h-5 w-5 shrink-0 text-brand-emerald">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                    <span class="text-brand-muted">الأحد — الخميس · 9 صباحاً حتى 5 مساءً</span>
                </li>
            </ul>
        </div>

        <div>
            <h3 class="text-base font-bold text-brand-white">روابط سريعة</h3>
            <ul class="mt-4 grid grid-cols-2 gap-x-4 gap-y-3 text-sm">
                <li><a href="{{ url('/about') }}" class="transition duration-fast hover:text-brand-emerald">عن المنصة</a></li>
                <li><a href="{{ url('/privacy') }}" class="transition duration-fast hover:text-brand-emerald">سياسة الخصوصية</a></li>
                <li><a href="{{ url('/terms') }}" class="transition duration-fast hover:text-brand-emerald">الشروط والأحكام</a></li>
                <li><a href="{{ url('/contact') }}" class="transition duration-fast hover:text-brand-emerald">تواصل معنا</a></li>
                <li><a href="{{ url('/auctions') }}" class="transition duration-fast hover:text-brand-emerald">كل المزادات</a></li>
                <li><a href="{{ url('/submit-auction') }}" class="transition duration-fast hover:text-brand-emerald">ارفع مزادك</a></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-brand-emerald/15">
        <div class="mx-auto flex max-w-site flex-col items-center justify-between gap-2 px-4 py-5 text-center text-xs text-brand-muted sm:flex-row sm:px-6">
            <p>جميع الحقوق محفوظة لدى مزاد | Mim_Zad © {{ date('Y') }}</p>
            <p>مزاد منصة اكتشاف وتوجيه — البيع والتنظيم من صلاحيات الجهات المنظمة المعتمدة.</p>
        </div>
    </div>
</footer>

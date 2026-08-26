# PROJECT_MAP.md — الذاكرة الخارجية للمشروع

> يُحدَّث في نهاية كل مرحلة. آخر إدخال في [SESSION LOG] = نقطة الاستئناف.

## [TECH_STACK]
الستاك المعتمد (قرار بوابة الموافقة الافتتاحية لمرحلة M1 — يحل محل اقتراح Next/Nest الوارد في 09-RECOMMENDATIONS):
- **Backend+Frontend**: Laravel 12 + Blade + Livewire 3.x + Alpine.js 3.x + Tailwind CSS 3.x — RTL كامل.
- **Realtime**: مؤجل إلى مرحلة لوحات المزايدة. - **DB**: مؤجل إلى M3 (لا Eloquent الآن). **Cache/Session/Queue في M1**: file drivers فقط.
- **Auth**: مؤجل (جوال+OTP ونفاذ Nafath لاحقاً). - **مراقبة**: Sentry لاحقاً.
- **الخطوط**: itfHuwiyaArabic (الأوزان الخمسة مرفقة فعلياً في المراحل/01) عبر @font-face من /public/fonts/.
- **الهوية البصرية**: design-system.md سلطة وحيدة — كحلي #0C1C3D · زمردي #1AB59C · عاجي #CECECE · شعار SVG الأصلي في /public/brand/.
[REUSE_SOURCE_PATH] = C:\Users\khaled\Desktop\My Progict\web\omar\prgict1\Web_Mim_Zad\project-folder
  (مشروع Laravel 12 سابق بنفس الستاك: vendor + node_modules + .composer-cache محلي. ملاحظة مسجلة: يحوي Livewire 4.4 وFilament 5 بينما M1 تعتمد Livewire 3 حرفياً — الفرق يُحمَّل من الشبكة ولا يؤثر على إعادة الاستخدام.)

## [SYSTEM_FLOW]
```
مصادر المزادات:
  أ) مزاداتنا الخاصة ← لوحة تحكم (إدخال/إدارة)
  ب) بورصة المملكة ← استيراد/إدخال يدوي منظم: بيانات أساسية عامة فقط + رابط المصدر (نموذج redirectedLink — لا استنساخ)
        ↓
جلب/رفع → جدول موحد (Auction + Item + Agent + Authority + Lookups)
        ↓
API موحد ←→ موقع عام (SSR/SEO) + لوحة تحكم
        ↓
لوحة المزايدة الحية عبر Realtime + محفظة وعربون (للمزادات الخاصة)
```

## [ARCHITECTURE]
```
[PROJECT_FOLDER]/
├─ src/
│  ├─ app/                    # صفحات Next.js حسب 01-SITE_MAP و10-PAGE_BLUEPRINT
│  │  ├─ home/ auctions/ auction-details/[id]/ item-details/[id]/
│  │  ├─ exchange/            # بورصة: items | auctions | details/[id] | statistics
│  │  ├─ submit-property/ auth/{login,register,forget,nafath}/ faqs/ privacy/ terms/
│  │  ├─ technical-support/ profile/ wallet/ bids/ favorites/ notifications/ preferences/
│  ├─ components/             # Header, Footer, Breadcrumbs, AuctionCard, Countdown, FiltersPanel, BidBoard...
│  ├─ lib/api/                # عملاء API بأنماط appsettings الموثقة (03-DATA_SOURCES)
│  └─ lib/realtime/           # SignalR/SSE client
├─ server/                    # API + jobs الاستيراد المنظم
├─ db/                        # مخطط PostgreSQL من 04-DATA_MODEL (بأسماء مصححة)
├─ docs/reference-analysis/   # مخرجات المرحلة 00 (11 ملفاً)
└─ المراحل/
```

## [ORPHANS & PENDING]
1. آلية التجميع الخلفية لبورصة المرجعي (webhook/جدولة؟) — غير معروفة من كود الواجهة؛ قرارنا: استيراد يدوي منظم.
2. بوابة الدفع الفعلية لشحن المحفظة (فقط «سداد برقم مفوتر 902» من FAQ).
3. استخدام Google Sign-In الفعلي (gsi/client موجود بلا زر ملتقط).
4. زر تقويم Google Calendar (مفاتيحه بالإعدادات، الزر غير ملتقط).
5. robots.txt/sitemap.xml غير ملتقطة.
6. تخطيط /auctions_statistics الكامل غير ملتقط (بياناته endpoints موثقة).
7. صفحتا /info و/submitPropertyRequests (routes بلا لقطات HTML).
8. منطق redirectedLink الفارغ vs الممتلئ عند نقرة «تفاصيل العقار» بالبورصة (استنتاج من endpoints).
9. مودال صفة التمثيل الكامل (نصوص الإقرار موجودة بحقول representative*Details).

## [SESSION LOG]
1. **00-التحليل**: تحقق من وجود downloaded_site_zayid.sa/ ✓ (278 ملفاً). قراءة برومبت المرحلة 00 وعرض بوابة الموافقة (ملخص أولي + خطة قراءة + قائمة المخرجات) — بانتظار موافقة المستخدم.
2. **00-التحليل**: بعد موافقة المستخدم «نفذ»: فحص شامل لapi_data (39 JSON) → استخراج حقول GetAuctions/GetPropertyDetails/KingdomAuctions/BiddersDetails/Statistics/Lookups كاملة؛ اكتشاف appsettings.json بكامل ~200 endpoint؛ استخراج مسارات Angular من JS؛ فحص صفحات home/auctions/auction-details/item-details/kingdom*/submitProperty/auth/faqs/technical-support واستخراج العناصر القابلة للنقر؛ تدقيق CSS (ألوان/خطوط) وSEO.
3. **00-التحليل**: إنشاء docs/reference-analysis/: 00-SUMMARY ✓، 01-SITE_MAP ✓، 02-INFO_ARCHITECTURE ✓، 03-DATA_SOURCES ✓، 04-DATA_MODEL ✓، 05-FEATURE_MATRIX ✓، 06-DESIGN_AUDIT ✓، 07-SEO_AUDIT ✓، 08-RISKS ✓، 09-RECOMMENDATIONS ✓، 10-PAGE_BLUEPRINT ✓ (كل زر وجهته + رحلات المستخدم + ORPHANS). الأسئلة الثمانية مجابة ضمن الملفات (03=س1،2 · 04=س3 · 02=س4 · 05/01=س5 · 00=س6 · 06=س7 · 02/09=س8).
4. **00-التحليل**: إنشاء PROJECT_MAP.md ✓ بالأقسام الخمسة. تعريف الاكتمال مستوفى (لا كود تشغيلي). **التالي: مرحلة 01-الواجهات-العامة** بعد موافقة المستخدم.
5. **01-الواجهات**: قراءة الملفات الإلزامية الخمسة ✓ + تحقق design-system.md والخطوط الخمسة وSVG الشعار موجودة في مجلد المرحلة ✓. عرض بوابة الموافقة الافتتاحية (تقنيات Laravel 12+Blade+Livewire 3+Alpine+Tailwind 3 · حالة المجلد=فارغ/حالة ج · سؤال إعادة الاستخدام · خطة الصفحات الثماني بحلقة A/B/C) — **المستخدم وافق «نفّذ»** وسجّل [REUSE_SOURCE_PATH]=المشروع القديم (يحوي vendor+node_modules؛ كاش composer الفعلي 3.6GB في Temp\opencode). ملاحظة: القديم Livewire 4.4/Filament 5 — الالتزام بـ Livewire 3 حرفياً. التالي: تهيئة المشروع ثم حلقة الصفحات.
6. **01-الواجهات — تهيئة المشروع مكتملة (خطوات 1–9)**: create-project Laravel 12 في `project-folder/` ✓ (محاولة1 فشلت: تهريب caret → `~12.0`؛ محاولة2: انقطاع DNS عابر؛ محاولة3 نجحت EXITCODE=0). `.env` file drivers ✓ · key:generate ✓ · Tailwind v4 من الهيكل وحُوّد إلى v3 قبل أي بناء ✓ (`composer require` الحرفي ثبت Livewire 4.4.2 وصُحح إلى **v3.8.0** المطابق للقرار) · npm install ✓ · **npm run build ناجح** (CSS 15KB/JS 48KB). الانحراف الوحيد: تخطي `tailwindcss init -p` لأن ملفي الإعداد كُتبا مسبقاً (init كان سيمسحهما). أصول: الخطوط الخمسة → `/public/fonts/` ✓ · شعاران مستقلان مولّدان برمجياً من SVG الأصلية (كحلي #0C1C3D + فاتح #F6F8F9، bbox استخراجي بدون إعادة رسم، مساحة أمان 12%) → `/public/brand/` ✓ · 5 صور placeholder خطية → `/public/images/auctions/` ✓. نواة: AuctionProvider(interface)+MockAuctionProvider(8 مزادات واقعية: 4 نشط/3 قادم/1 منتهٍ)+binding في AppServiceProvider ✓ — تحقق tinker كامل (فلترة q/status/category/sort/pagination/slug/related/null+log). طبقة عرض مشتركة: app-layout(RTL)+meta(SEO/OG/canonical)+site-header(شعار أبيض/روابط/زر زمردي/قائمة جوال Alpine)+site-footer+breadcrumbs+countdown(Alpine)+auction-card ✓. **ORPHANS جديدة**: بيانات تواصل الفوتر وهمية (info@mimzad.sa/9200000000) تُستبدل بالرسمية عند توفرها · الشعار المستقل استخراج آلي بانتظار نسخة رسمية معتمدة إن وُجدت · روابط هيدر لمسارات لم تُبنَ بعد ترجع 404 افتراضية حتى اكتمال الحلقة. **التالي: حلقة الموافقة — صفحة 1/8 الرئيسية**.
7. **01-الواجهات — صفحة 1/8: الرئيسية `/` ✓ مبنية ومعايَنة**: HomeController+AuctionProvider (getStats/getActiveAuctions/getCategories) + routes/web.php (home) + home.blade.php بترتيب Blueprint ص1 بهوية design-system: هيرو H1+بحث سريع GET /auctions?q= → شريط إحصائيات getStats → شبكة التصنيفات الستة → آخر المزادات النشطة (4 بطاقات auction-card+countdown) → المصادر المعتمدة → CTA رفع مزاد. رد المستخدم «نفذ» عُدّي **[A] كما هو** (الاقتراحات الثلاثة غير منفذة). عاينة فعلية: HTTP 200/48.9KB، الأقسام كاملة، 4 بطاقات، 6 تصنيفات، CSS/JS مبنيان 200، الخطوط الخمسة @font-face تُحمَّل 200، الشعار والصور 200، صفر أخطاء. npm run build بعد إضافة Alpine ✓. **قرار معماري مسجل**: روابط المكونات المشتركة بمسارات حرفية `url('/...')` بدل أسماء `route()` لأن المسارات تُبنى تدريجياً داخل الحلقة و`route()` يرمي استثناء رندر للمسار غير المعرف — عند اكتمال الحلقة كل المسارات حية؛ المسارات المؤقتة الغير مبنية ترجع 404 افتراضياً حتى صفحة 8. ORPHANS+: صفحة فهرس تصنيفات غير مخططة (روابط التصنيفات تذهب مباشرة لـ/categories/{slug}). **التالي: صفحة 2/8 قائمة المزادات /auctions**.
8. **01-الواجهات — إضافة بطلب المستخدم: سلايدر إعلانات متحرك في بداية الرئيسية ✓ مُعايَن**: بنفس نمط المعمارية — `BannerProvider`(interface)+`MockBannerProvider`(3 إعلانات: تصفح/ارفع مزادك/مزادات حكومية بحقول id,title,description,badge,image_path,cta_text,cta_url,sort_order)+binding في AppServiceProvider. مكوّن `banner-slider.blade.php` Alpine مدمج: تلاشي crossfade+تشغيل تلقائي 6s+إيقاف تحويم+سحب لمس±45px+أسهم ونقاط tablist+احترام prefers-reduced-motion+x-cloak. 3 صور بانر SVG خطية → /images/banners/. عاينة: HTTP 200/61.8KB، السلايدر قبل الهيرو، 3 شرائح+3 نقاط+سهمان، صور 200، صفر أخطاء — حي على http://127.0.0.1:8021 للمعاينة المستمرة. **ORPHANS**: جدول banners في M3 (حقول مطابقة للمزوّد) + CRUD إدارة الإعلانات في لوحة التحكم M5 — الاستبدال عبر تغيير الربط فقط دون لمس Controller/View. **التالي: صفحة 2/8 قائمة المزادات /auctions**.
9. **01-الواجهات — حادثة «السلايدر غير مرئي» وحلّها ✓**: المستخدم لم يرَ السلايدر رغم سلامة الـHTML وAlpine في الحزمة — السبب الجذري: المكوّن أُضيف بعد آخر `npm run build` فكلاساته العشوائية (h-[230px] وسواها) غابت عن CSS المبني → وعاء ارتفاع صفر بشرائح مطلقة التموضع = غير مرئي. **قاعدة عمل ملزمة لما تبقى من المرحلة: أي إضافة/تعديل كلاسات Tailwind جديدة يستوجب `npm run build` قبل العاينة**. أعيد البناء (CSS 15→30KB، كل الكلاسات تحققت بالشكل المهرَّب) والصفحة تسحب app-B3THcxc2.css وتعمل 200. ملاحظة فحص: -LiteralPath لا يوسع wildcards؛ استخدم -Path. بانتظار تأكيد المستخدم البصري بعد Ctrl+F5 ثم صفحة 2/8.
10. **01-الواجهات — صور حقيقية عبر روابط CDN بطلب المستخدم ✓ مُعايَنة**: 14 رابط Unsplash مُرشحًا فُحصت جميعها HEAD → 200 image/jpeg قبل الربط. رُبط 11: صور المزادات الثمانية في MockAuctionProvider (أرض=كثبان/فيلا ليلية/برج/واجهة متجر/متجر/منتجع/مبنى مؤسسي/قصر عصري بأبعاد w=900&q=70) + البانرات الثلاثة في MockBannerProvider (أفق مدينة/مفاتيح عقار/عمارة كلاسيكية w=1600&h=500&q=75). عاينة: HTTP 200 · 7 روابط فريدة على الرئيسية كلها 200 بأحجامها الفعلية · صفر مراجع SVG محلية · صفر أخطاء · لا rebuild (لا كلاسات جديدة). **ORPHANS+**: صور Unsplash خارجية للعرض التجريبي فقط — عند M4/M3 تُستبدل بصور المزادات الحقيقية من API (حقول images) مع قرار التخزين المحلي/الكائني ونسخ WebP المصغرة؛ SVG المحلية تبقى أصول fallback في /images/. بانتظار تأكيد المستخدم ثم صفحة 2/8 قائمة المزادات /auctions.
11. **08-الرفع-التلقائي**: رفع Git: إعداد: تجهيز المستودع للنشر على Railway | Commit: https://github.com/khaled-assag/Mim-Zad/commit/fb3b548 | معاينة حية (يبني Railway الأصول تلقائياً خلال دقائق): https://mim-zad-production.up.railway.app

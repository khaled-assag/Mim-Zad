<?php

namespace App\Services\Auctions;

use App\Services\Auctions\AuctionProvider;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Log;

class MockAuctionProvider implements AuctionProvider
{
    /** @var array<int, array<string, mixed>> */
    private array $auctions;

    public function __construct()
    {
        $now = CarbonImmutable::now();

        $this->auctions = [
            [
                'id' => '1', 'code' => 'MZ-101', 'slug' => 'ard-sakenya-narjes-riyadh',
                'title' => 'أرض سكنية على شارعين بحي النرجس',
                'category' => ['slug' => 'lands', 'name' => 'أراضٍ'],
                'type' => 'إلكتروني', 'status' => 'active',
                'region' => 'منطقة الرياض', 'city' => 'الرياض', 'district' => 'النرجس',
                'price_start' => 1250000, 'price_step' => 25000, 'entry_fee' => 50000,
                'bids_count' => 14, 'interested_count' => 42,
                'area' => 640, 'purpose' => 'سكني',
                'agent' => ['name' => 'مكتب الصفوة العقارية', 'initials' => 'صع', 'verified' => true],
                'source' => 'مزادات المنصة', 'external_url' => null,
                'starts_at' => $now->subDays(2), 'ends_at' => $now->addDays(4)->addHours(6),
                'images' => ['https://images.unsplash.com/photo-1473580044384-7ba9967e16a0?auto=format&fit=crop&w=900&q=70'],
                'description' => 'أرض سكنية بموقع مميز على شارعين رئيسيين في حي النرجس شمال الرياض، مساحة 640 متراً مربعاً، محاطة بخدمات متكاملة ومساجد ومدارس، مناسبة للاستثمار أو البناء الفوري. المزاد إلكتروني بالكامل عبر لوحة المزايدة، والفائز يتواصل مع وكيل البيع لإتمام الإجراءات.',
            ],
            [
                'id' => '2', 'code' => 'MZ-102', 'slug' => 'villa-shatea-jeddah',
                'title' => 'فيلا سكنية ملاصقة بحي الشاطئ',
                'category' => ['slug' => 'villas', 'name' => 'فلل سكنية'],
                'type' => 'إلكتروني', 'status' => 'active',
                'region' => 'منطقة مكة المكرمة', 'city' => 'جدة', 'district' => 'الشاطئ',
                'price_start' => 2890000, 'price_step' => 50000, 'entry_fee' => 100000,
                'bids_count' => 9, 'interested_count' => 67,
                'area' => 480, 'purpose' => 'سكني',
                'agent' => ['name' => 'شركة الواجهة للتوسعات العقارية', 'initials' => 'وج', 'verified' => true],
                'source' => 'مزادات المنصة', 'external_url' => null,
                'starts_at' => $now->subDays(1), 'ends_at' => $now->addDays(2)->addHours(3),
                'images' => ['https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=900&q=70'],
                'description' => 'فيلا سكنية درج ودورين بمخطط مودرن، ملاصقة لشارع حي الشاطئ غرب جدة على بعد دقائق من الكورنيش، تشطيب خاص وتشمل جناح سائق وغرفة خادمة. المعاينة عبر البروشور المرفق، والمزاد يُدار إلكترونياً.',
            ],
            [
                'id' => '3', 'code' => 'MZ-103', 'slug' => 'emara-tegaria-dammam',
                'title' => 'عمارة تجارية بأربعة أدوار وسطح',
                'category' => ['slug' => 'buildings', 'name' => 'عمائر ومجمعات'],
                'type' => 'حضوري', 'status' => 'upcoming',
                'region' => 'المنطقة الشرقية', 'city' => 'الدمام', 'district' => 'الفيصلية',
                'price_start' => 5400000, 'price_step' => 100000, 'entry_fee' => 200000,
                'bids_count' => 0, 'interested_count' => 31,
                'area' => 1200, 'purpose' => 'تجاري - سكني',
                'agent' => ['name' => 'مجموعة الخليج العقادية', 'initials' => 'خع', 'verified' => false],
                'source' => 'بورصة المزادات — مصدر مجمّع', 'external_url' => 'https://example.org/source/emara-dammam-mz103',
                'starts_at' => $now->addDays(5), 'ends_at' => $now->addDays(12),
                'images' => ['https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=900&q=70'],
                'description' => 'عمارة تجارية قائمة على أرض 1200 متر في حي الفيصلية بالدمام، تضم أربعة أدوار بمحلات تجارية وشقق سكنية مؤجرة، بعائد سنوي مستقر. مزاد حضور يقام في مقر الجهة المنظمة، ويُتاح التسجيل الإلكتروني مسبقاً.',
            ],
            [
                'id' => '4', 'code' => 'MZ-104', 'slug' => 'ard-tegaria-azizia-makkah',
                'title' => 'أرض تجارية على شارعين تجاريين بالعزيزية',
                'category' => ['slug' => 'lands', 'name' => 'أراضٍ'],
                'type' => 'هجين', 'status' => 'active',
                'region' => 'منطقة مكة المكرمة', 'city' => 'مكة المكرمة', 'district' => 'العزيزية',
                'price_start' => 3750000, 'price_step' => 75000, 'entry_fee' => 150000,
                'bids_count' => 22, 'interested_count' => 88,
                'area' => 900, 'purpose' => 'تجاري',
                'agent' => ['name' => 'بيت التميز للمزادات', 'initials' => 'تم', 'verified' => true],
                'source' => 'بورصة المزادات — مصدر مجمّع', 'external_url' => 'https://example.org/source/ard-makkah-mz104',
                'starts_at' => $now->subDays(3), 'ends_at' => $now->addHours(20),
                'images' => ['https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?auto=format&fit=crop&w=900&q=70'],
                'description' => 'أرض تجارية بزاوية شارعين تجاريين عرض كل منهما 30 متراً في حي العزيزية بمكة المكرمة، صك إلكتروني محدّد، مناسبة لمجمع تجاري أو معرض سيارات. المزاد هجين: مزايدة إلكترونية مع جلسة حضرية للإغلاق.',
            ],
            [
                'id' => '5', 'code' => 'MZ-105', 'slug' => 'mojammaa-mahalat-khobar',
                'title' => 'مجمع محلات تجاري بحي العقربية',
                'category' => ['slug' => 'commercial', 'name' => 'تجاري وإداري'],
                'type' => 'إلكتروني', 'status' => 'upcoming',
                'region' => 'المنطقة الشرقية', 'city' => 'الخبر', 'district' => 'العقربية',
                'price_start' => 6100000, 'price_step' => 100000, 'entry_fee' => 250000,
                'bids_count' => 0, 'interested_count' => 54,
                'area' => 2100, 'purpose' => 'تجاري',
                'agent' => ['name' => 'شركة الواجهة للتوسعات العقارية', 'initials' => 'وج', 'verified' => true],
                'source' => 'مزادات المنصة', 'external_url' => null,
                'starts_at' => $now->addDays(7), 'ends_at' => $now->addDays(14),
                'images' => ['https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=70'],
                'description' => 'مجمع محلات تجاري مؤجر بالكامل على أرض 2100 متر بحي العقربية بالخبر، يشمل 18 محلاً ومواقف خاصة، بعائد إيجاري موثق لعامين. فرصة استثمار مباشر بعقد موحد.',
            ],
            [
                'id' => '6', 'code' => 'MZ-106', 'slug' => 'estraha-taif',
                'title' => 'استراحة مشجرة بطوابق في الطائف',
                'category' => ['slug' => 'rests', 'name' => 'استراحات ومنتاجات'],
                'type' => 'حضوري', 'status' => 'ended',
                'region' => 'منطقة مكة المكرمة', 'city' => 'الطائف', 'district' => 'الشفا',
                'price_start' => 980000, 'price_step' => 20000, 'entry_fee' => 40000,
                'bids_count' => 17, 'interested_count' => 39,
                'area' => 3000, 'purpose' => 'ترفيهي',
                'agent' => ['name' => 'مكتب الصفوة العقارية', 'initials' => 'صع', 'verified' => true],
                'source' => 'مزادات المنصة', 'external_url' => null,
                'starts_at' => $now->subDays(12), 'ends_at' => $now->subDays(3),
                'ended_note' => 'انتهى المزاد وتمت الترسية على أعلى مزايد',
                'images' => ['https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=900&q=70'],
                'description' => 'استراحة مشجرة على طريق الشفا أعلى الطائف، تضم بناءً بطابقين وملعباً ومسبحاً ومواقف، بمساحة إجمالية 3000 متر. انتهى مزادها وترُسّت على أعلى مزايد، وتُعرض هنا للأرشيف والاطلاع على نتائج السوق.',
            ],
            [
                'id' => '7', 'code' => 'MZ-107', 'slug' => 'mazad-hokomi-ard-madinah',
                'title' => 'مزاد حكومي: قطع أرضية استثمارية بالمدينة',
                'category' => ['slug' => 'government', 'name' => 'مزادات حكومية'],
                'type' => 'إلكتروني', 'status' => 'active',
                'region' => 'منطقة المدينة المنورة', 'city' => 'المدينة المنورة', 'district' => 'الحرم',
                'price_start' => 4200000, 'price_step' => 100000, 'entry_fee' => 200000,
                'bids_count' => 35, 'interested_count' => 121,
                'area' => 5400, 'purpose' => 'استثماري',
                'agent' => ['name' => 'الجهة المنظمة — مزاد رسمي', 'initials' => 'حك', 'verified' => true],
                'source' => 'جهة حكومية (إسناد رسمي)', 'external_url' => 'https://example.org/source/gov-madinah-mz107',
                'starts_at' => $now->subDays(4), 'ends_at' => $now->addDays(6)->addHours(2),
                'images' => ['https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=70'],
                'description' => 'مزاد إلكتروني رسمي على باقة قطع أرضية استثمارية بإسناد من جهة حكومية، ضمن مخطط معتمد قرب المحاور الرئيسية بالمدينة المنورة. البيع لمن يدفع أعلى سعر وفق شروط الجهة المنظمة، والتحويل إلى المصدر الرسمي بعد الترسية.',
            ],
            [
                'id' => '8', 'code' => 'MZ-108', 'slug' => 'qasr-skeni-abha',
                'title' => 'قصر سكني بإطلالة جبلية في أبها',
                'category' => ['slug' => 'villas', 'name' => 'فلل سكنية'],
                'type' => 'إلكتروني', 'status' => 'upcoming',
                'region' => 'منطقة عسير', 'city' => 'أبها', 'district' => 'المنسك',
                'price_start' => 7300000, 'price_step' => 150000, 'entry_fee' => 300000,
                'bids_count' => 0, 'interested_count' => 73,
                'area' => 1600, 'purpose' => 'سكني',
                'agent' => ['name' => 'بيت التميز للمزادات', 'initials' => 'تم', 'verified' => false],
                'source' => 'بورصة المزادات — مصدر مجمّع', 'external_url' => null,
                'starts_at' => $now->addDays(9), 'ends_at' => $now->addDays(16),
                'images' => ['https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=70'],
                'description' => 'قصر سكني فخم بمساحة بناء 1600 متر على أرض 2500 متر بإطلالة جبلية مفتوحة في أبها، يضم مسبحاً داخلياً ومصعداً وملحقاً مستقلاً. بدء المزاد قريباً والتسجيل المسبق للاهتمام متاح الآن.',
            ],
        ];
    }

    private function normalize(?CarbonImmutable $value): ?string
    {
        return $value?->toIso8601String();
    }

    /**
     * @return array<string, mixed>
     */
    private function present(array $a): array
    {
        $a['starts_at_iso'] = $this->normalize($a['starts_at']);
        $a['ends_at_iso'] = $this->normalize($a['ends_at']);
        $a['starts_at_human'] = $a['starts_at']->locale('ar')->translatedFormat('l d F Y — g:i A');
        $a['ends_at_human'] = $a['ends_at']->locale('ar')->translatedFormat('l d F Y — g:i A');

        return $a;
    }

    public function getActiveAuctions(): array
    {
        return array_values(array_map(
            fn (array $a) => $this->present($a),
            array_filter($this->auctions, fn (array $a) => $a['status'] === 'active')
        ));
    }

    public function getAllAuctions(array $filters = []): array
    {
        $items = $this->auctions;

        $q = trim((string) ($filters['q'] ?? ''));
        if ($q !== '') {
            $items = array_values(array_filter($items, function (array $a) use ($q) {
                $haystack = $a['title'].' '.$a['code'].' '.$a['city'].' '.$a['district'];

                return mb_stripos($haystack, $q) !== false;
            }));
        }

        if (! empty($filters['status'])) {
            $wanted = (array) $filters['status'];
            $items = array_values(array_filter($items, fn (array $a) => in_array($a['status'], $wanted, true)));
        }

        if (! empty($filters['category'])) {
            $items = array_values(array_filter(
                $items,
                fn (array $a) => $a['category']['slug'] === $filters['category']
            ));
        }

        if (! empty($filters['region'])) {
            $items = array_values(array_filter($items, fn (array $a) => $a['region'] === $filters['region']));
        }

        if (! empty($filters['city'])) {
            $items = array_values(array_filter($items, fn (array $a) => $a['city'] === $filters['city']));
        }

        if (isset($filters['price_min']) && is_numeric($filters['price_min'])) {
            $items = array_values(array_filter($items, fn (array $a) => $a['price_start'] >= (float) $filters['price_min']));
        }

        if (isset($filters['price_max']) && is_numeric($filters['price_max'])) {
            $items = array_values(array_filter($items, fn (array $a) => $a['price_start'] <= (float) $filters['price_max']));
        }

        usort($items, $this->sorter((string) ($filters['sort'] ?? '')));

        $total = count($items);
        $perPage = max(1, min(48, (int) ($filters['per_page'] ?? 9)));
        $lastPage = max(1, (int) ceil($total / $perPage));
        $currentPage = min(max(1, (int) ($filters['page'] ?? 1)), $lastPage);
        $slice = array_slice($items, ($currentPage - 1) * $perPage, $perPage);

        return [
            'data' => array_values(array_map(fn (array $a) => $this->present($a), $slice)),
            'total' => $total,
            'current_page' => $currentPage,
            'last_page' => $lastPage,
            'per_page' => $perPage,
        ];
    }

    private function sorter(string $sort): callable
    {
        return match ($sort) {
            'price_asc' => fn (array $x, array $y) => $x['price_start'] <=> $y['price_start'],
            'price_desc' => fn (array $x, array $y) => $y['price_start'] <=> $x['price_start'],
            'newest' => fn (array $x, array $y) => $y['starts_at'] <=> $x['starts_at'],
            'ending_soon' => fn (array $x, array $y) => $x['ends_at'] <=> $y['ends_at'],
            default => function (array $x, array $y) {
                $order = ['active' => 0, 'upcoming' => 1, 'ended' => 2];

                return [$order[$x['status']], $x['ends_at']] <=> [$order[$y['status']], $y['ends_at']];
            },
        };
    }

    public function findBySlug(string $slug): ?array
    {
        foreach ($this->auctions as $a) {
            if ($a['slug'] === $slug) {
                $full = $this->present($a);
                $full['related'] = array_values(array_map(
                    fn (array $r) => $this->present($r),
                    array_filter(
                        $this->auctions,
                        fn (array $r) => $r['id'] !== $a['id'] && $r['category']['slug'] === $a['category']['slug']
                    )
                ));

                return $full;
            }
        }

        Log::info('MockAuctionProvider: slug غير موجود', ['slug' => $slug]);

        return null;
    }

    public function getCategories(): array
    {
        $counts = [];
        foreach ($this->auctions as $a) {
            $slug = $a['category']['slug'];
            $counts[$slug] ??= ['name' => $a['category']['name'], 'count' => 0];
            $counts[$slug]['count']++;
        }
        ksort($counts);

        $out = [];
        $i = 1;
        foreach ($counts as $slug => $info) {
            $out[] = ['id' => (string) $i++, 'slug' => $slug, 'name' => $info['name'], 'count' => $info['count']];
        }

        return $out;
    }

    public function getStats(): array
    {
        $byStatus = ['active' => 0, 'upcoming' => 0, 'ended' => 0];
        $byRegion = [];
        $totalValue = 0;

        foreach ($this->auctions as $a) {
            $byStatus[$a['status']] = ($byStatus[$a['status']] ?? 0) + 1;
            $byRegion[$a['region']] = ($byRegion[$a['region']] ?? 0) + 1;
            $totalValue += $a['price_start'];
        }
        arsort($byRegion);

        return [
            'auctions_total' => count($this->auctions),
            'properties_total' => count($this->auctions),
            'active' => $byStatus['active'],
            'upcoming' => $byStatus['upcoming'],
            'ended' => $byStatus['ended'],
            'sources_total' => count(array_unique(array_column($this->auctions, 'source'))),
            'start_value_total' => $totalValue,
            'by_region' => $byRegion,
            'categories' => $this->getCategories(),
        ];
    }
}

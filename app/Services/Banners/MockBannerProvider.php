<?php

namespace App\Services\Banners;

class MockBannerProvider implements BannerProvider
{
    public function getActiveBanners(): array
    {
        return [
            [
                'id' => '1',
                'title' => 'أقوى الفرص العقارية تجمعنا هنا',
                'description' => 'تصفّح مزادات جارية وقادمة من مصادر معتمدة في كل مناطق المملكة.',
                'badge' => 'حملة هذا الأسبوع',
                'image_path' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=1600&h=500&q=75',
                'cta_text' => 'تصفّح المزادات',
                'cta_url' => '/auctions',
                'sort_order' => 1,
            ],
            [
                'id' => '2',
                'title' => 'عندك مزاد عقاري؟ اعرضه على الجميع',
                'description' => 'سجّل مزادك بخطوات بسيطة ليصل إلى الباحثين عن الفرص الاستثمارية.',
                'badge' => 'للمعلنين والجهات المنظمة',
                'image_path' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=1600&h=500&q=75',
                'cta_text' => 'ارفع مزادك الآن',
                'cta_url' => '/submit-auction',
                'sort_order' => 2,
            ],
            [
                'id' => '3',
                'title' => 'مزادات بإسناد حكومي رسمي',
                'description' => 'فرص استثمارية موثقة المصدر مع تحويل مباشر إلى الجهة المنظمة.',
                'badge' => 'مصادر موثقة',
                'image_path' => 'https://images.unsplash.com/photo-1555848962-6e79363ec58f?auto=format&fit=crop&w=1600&h=500&q=75',
                'cta_text' => 'اكتشف المزادات الحكومية',
                'cta_url' => '/auctions?category=government',
                'sort_order' => 3,
            ],
        ];
    }
}

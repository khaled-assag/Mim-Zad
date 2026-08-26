<?php

namespace App\Services\Banners;

interface BannerProvider
{
    /**
     * إعلانات البانر النشطة مرتبة حسب sort_order.
     *
     * الحقول المتوقعة لكل عنصر (تطابق بنية جدول banners المستقبلية في M3):
     * id, title, description, badge, image_path, cta_text, cta_url, sort_order.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getActiveBanners(): array;
}

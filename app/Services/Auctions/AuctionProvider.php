<?php

namespace App\Services\Auctions;

interface AuctionProvider
{
    /**
     * المزادات النشطة فقط.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getActiveAuctions(): array;

    /**
     * كل المزادات مع تصفية وفرز وترقيم من query string.
     * الفلاتر المدعومة: q, status[], category, region, city,
     * price_min, price_max, sort, page, per_page.
     *
     * @param  array<string, mixed>  $filters
     * @return array{data: array<int, array<string, mixed>>, total: int, current_page: int, last_page: int, per_page: int}
     */
    public function getAllAuctions(array $filters = []): array;

    /**
     * مزاد واحد بالكامل عبر الـslug، أو null إن لم يوجد.
     *
     * @return array<string, mixed>|null
     */
    public function findBySlug(string $slug): ?array;

    /**
     * التصنيفات مع عدد المزادات في كل منها.
     *
     * @return array<int, array{id: string, slug: string, name: string, count: int}>
     */
    public function getCategories(): array;

    /**
     * إحصائيات علنية للواجهة الرئيسية والفلاتر.
     *
     * @return array<string, mixed>
     */
    public function getStats(): array;
}

@props([
    'title' => null,
    'description' => 'مزاد | Mim_Zad — المرجع الرقمي الأول لتجميع وعرض المزادات العقارية في المملكة العربية السعودية. اكتشف الفرص، قارن التفاصيل، وانتقل إلى الجهة المنظمة.',
])

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-meta :title="$title" :description="$description"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak]{display:none !important}</style>
</head>
<body class="min-h-screen flex flex-col bg-brand-navy font-huwiya text-brand-ivory">

    <x-site-header/>

    <main class="flex-1">
        {{ $slot }}
    </main>

    <x-site-footer/>

</body>
</html>

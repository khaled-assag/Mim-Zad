@props(['title' => null, 'description' => null])

@php
    $fullTitle = $title ? $title.' | مزاد Mim_Zad' : 'مزاد Mim_Zad — المرجع الأول للمزادات العقارية في السعودية';
    $desc = $description ?: 'مزاد | Mim_Zad — المرجع الرقمي الأول لتجميع وعرض المزادات العقارية في المملكة العربية السعودية. اكتشف الفرص، قارن التفاصيل، وانتقل إلى الجهة المنظمة.';
    $canonical = url()->current();
@endphp

<title>{{ $fullTitle }}</title>
<meta name="description" content="{{ $desc }}">
<link rel="canonical" href="{{ $canonical }}">
<meta name="robots" content="index, follow">
<link rel="icon" type="image/svg+xml" href="{{ asset('brand/mim-zad-logo.svg') }}">

{{-- Open Graph --}}
<meta property="og:type" content="website">
<meta property="og:site_name" content="مزاد | Mim_Zad">
<meta property="og:title" content="{{ $fullTitle }}">
<meta property="og:description" content="{{ $desc }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ asset('brand/mim-zad-logo.svg') }}">
<meta property="og:locale" content="ar_SA">

{{-- Twitter --}}
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $fullTitle }}">
<meta name="twitter:description" content="{{ $desc }}">
<meta name="twitter:image" content="{{ asset('brand/mim-zad-logo.svg') }}">

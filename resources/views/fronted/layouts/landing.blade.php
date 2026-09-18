<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->company_name ?? 'Elektriker Bergmann' }} — {{ __('Elektro-Notdienst Köln') }}</title>
    <meta name="description" content="{{ __('24/7 Elektro-Notdienst in Köln — Meisterbetrieb seit 1993. In ca. 30 Minuten vor Ort.') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('fronted/landing/css/landing.css') }}">
    @if(app()->getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('fronted/landing/css/landing-rtl.css') }}">
    @endif
</head>
<body>
    @yield('content')

    <script src="{{ asset('fronted/landing/js/landing.js') }}"></script>
</body>
</html>

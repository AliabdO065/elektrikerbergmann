{{--
    Shared, self-contained layout for the branded error pages (404, 500).
    Deliberately has no dependency on the database, session, landing.css or a
    CDN icon font, so it still renders when the app itself is what's broken.
    Colors/radius/fonts mirror public/fronted/landing/css/landing.css.

    Child views set: @section('title'), @section('message'), $code, and
    optionally $lookupSettings = true to show the company name / phone number
    from the DB (guarded by try/catch; never enabled for 500).
--}}
@php
    $locale = app()->getLocale();
    $homeUrl = \Illuminate\Support\Facades\Route::has('fronted.index') ? route('fronted.index') : url('/');
    $brand = 'Elektriker Bergmann';
    $phoneDisplay = $phoneHref = null;

    if (! empty($lookupSettings)) {
        try {
            $settings = \App\Models\LandingSetting::first();
            $brand = $settings?->company_name ?: $brand;
            $phoneDisplay = $settings?->phone_display;
            $phoneHref = $settings?->phone_href;
        } catch (\Throwable $e) {
            // Database unavailable: keep the defaults above.
        }
    }

    $codeChars = str_split((string) $code);
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $locale === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>{{ $code }} – @yield('title') — {{ $brand }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #203556;
            --navy-light: #2c4570;
            --orange: #e07856;
            --orange-dark: #c85f3f;
            --yellow: #ffc542;
        }
        * { box-sizing: border-box; }
        html, body { margin: 0; }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: "Inter", "Segoe UI", Arial, sans-serif;
            color: #fff;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 60%, #17293f 100%);
        }
        a { text-decoration: none; }
        .err-container { width: 100%; max-width: 1140px; margin: 0 auto; padding: 0 20px; }

        .err-header { padding: 22px 0; }
        .err-logo { display: inline-flex; align-items: center; gap: 10px; font-weight: 800; font-size: 1.15rem; color: #fff; }
        .err-logo-mark {
            width: 40px; height: 40px; border-radius: 10px;
            background: var(--orange);
            display: flex; align-items: center; justify-content: center;
        }
        .err-logo-mark svg { width: 20px; height: 20px; }

        .err-main {
            flex: 1;
            display: flex; align-items: center; justify-content: center;
            text-align: center;
            padding: 24px 20px 72px;
        }
        .err-badge {
            display: inline-flex; align-items: center;
            background: rgba(255, 197, 66, .15);
            color: var(--yellow);
            border: 1px solid rgba(255, 197, 66, .4);
            padding: 6px 14px; border-radius: 999px;
            font-size: .85rem; font-weight: 700;
            margin-bottom: 8px;
        }
        .err-code {
            display: flex; align-items: center; justify-content: center;
            direction: ltr; /* digits always read left-to-right, also in Arabic */
            font-size: clamp(5rem, 22vw, 11rem);
            font-weight: 800; line-height: 1.05; letter-spacing: -.02em;
            margin: 0 0 8px;
        }
        .err-code .err-bolt { color: var(--orange); width: .68em; height: .68em; margin: 0 .02em; }
        .err-code .err-bolt svg { width: 100%; height: 100%; display: block; }
        .err-main h1 { font-size: clamp(1.6rem, 4.5vw, 2.4rem); font-weight: 800; margin: 0 0 12px; }
        .err-main p {
            max-width: 520px; margin: 0 auto 30px;
            color: rgba(255, 255, 255, .8); font-size: 1.05rem; line-height: 1.6;
        }
        .err-actions { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
        .err-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 10px;
            padding: 14px 26px; border-radius: 999px;
            font-weight: 700; font-size: 1.05rem;
            transition: transform .15s ease, background .15s ease, color .15s ease;
        }
        .err-btn svg { width: 18px; height: 18px; flex-shrink: 0; }
        .err-btn-primary { background: var(--orange); color: #fff; box-shadow: 0 8px 20px rgba(224, 120, 86, .35); }
        .err-btn-primary:hover { background: var(--orange-dark); transform: translateY(-1px); }
        .err-btn-outline { background: transparent; color: #fff; border: 2px solid #fff; }
        .err-btn-outline:hover { background: #fff; color: var(--navy); }

        @media (max-width: 480px) {
            .err-btn { width: 100%; }
        }
    </style>
</head>
<body>
    <header class="err-header">
        <div class="err-container">
            <a href="{{ $homeUrl }}" class="err-logo">
                <span class="err-logo-mark" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="#fff"><path d="M13 2 4 14h6l-1 8 9-12h-6l1-8z"/></svg>
                </span>
                {{ $brand }}
            </a>
        </div>
    </header>

    <main class="err-main">
        <div>
            <span class="err-badge">{{ __('Fehler :code', ['code' => $code]) }}</span>

            <div class="err-code" aria-hidden="true">
                @foreach($codeChars as $i => $char)
                    @if($i === 1)
                        <span class="err-bolt"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 2 4 14h6l-1 8 9-12h-6l1-8z"/></svg></span>
                    @else
                        <span>{{ $char }}</span>
                    @endif
                @endforeach
            </div>

            <h1>@yield('title')</h1>
            <p>@yield('message')</p>

            <div class="err-actions">
                <a href="{{ $homeUrl }}" class="err-btn err-btn-primary">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 3 2 12h3v8h5v-5h4v5h5v-8h3L12 3z"/></svg>
                    {{ __('Zur Startseite') }}
                </a>
                @if($phoneDisplay && $phoneHref)
                    <a href="tel:{{ $phoneHref }}" class="err-btn err-btn-outline" aria-label="{{ __('Jetzt anrufen') }}">
                        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.6 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.6 3.6a1 1 0 0 1-.25 1l-2.25 2.2z"/></svg>
                        {{ $phoneDisplay }}
                    </a>
                @endif
            </div>
        </div>
    </main>
</body>
</html>

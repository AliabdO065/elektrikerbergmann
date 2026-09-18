<header class="lk-hero">
    <div class="lk-container">
        <div class="lk-hero-grid">
            <div>
                <span class="lk-hero-badge"><i class="fa-solid fa-medal"></i> {{ $settings->hero_badge_text ?? __('Meisterbetrieb seit 1993 · 24/7 erreichbar') }}</span>
                <h1>{{ $settings->hero_headline ?? __('Elektriker in Ihrer Nähe — in 30 Min. vor Ort') }}</h1>
                <p class="lead">{{ $settings->hero_subheadline ?? '' }}</p>
                <div class="lk-hero-ctas">
                    <a href="tel:{{ $settings->phone_href ?? '' }}" class="lk-btn lk-btn-primary">
                        <i class="fa-solid fa-phone"></i> {{ $settings->hero_cta_label ?? __('Jetzt anrufen') }}
                    </a>
                    <a href="#lk-callback" class="lk-btn lk-btn-outline-light">
                        {{ $settings->hero_secondary_cta_label ?? __('Rückruf anfordern') }}
                    </a>
                </div>
            </div>
            <div class="lk-hero-media">
                @include('fronted.landing.partials._image-or-placeholder', [
                    'src' => $settings->hero_image ?? null,
                    'icon' => 'fa-bolt',
                    'label' => __('Einsatzfoto folgt'),
                ])
            </div>
        </div>
    </div>
</header>

<section class="lk-section" id="lk-services">
    <div class="lk-container">
        <div class="lk-section-head">
            <span class="lk-eyebrow">{{ $settings->services_eyebrow ?? __('Unsere Notdienst-Leistungen') }}</span>
            <h2 class="lk-h2">{{ $settings->services_heading ?? __('Egal was passiert ist — wir sind in ca. 30 Minuten da') }}</h2>
            <p>{{ $settings->services_subheading ?? __('Die drei häufigsten Notfälle, mit denen uns unsere Kunden in Berlin erreichen.') }}</p>
        </div>

        <div class="lk-cards-3">
            @foreach($services as $service)
                <div class="lk-card">
                    @include('fronted.landing.partials._image-or-placeholder', [
                        'src' => $service->image,
                        'icon' => $service->icon ?: 'fa-bolt',
                        'label' => $service->title,
                    ])
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->description }}</p>
                    <a href="tel:{{ $settings->phone_href ?? '' }}" class="lk-btn lk-btn-primary lk-btn-sm lk-btn-block">
                        <i class="fa-solid fa-phone"></i> {{ __('Jetzt anrufen') }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

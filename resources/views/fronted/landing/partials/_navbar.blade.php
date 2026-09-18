<nav class="lk-navbar">
    <div class="lk-container lk-navbar-inner">
        <a href="{{ route('fronted.index') }}" class="lk-logo">
            @if($settings && $settings->logo_image)
                <img src="{{ asset($settings->logo_image) }}" alt="{{ $settings->company_name }}" style="height:36px;width:36px;border-radius:8px;object-fit:cover;">
            @else
                <span class="lk-logo-mark"><i class="fa-solid fa-bolt"></i></span>
            @endif
            @if($settings->navbar_show_brand_text ?? true)
                {{ $settings->navbar_brand_text ?? $settings->company_name ?? 'Elektriker Bergmann' }}
            @endif
        </a>

        <ul class="lk-nav-links">
            @if($settings->nav_show_services ?? true)
                <li><a href="#lk-services">{{ __('Leistungen') }}</a></li>
            @endif
            @if($settings->nav_show_steps ?? true)
                <li><a href="#lk-steps">{{ __('Ablauf') }}</a></li>
            @endif
            @if($settings->nav_show_about ?? true)
                <li><a href="#lk-about">{{ __('Über uns') }}</a></li>
            @endif
            @if($settings->nav_show_comparison ?? true)
                <li><a href="#lk-comparison">{{ __('Vergleich') }}</a></li>
            @endif
            @if($settings->nav_show_reviews ?? true)
                <li><a href="#lk-reviews">{{ __('Bewertungen') }}</a></li>
            @endif
            @if($settings->nav_show_faq ?? true)
                <li><a href="#lk-faq">{{ __('FAQ') }}</a></li>
            @endif
            @if($settings->nav_show_callback ?? true)
                <li><a href="#lk-callback">{{ __('Kontakt') }}</a></li>
            @endif
        </ul>

        <div class="lk-navbar-actions">
            @if(isset($enabledLanguages) && $enabledLanguages->count() > 1)
                <div class="lk-lang-switch">
                    <button type="button" class="lk-lang-current">
                        {{ strtoupper($currentLocale ?? app()->getLocale()) }} <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <ul class="lk-lang-menu">
                        @foreach($enabledLanguages as $lang)
                            <li>
                                <a href="{{ route('fronted.setLocale', $lang->code) }}"
                                   class="@if(($currentLocale ?? app()->getLocale()) === $lang->code) active @endif">
                                    {{ $lang->native_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <a href="tel:{{ $settings->phone_href ?? '' }}" class="lk-navbar-phone">
                <i class="fa-solid fa-phone"></i>{{ $settings->phone_display ?? '' }}
            </a>
        </div>
    </div>
</nav>
